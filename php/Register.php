<!doctype html>
<html lang="en" dir="ltr">

<!-- soccer/project/register.html  07 Jan 2020 03:42:43 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Personal Finance tracker</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets-2/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Core css -->
<link rel="stylesheet" href="assets-2/css/main.css"/>
<link rel="stylesheet" href="assets-2/css/theme1.css"/>


</head>

<body class="font-montserrat">
<form action="Register-save.php" method="post">

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-50">
        <div class="card">  
             <div class="card-body">
                <div class="text-center">Create new account</div>
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="Name"  class="form-control" style="text-transform: capitalize;"  placeholder="Enter your  name" required>
                </div>
            
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email"  name="Email_id"class="form-control" placeholder="Enter your email" required >
                </div>
                            
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name ="Password" class="form-control" placeholder="Password" required>
                </div>
               
                <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create new account</button>
                </div>
            </div>
            <div class="text-center text-muted">
                Already have account? <a href="login.php">Sign in</a>
            </div>
        </div>
    </div>
    <div class="auth_right full_img"></div>
</div>
           </div>
         </div>
     </div>
</div>

<script src="assets-2/bundles/lib.vendor.bundle.js"></script>
<script src="assets-2/js/core.js"></script>
</form>
</body>

<!-- soccer/project/register.html  07 Jan 2020 03:42:43 GMT -->
</html>