<?php
require_once("config/connection.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Project Administrator IT Division</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
		
    </head>
    <body>
        <div id="wrapper">
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <div class="topbar-left">
                        <a href="index.html" class="logo">
                            <span>
                                <img src="assets/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                                <img src="assets/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>
                    <div class="user-box">
                        <div class="user-img">
                            <img src="assets/images/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="#">Aning Herawati</a> </h5>
                        <p class="text-muted">Project Admin</p>
                    </div>
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-dashboard"></i> <span> Dashboard </span>
                                </a>
                            </li>
							<li>
                                <a href="index.php?page=project">
                                    <i class="fa fa-th-large"></i> <span> Project </span>
                                </a>
                            </li>
							<li>
                                <a  > <i class="fa fa-users"></i> <span> Team </span>
								<span class="menu-arrow"></span>
								<ul class="nav-second-level collapse" aria-expanded="true" style="">
                                    <li><a href="index.php?page=team">Team Info</a></li>
                                    <li><a href="index.php?page=team-setup">Team Setup</a></li>
                                    
                                </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="content-page">
                <div class="topbar">
                    <nav class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1">Maxine K <i class="fa fa-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Settings</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-help"></i> <span>Support</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-lock"></i> <span>Lock Screen</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to Project Admin IT Division</li>
                                    </ol>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
								<?php require_once("content.php");?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.min.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="assets/lib/flot-chart/curvedLines.js"></script>
        <script src="assets/lib/flot-chart/jquery.flot.axislabels.js"></script>
        <script src="assets/lib/jquery-knob/jquery.knob.js"></script>
        <script src="assets/js/jquery.dashboard.init.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>