<?php
include 'header.php';
$database = new $database();
$expense_id = $_REQUEST['expense_id'];
//var_dump(['user']);  
$expense = $database->select("expense", "*", ['expense_id' => $expense_id])[0];
//print_r($user);
?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="../assets/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Expense Update</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="expense-update-save.php" method="POST" id="Expense-update-form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">

                                        <input type="hidden" class="form-control" id="placeholderInput" name="expense_id"
                                            value="<?php echo $expense['expense_id']; ?>">

                                        <!-- end of -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category <span class="text-danger">*</span></label>
                                                <select name="category" id="category" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    // Fetch categories from budgets for this user
                                                    $budgets = $db->select('budgets', '*', ['user_id' => $_SESSION['user_login']['id'] ?? 0]);
                                                    foreach ($budgets as $b) {
                                                        // Keep the existing selected value if editing
                                                        $selected = (isset($expense['category']) && $expense['category'] == $b['category']) ? 'selected' : '';
                                                        echo '<option value="' . htmlspecialchars($b['category']) . '" ' . $selected . '>' . htmlspecialchars($b['category']) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Amount</label>
                                                <input type="number" required class="form-control" id="amount"
                                                    value="<?php echo $expense['expense_amount']; ?>" name="amount">
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Description</label>
                                                <input type="text" required class="form-control" id="description"
                                                    value="<?php echo $expense['description']; ?>" name="description">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Date</label>
                                                <input type="date" required class="form-control" id="date"
                                                    value="<?php echo $expense['expense_date']; ?>" name="expense_date">
                                            </div>
                                        </div>



                                        <div class="col-xxl-3 col-md-4 mb-2">
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end row-->
                                </div>

                            </div>


                        </div>
                    </div>
                    <!--end col-->

                </div>
            </form>
            <!--end row-->
        </div>
        <!--end row-->

    </div> <!-- container-fluid -->
</div><!-- End Page-content -->
<?php
include 'footer.php';
?>
<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/node-waves/waves.min.js"></script>
<script src="../assets/libs/feather-icons/feather.min.js"></script>
<script src="../assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>

<script src="../assets/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- password-addon init -->
<script src="../assets/js/pages/password-addon.init.js"></script>
<style>
    .error {

        color: Red;
    }
</style>