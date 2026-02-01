<?php
include 'header.php'; 
$db = new Database();
$user_id = $_SESSION['user_login']['id'] ?? 0;

$income   = $db->select('income', '*', ['user_id' => $user_id]);
$expense  = $db->select('expense', '*', ['user_id' => $user_id]);
$budgets  = $db->select('budgets', '*', ['user_id' => $user_id]);

// Totals
$total_income  = array_sum(array_column($income, 'amount'));
$total_expense = array_sum(array_column($expense, 'expense_amount'));
$balance       = $total_income - $total_expense;

$expense_by_category = [];
foreach ($expense as $exp) {
    $cat = $exp['category'];
    if (!isset($expense_by_category[$cat])) {
        $expense_by_category[$cat] = 0;
    }
    $expense_by_category[$cat] += $exp['expense_amount'];
}

$categories = [];
$actual_expense = [];
$budget_limit = [];
$budget_progress = [];

foreach ($budgets as $b) {
    $category = $b['category'];
    $limit    = $b['monthly_limit'];
    $used     = $expense_by_category[$category] ?? 0;

    $categories[] = $category;
    $actual_expense[] = $used;
    $budget_limit[] = $limit;

    $percentage = ($limit > 0) ? ($used / $limit) * 100 : 0;

    if ($percentage < 70) {
        $color = 'bg-success';
    } elseif ($percentage < 100) {
        $color = 'bg-warning';
    } else {
        $color = 'bg-danger';
    }

    $budget_progress[] = [
        'category' => $category,
        'used'     => $used,
        'limit'    => $limit,
        'percent'  => min($percentage, 100),
        'color'    => $color
    ];
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- SUMMARY CARDS -->
            <div class="row mb-4">

                <div class="col-md-4">
                    <div class="card text-white bg-success" style="cursor:pointer;"
                         onclick="window.location.href='Transaction.php';">
                        <div class="card-body">
                            <h5>Total Income</h5>
                            <p style="font-size:1.5em;">₹ <?php echo number_format($total_income,2); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-danger" style="cursor:pointer;"
                         onclick="window.location.href='Transaction.php';">
                        <div class="card-body">
                            <h5>Total Expense</h5>
                            <p style="font-size:1.5em;">₹ <?php echo number_format($total_expense,2); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white" style="cursor:pointer; background:#4CAF50;"
                         onclick="window.location.href='Transaction.php';">
                        <div class="card-body">
                            <h5>Balance</h5>
                            <p style="font-size:1.5em;">₹ <?php echo number_format($balance,2); ?></p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- BAR GRAPH -->
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Budget vs Actual Expense (Category-wise)
                        </div>
                        <div class="card-body">
                            <canvas id="budgetBarChart" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>

           
       
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('budgetBarChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($categories); ?>,
        datasets: [
            {
                label: 'Actual Expense',
                data: <?php echo json_encode($actual_expense); ?>,
                backgroundColor: '#f44336',
                barThickness: 22
            },
            {
                label: 'Budget Limit',
                data: <?php echo json_encode($budget_limit); ?>,
                backgroundColor: '#4caf50',
                barThickness: 22
            }
        ]
    },
    options: {
        responsive: true,
        categoryPercentage: 0.6,
        barPercentage: 0.7,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return '₹' + value.toLocaleString();
                    }
                }
            }
        },
        plugins: {
            legend: { position: 'bottom' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label +
                               ': ₹' + context.raw.toLocaleString();
                    }
                }
            }
        }
    }
});
</script>

<?php include 'footer.php'; ?>
