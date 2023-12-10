<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$user = "SELECT * FROM users WHERE id=$user_id";
$user_info = mysqli_query($db_connect, $user);
$after_assoc_user_info = mysqli_fetch_assoc($user_info);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>absiddikdm Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/deadlock/admin_asset/images/favicon.png">
	<link rel="stylesheet" href="/deadlock/admin_asset/vendor/chartist/css/chartist.min.css">
    <link href="/deadlock/admin_asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="/deadlock/admin_asset/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/deadlock/admin_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

      <style>
        .card{
            height:auto !important;
        }
      </style>



</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="/deadlock/admin_asset/images/logo.png" alt="">
                <img class="logo-compact" src="/deadlock/admin_asset/images/logo-text.png" alt="">
                <img class="brand-title" src="/deadlock/admin_asset/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <?php if($after_assoc_user_info['image'] == null){?>
                                    <img src="/deadlock/admin_asset/image/profile/17.jpg" width="20" alt=""/>
                                        <?php } else{?>
                                         <img src="/deadlock/uploads/user/<?=$after_assoc_user_info['image']?>" width="20" alt=""/>
                                             <?php } ?>

									<div class="header-info">
										<span class="text-black"><strong><?= $after_assoc_user_info['name']?>
                                    </strong></span>
										<p class="fs-12 mb-0">Super Admin</p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/deadlock/users/profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                          <a href="/deadlock/logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="/deadlock/admin.php">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/deadlock/users/user_list.php">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">User List</span>
						</a>
                        </li>
                    <li><a class="has-arrow ai-icon" href="/deadlock/logo/logo.php">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Logo</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/deadlock/about/about.php">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">About Me</span>
						</a>
                    <li><a class="has-arrow ai-icon" href="/deadlock/expertise/expertise.php">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Expertise</span>
						</a>
                    </li>
                    <li><a href="/deadlock/service/service.php"class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Service</span>
						</a>
					</li>
                    <li><a class="has-arrow ai-icon" href="/deadlock/portfolio/portfolio.php" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Portfolio</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/deadlock/client/client.php">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Client List</span>
						</a>
                    </li>
                        <ul aria-expanded="false">
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->