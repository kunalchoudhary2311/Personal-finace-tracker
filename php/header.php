<?php
session_start();
include 'inc/database.php';
$user = $_SESSION['user_login'];

$id = $user['id'];


$db = $database = new Database();

if (!isset($_SESSION['user_login'])) {

    header("location:login.php");
}
date_default_timezone_set("asia/kolkata");

$username = $user['Name'];
$currentMonth = date("F");
$currentYear = date("Y");

?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jul 2022 06:33:45 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Personal Finance Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

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


</head>
<style>
    .bold-text {
        font-weight: bold;
        font-size: 1.0em;
    }
</style>
<style>
    .bold-white-text {
        color: white;
        font-weight: 500;
    }

    .white-icon {
        color: white;
    }
</style>

<body>
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="./assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img style="height:100px;" src="./assets/images/logo-dark.png" alt="" height="37">
                                </span>
                            </a>
                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="./assets/images/logo-black.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img style="height:100px;" src="./assets/images/logo-black.png" alt="" height="37">
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <!-- App Search-->

                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="./assets/images/users/user-dummy-img.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            <?php echo ucwords($_SESSION['user_login']['Name']); ?>
                                        </span>

                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome To
                                    <?php echo $_SESSION['user_login']['Name']; ?>
                                </h6>
                                <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="margin-bottom: 10px;">
                <!-- Dark Logo-->
                <a href="index.php" class="logo logo-dark">
                    <h4 class="fw-bold text-dark mb-0">PFT</h4>
                    <small class="text-muted">Personal Finance Tracker</small>
                </a>

                <a href="index.php" class="logo logo-light">
                    <h4 class="fw-bold text-white mb-0">PFT</h4>
                    <small class="text-white-50">Personal Finance Tracker</small>
                </a>
               
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">

                        <li class="nav-item" style="margin-top:5px;">
                            <a class="nav-link menu-link" href="#customers2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="customers2">
                                <i class="ri-money-dollar-circle-fill white-icon" style="font-size: 1.5em;"></i><span data-key="t-authentication" class="bold-white-text">Income</span>
                            </a>
                            <div class="collapse menu-dropdown" id="customers2">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="income-add.php">
                                            <i class="bi bi-person"></i>
                                            Add Income
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="income.php">
                                            <i class="bi bi-person"></i>
                                            View All Income
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#customers3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="customers3">
                                <i class="ri-shopping-cart-fill white-icon" style="font-size: 1.5em;"></i> <span data-key="t-authentication" class="bold-white-text">Expense</span>
                            </a>
                            <div class="collapse menu-dropdown" id="customers3">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="Expense-add.php">
                                            <i class="bi bi-person"></i>
                                            Add Expense
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="Expense.php">
                                            <i class="bi bi-person"></i>
                                            View Expense List
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a id="inward" class="nav-link menu-link" href="Budget-add.php">
                                <i class="bx bxs-wallet white-icon" style="font-size: 1.5em;"></i> <span data-key="t-authentication" class="bold-white-text">Budget</span> </a>
                        </li>


                        <li class="nav-item">
                            <a id="outward" class="nav-link menu-link" href="Transaction.php">
                                <i class="bx bx-transfer white-icon" style="font-size: 1.5em;"></i> <span data-key="t-authentication" class="bold-white-text">Transaction</span> </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-settings-3-fill white-icon" style="font-size: 1.5em;"></i> <span data-key="t-authentication" class="bold-white-text">Settings</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="change-password.php">
                                            <i class="bi bi-person"></i>
                                            Change Password
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="logout.php">
                                            <i class="bi bi-person"></i>
                                            Logout
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="Profile.php">
                                            <i class="bi bi-person"></i>
                                            Profile
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </div>
</body>


<script>
    function delete_confirm() {
        return confirm('Are you sure you want to delete this Record.');
    }
</script>



</html>
<!-- Left Sidebar End -->