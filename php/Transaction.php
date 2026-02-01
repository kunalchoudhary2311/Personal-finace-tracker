<?php
include 'header.php'; 

$db = new Database();

$user_id = $_SESSION['user_login']['id'] ?? 0;

// Fetch data
$income  = $db->select('income', '*', ['user_id' => $user_id]);
$expense = $db->select('expense', '*', ['user_id' => $user_id]);

// Filters
$search     = $_GET['search'] ?? '';
$type       = $_GET['type'] ?? '';
$from_date  = $_GET['from_date'] ?? '';
$to_date    = $_GET['to_date'] ?? '';
$sort       = $_GET['sort'] ?? 'desc'; // default newest first

// Filter income
$filtered_income = [];
foreach ($income as $inc) {

    if ($search && stripos($inc['source'], $search) === false) continue;
    if ($from_date && $inc['income_date'] < $from_date) continue;
    if ($to_date && $inc['income_date'] > $to_date) continue;
    if ($type && $type !== 'income') continue;

    $filtered_income[] = [
        'type' => 'Income',
        'label' => $inc['source'],
        'amount' => $inc['amount'],
        'date' => $inc['income_date']
    ];
}

// Filter expense
$filtered_expense = [];
foreach ($expense as $exp) {

    if ($search && stripos($exp['category'], $search) === false) continue;
    if ($from_date && $exp['expense_date'] < $from_date) continue;
    if ($to_date && $exp['expense_date'] > $to_date) continue;
    if ($type && $type !== 'expense') continue;

    $filtered_expense[] = [
        'type' => 'Expense',
        'label' => $exp['category'],
        'amount' => $exp['expense_amount'],
        'date' => $exp['expense_date']
    ];
}

$transactions = array_merge($filtered_income, $filtered_expense);

usort($transactions, function ($a, $b) use ($sort) {
    if ($sort === 'asc') {
        return strtotime($a['date']) - strtotime($b['date']);
    }
    return strtotime($b['date']) - strtotime($a['date']);
});
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row mb-3">
                <div class="col-12">
                    <h4>Transaction History</h4>
                </div>
            </div>

            <!-- FILTER FORM -->
            <form method="GET" class="row g-3 mb-3">

                <div class="col-md-3">
                    <input type="text" name="search" class="form-control"
                           placeholder="Search category / source"
                           value="<?php echo htmlspecialchars($search); ?>">
                </div>

                <div class="col-md-2">
                    <select name="type" class="form-control">
                        <option value="">All Types</option>
                        <option value="income" <?php if($type=='income') echo 'selected'; ?>>Income</option>
                        <option value="expense" <?php if($type=='expense') echo 'selected'; ?>>Expense</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <input type="date" name="from_date" class="form-control"
                           value="<?php echo $from_date; ?>">
                </div>

                <div class="col-md-2">
                    <input type="date" name="to_date" class="form-control"
                           value="<?php echo $to_date; ?>">
                </div>

                <div class="col-md-2">
                    <select name="sort" class="form-control">
                        <option value="desc" <?php if($sort=='desc') echo 'selected'; ?>>Newest First</option>
                        <option value="asc" <?php if($sort=='asc') echo 'selected'; ?>>Oldest First</option>
                    </select>
                </div>

                <div class="col-md-1">
                    <button class="btn btn-primary w-100">Go</button>
                </div>

            </form>

            <!-- TABLE -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-card">

                        <table class="table table-bordered table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Type</th>
                                    <th>Category / Source</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (empty($transactions)) {
                                    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                                } else {
                                    $c = 1;
                                    foreach ($transactions as $row) {
                                        $badge = $row['type'] === 'Income' ? 'success' : 'danger';
                                        echo "<tr>
                                            <td>{$c}</td>
                                            <td><span class='badge bg-{$badge}'>{$row['type']}</span></td>
                                            <td>{$row['label']}</td>
                                            <td>₹ " . number_format($row['amount'],2) . "</td>
                                            <td>{$row['date']}</td>
                                        </tr>";
                                        $c++;
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
