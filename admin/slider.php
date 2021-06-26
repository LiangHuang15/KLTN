<?php
session_start();
if(isset($_SESSION["UserID_admin"]) && isset($_SESSION["Username_admin"]))
{
    $admin=$_SESSION["Username_admin"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Dashboard</title>
    
    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />
    <!-- upload img file -->
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<!-- data table -->
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Trang quản lý</li>

                        <li class="sidebar-item active ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="fas fa-film"></i>
                                <span>Quản lý phim</span>
                            </a>
                            <ul class="submenu ">
                            <li class="submenu-item ">
                                    <a href="all_movies.php">Tất cả phim</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="add_new_movie.php">Thêm phim mới</a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="fas fa-users-cog"></i>
                                <span>Người dùng</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="all_users.php">Người dùng</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#">Thêm người dùng</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Thống kê báo cáo</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="movie_chart.php">Thống kê theo phim</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="user_chart.php">Thống kê theo người dùng</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                            <i class="fas fa-sign-out-alt"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </li>













                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" style="padding-top:1%;">
        <header class='mb-3 pl-0'>
                <nav class="navbar navbar-expand navbar-light" style="padding-left:0;">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                        
                                            <h6 class="mb-0 text-gray-600"><?php echo $admin?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>

                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
<?php
        }
?>