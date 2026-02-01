<?php
include 'header.php';
$database = new $database();
$id = $_REQUEST['id'];
//var_dump(['user']);
$income = $database->select("income", "*", ['id' => $id])[0];
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
                        <h4 class="mb-sm-0">Update Income</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="income-update-save.php" method="POST" id="user-update-form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">

                                        <input type="hidden" class="form-control" id="placeholderInput" name="id"
                                            value="<?php echo $income['id']; ?>">

                                        <!-- end of -->
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Source</label>
                                                <input type="text" required class="form-control" id="placeholderInput"
                                                    placeholder="Enter Your source" name="source"
                                                    value="<?php echo $income['source']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Amount</label>
                                                <input type="number" required class="form-control" id="amount"
                                                    value="<?php echo $income['amount']; ?>" name="amount">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Frequency</label>
                                                <input type="text" required class="form-control" id="frequency"
                                                    value="<?php echo $income['frequency']; ?>" name="frequency">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Date</label>
                                                <input type="date" required class="form-control" id="date"
                                                    value="<?php echo $income['income_date']; ?>" name="income_date">
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
