<?php
ob_start();
session_start();
require_once 'inc/database.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Email_id = trim($_POST['Email_id'] ?? '');
    $Password = $_POST['Password'] ?? '';

    $database = new Database();
    $user = $database->get('users', '*', ['Email_id' => $Email_id]);

    if (!$user || !password_verify($Password, $user['Password'])) {
        $error_message = 'Invalid email or password';
    }
    elseif (!empty($user['is_verified']) && (int)$user['is_verified'] !== 1) {
        $error_message = 'Please verify your email before login';
    }
    else {
        $_SESSION['user_login'] = $user;
        header('Location: index.php');
        exit;
    }
}
?>


<?php
$company = 'Personal Finance Tracker';
$title = $company;
$logo = "Personal Finance Tracker";
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
  data-sidebar-image="none">

<head>

  <meta charset="utf-8" />
  <title>Welcome to
    <?php echo $title; ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Layout config Js -->
  <script src="assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles" style="background-image: url(assets/images/bg.jpg); background-repeat: no-repeat;">
<div class="bg-overlay"></div>
      <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0 0 1440 120">
          <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
        </svg>
      </div>
    </div>
    <!-- auth page content -->
    <div class="auth-page-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
              <div>
                <a href="#" class="d-inline-block auth-logo">
                  <img src="assets/images/logo.png" alt="" height="20" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- auth-page wrapper -->
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
              <div class="card-body p-4">
                <div class="text-center mt-2">
                  <h5 class="text-primary">Welcome Back !</h5>
                  <p class="text-muted">Sign in to continue to
                    <?php echo $company; ?>.
                  </p>
                  <?php if (isset($error_message)) { ?>
                    <p style="color:red;">
                      <?php echo $error_message; ?>
                    </p>
                  <?php } ?>
                </div>
                <div class="mt-4">
                  <form class="needs-validation" action="" method="POST" id="login-form">
                    <div class="mb-3">
                      <label for="useremail" class="form-label">Email ID <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="mobile_number" name="Email_id"
                        placeholder="Enter Email_id" autofocus="" required>
                      <div class="invalid-feedback">
                        Please enter mobile number
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="password-input">Password</label>
                      <div class="position-relative auth-pass-inputgroup">
                        <input type="password" name="Password" class="form-control pe-5 password-input"
                          onpaste="return false" placeholder="Enter password" id="password-input" name="password-input"
                          aria-describedby="passwordInput" required>
                        <button
                          class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                          type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        <div class="invalid-feedback">
                          Please enter password
                        </div>
                      </div>
                    </div>
                    <div class="mt-4">
                      <button class="btn btn-success w-100" type="submit" name="login">Sign In</button>
                    </div>
                      <div class="text-center text-muted">
                          Create a account? <a href="Register.php">Sign in</a>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <p class="mb-0">&copy;
                <script>
                  document.write(new Date().getFullYear())
                </script>
                <?php echo $company; ?>. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                Kunal choudhary.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer -->
  </div>
</body>
<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>

<!-- password-addon init -->
<script src="assets/js/pages/password-addon.init.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>

<!-- particles js -->
<script src="assets/libs/particles.js/particles.js"></script>
<!-- particles app js -->
<script src="assets/js/pages/particles.app.js"></script>
<!-- validation init -->
<script src="assets/js/pages/form-validation.init.js"></script>
<!-- password create init -->
<script src="assets/js/pages/passowrd-create.init.js"></script>

</html>