<?php include 'header.php'; ?>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add budget</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">               

                                <li class="breadcrumb-item active">
                                    
                                    <a title="Alt + A" id='view-all-button' href='budget.php' class=" btn btn-sm btn-primary text-white">
                                        <i class=" align-bottom me-1"></i> View All  Budget
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="Budget-add-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Budget Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Category"<span class="text-danger">*</span></label>
                                            <input type="text" name="category" id="category" class="form-control"
                                            style="text-transform:capitalize"placeholder="Enter Your Category" required="">
                                        </div>
                                    </div>
                                  
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Monthly Limit<span class="text-danger">*</span></label>
                                            <input type="text" name="monthly_limit" id="monthly_limit" class="form-control"
                                                placeholder="Enter monthly limit" required="">
                                        </div>
                                    </div>
                                    
                                    
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col">
                                        <div class="form-group text-right"> <!-- Align the button to the right -->
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>