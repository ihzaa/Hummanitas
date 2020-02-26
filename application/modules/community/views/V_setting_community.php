<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="Hummanitas">
    <meta name="author" content="Hummanitas">
    <title>Hummanitas</title>

    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>app-assets/images/logo/logoWeb.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>app-assets/images/logo/logoWeb.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url('user/user_community') ?>">
                        <div class="brand-logo">
                            <img style="height: 35px;width: 35px;" src="<?= base_url('assets/'); ?>app-assets/images/logo/logoWeb.png">
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <?php
                            $id = $user['USER_ID'];
                            $cek = $this->db->select('USER_ID')->from('community_member')->where('USER_ID', $id)->get();

                            if ($cek->num_rows() > 0) {; ?>
                                <li style="margin-left: 30px;" class="nav-item d-none d-lg-block"><a class="nav-link" href="<?php echo base_url('user') ?>" data-toggle="" data-placement="top" title="">
                                        <h4 class="feather icon-home"> Home</h4>
                                    </a></li>
                            <?php
                            } else { ?>
                                <li style="margin-left: 30px;" class="nav-item d-none d-lg-block"><a class="nav-link" href="javascript:void(0)" data-toggle="" data-placement="top" title="">
                                        <h4 class="feather icon-home" style="color:#DEDEDE"> Home</h4>
                                    </a></li>

                            <?php
                            }; ?>

                            <li style="margin-left: 50px;" class="nav-item d-none d-lg-block"><a class="nav-link" href="<?php echo base_url('user/user_community') ?>" data-toggle="" data-placement="top" title="">
                                    <h4 class="feather icon-globe"> Community</h4>
                                </a></li>

                        </ul>

                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Comunita..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main">

                                </ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App
                                            Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me
                                                    tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours
                                                    ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6>
                                                <small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour
                                                    ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation
                                                </h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last
                                                    week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu
                                                    marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last
                                                    month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?= $user['USERNAME']; ?></span></div><span><img class="round" src="<?= base_url('assets/img/user/') . $user['USER_IMAGE']; ?>" alt="avatar" height="40" width="40" style="margin-right: 20px"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo base_url('user/user_profile') ?>">
                                    <i class="feather icon-user"></i> View Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url('user/user_setting') ?>">
                                    <i class="feather icon-settings"></i> User Setting</a>
                                <div class="dropdown-divider">
                                </div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="feather icon-power"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No
                        results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="home-user.html">
                            <div class="brand-logo"></div>
                            <h2 class="brand-text mb-0">Hummanitas</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li><a style="margin-left: 100px;color:black" href="<?= base_url('community/') . $community['COM_ID']; ?>"><i class="feather icon-home"></i><span data-i18n="Dashboard">Home</span></a>
                    </li>
                    <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/event'); ?>"><i class="feather icon-calendar"></i><span data-i18n="Dashboard">Events</span></a>
                    </li>
                    <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/collaboration'); ?>"><i class="feather icon-briefcase"></i><span data-i18n="Dashboard">Collaborations</span></a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a style="margin-left: 20px" class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-dollar-sign"></i><span data-i18n="Apps">Finance</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-credit-card"></i>Incomes</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/1'); ?>" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Monthly Cash</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/2'); ?>" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Event Cash</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/3'); ?>" data-toggle="dropdown" data-i18n="Wish List"><i class="feather icon-circle"></i>Total Income</a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/outcome'); ?>" data-toggle="dropdown" data-i18n="Email"><i class="feather icon-shopping-cart"></i>Outcomes</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/total'); ?>" data-toggle="dropdown" data-i18n="Email"><i class="feather icon-shopping-bag"></i>Profit/Loss</a>
                            </li>
                        </ul>
                    </li>
                    <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/gallery'); ?>"><i class="feather icon-image"></i><span data-i18n="Dashboard">Gallery</span></a>
                    </li>
                    <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/member'); ?>"><i class="feather icon-users"></i><span data-i18n="Dashboard">Member
                                List</span></a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a style="margin-left: 20px" class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-more-horizontal"></i><span data-i18n="Others">Others</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/memberManagement'); ?>" data-toggle="dropdown" data-i18n="Documentation"><i class="feather icon-user-check"></i>Member Management</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/setting'); ?>" data-toggle="dropdown" data-i18n="Documentation"><i class="feather icon-settings"></i>Setting Community</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="home-user.html" data-toggle="dropdown" data-i18n="Raise Support"><i class="feather icon-log-out "></i>Leave Community</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" data-target="#myModal" data-toggle="modal" data-i18n="Raise Support"><i class="feather icon-alert-circle"></i>Report</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </div>
    </div>
    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Community Settings</h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        General
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                        Management setting
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <?= form_open_multipart('community/' . $community['COM_ID'] . '/setting_community1'); ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label style="margin-left: 20px">Change image community</label>

                                                            <br><br>
                                                            <img src=" <?= base_url('assets/img/community/profile/') . $community['COM_IMAGE']; ?>" style="height: 100px;width: 100px;border-radius: 10%;margin-left: 20px">
                                                            <br><br>

                                                            <div class="row align-items-center">


                                                                <div class="col-sm-3">
                                                                    <div class="custom-file">

                                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label style="margin-left: 20px">Change cover community</label>
                                                            <br><br>

                                                            <img src="<?= base_url('assets/img/community/cover/') . $community['COM_COVER']; ?>" style="height: 200px;width: 450px">
                                                            <br><br>
                                                            <div class="row align-items-center">


                                                                <div class="col-sm-6">
                                                                    <div class="custom-file">

                                                                        <input type="file" class="custom-file-input" id="cover" name="cover">
                                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="accountTextarea">description</label>
                                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="description"><?= $community['COM_DESC'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-validation-required-message="This name field is required" value="<?= $community['COM_NAME'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Location</label>
                                                                <input type="text" class="form-control" id="location" name="location" required placeholder="Location" data-validation-required-message="This Address field is required" value="<?= $community['COM_LOC'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" id="address" name="address" required placeholder="Address" data-validation-required-message="This Address field is required" value="<?= $community['COM_ADDRESS'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>E-mail</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required data-validation-required-message="This email field is required" value="<?= $community['COM_EMAIL'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-phone">Phone</label>
                                                                <input type="text" class="form-control" id="account-phone" name="phone" required placeholder="Phone number" data-validation-required-message="This phone number field is required" value="<?= $community['COM_TELP'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Private</label>
                                                            <ul class="list-unstyled mb-0">
                                                                <?php if ($community['ISPUBLIC'] == 1) {
                                                                ?>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con">
                                                                                <input type="radio" name="vueradio" checked value="1">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                Yes
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con">
                                                                                <input type="radio" name="vueradio" value="0">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                No
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                <?php } else {
                                                                ?>

                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con">
                                                                                <input type="radio" name="vueradio" value="1">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                Yes
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="vs-radio-con">
                                                                                <input type="radio" name="vueradio" checked value="0">
                                                                                <span class="vs-radio">
                                                                                    <span class="vs-radio--border"></span>
                                                                                    <span class="vs-radio--circle"></span>
                                                                                </span>
                                                                                No
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>

                                                                <?php } ?>



                                                            </ul>
                                                        </div>
                                                    </div>



                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <select class="select2 form-control">
                                                                    <option value="Leader">Leader</option>
                                                                    <option value="rectangle">yusuf</option>
                                                                    <option value="rombo">Azmi</option>
                                                                    <option value="romboid">recky</option>
                                                                    <option value="trapeze">alif</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <select class="select2 form-control">
                                                                    <option value="Leader">vice leader</option>
                                                                    <option value="rectangle">yusuf</option>
                                                                    <option value="rombo">Azmi</option>
                                                                    <option value="romboid">recky</option>
                                                                    <option value="trapeze">alif</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <select class="select2 form-control">
                                                                    <option value="Leader">finance manager</option>
                                                                    <option value="rectangle">yusuf</option>
                                                                    <option value="rombo">Azmi</option>
                                                                    <option value="romboid">recky</option>
                                                                    <option value="trapeze">alif</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <select class="select2 form-control">
                                                                    <option value="Leader">secretary</option>
                                                                    <option value="rectangle">yusuf</option>
                                                                    <option value="rombo">Azmi</option>
                                                                    <option value="romboid">recky</option>
                                                                    <option value="trapeze">alif</option>

                                                                </select>
                                                            </div>
                                                        </div>






                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="http://www.hummasoft.com/" target="_blank">Hummasoft</a>All rights Reserved</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/account-setting.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Report Community</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <form method="post" action="<?= base_url('community/' . $community['COM_ID'] . '/report') ?>">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="report[]" value="Pornography">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Pornography</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="report[]" value="Deception">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Deception</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="report[]" value="Racism">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Racism</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="report[]" value="Inactive">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Inactive</span>
                                        </div>
                                    </fieldset>
                                </li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <textarea rows="4" id="textarea" name="report[]" placeholder="Or describe the problem here" style="width: 475px; height:100px ; margin-left: 16px; padding: 10px;"></textarea>
                    <label class="control-label" for="textarea"></label><i class="mtrl-select"></i>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Report</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
<!-- END: Body-->

</html>