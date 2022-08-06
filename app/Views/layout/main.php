<?php
$session = \Config\Services::session();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <?= $this->renderSection('title') ?>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?=base_url()?>/template/assets/images/favicon.ico">

        <link href="<?=base_url()?>/template/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>/template/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>/template/assets/css/style.css" rel="stylesheet" type="text/css">
        
        <script src="<?=base_url()?>/template/assets/js/jquery.min.js"></script>
        <link href="<?=base_url()?>/template/assets/plugins/node_modules/sweetalert2/dist/sweetalert2.min.css" type="text/css">
        <link href="<?=base_url()?>/template/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"> 
        <link href="<?=base_url()?>/template/assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
                        <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>/template/assets/images/logo.png" height="24" alt="logo"></a> -->
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                        <?= $this->include('layout/menu') ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0"> 
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="<?=base_url()?>/template/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                        <h5>
                                        <?= $session->get('nama_user'); ?> (<?= $session->get('levelnama'); ?>)
                                         </h5>
                                        </div>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="login/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                                <li class="hide-phone app-search">
                                    <form role="search" class="">
                                        <input type="text" placeholder="Search..." class="form-control">
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </form>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                            <div class="row">
                            <?= $this->renderSection('pagetitle') ?>
                            </div>
                            <div class="row">
                            <?= $this->renderSection('content') ?>
                            </div>
                                <!-- end page title end breadcrumb -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2022 APSM by SRPEkspress.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="<?=base_url()?>/template/assets/js/popper.min.js"></script>
        <script src="<?=base_url()?>/template/assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>/template/assets/js/modernizr.min.js"></script>
        <script src="<?=base_url()?>/template/assets/js/detect.js"></script>
        <script src="<?=base_url()?>/template/assets/js/fastclick.js"></script>
        <script src="<?=base_url()?>/template/assets/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url()?>/template/assets/js/jquery.blockUI.js"></script>
        <script src="<?=base_url()?>/template/assets/js/waves.js"></script>
        <script src="<?=base_url()?>/template/assets/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url()?>/template/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?=base_url()?>/template/assets/js/app.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/timepicker/moment.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>

    </body>
</html>