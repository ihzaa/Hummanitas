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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/app-chat.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">

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
                                <input class="input" name="keyword" id="keyword" type="text" placeholder="Explore hummanitas..." tabindex="-1">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main" id="result">
                                    <div class="list-group analytics-list">

                                    </div>
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
                    <div class="mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/doc.png" alt="png" height="32"></div>
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
                    <div class="avatar mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
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

        <div class="col-md-12 col-sm-12" style="margin-top: 30px;">
            <div class="card" id="request" style="margin: 0px 20px">
                <div class="card-header" style="padding: 20px 20px;">
                    <h4 class="card-title">Collaboration Request </h4><span style="position:absolute;margin-left: 230px; font-size: 12px;" class="badge badge-primary badge-pill float-right"><?= count($request) ?></span>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse">
                    <div class="card-body">
                        <?php if (count($request) > 0) {

                            // echo $name;
                            // echo $community['COM_ID'];
                            foreach ($request as $request) {
                                $id = $request->COLLAB_ID;
                        ?>
                                <div class="row align-items-center">
                                    <div class="col-1">
                                        <img style="width: 80px; height: 80px; border-radius: 7px;" src="<?= base_url('assets/img/community/collab/' . $request->COLLAB_THUMBNAIL);  ?>" alt="avtar img holder">
                                    </div>
                                    <div class="col-8" style="border-left: 1px solid rgb(226, 226, 226);border-right: 1px solid rgb(226, 226, 226);">
                                        <h5><?= $request->COLLAB_NAME ?></h5>
                                        <p><?= $request->COLLAB_DESC ?></p>
                                    </div>
                                    <div class="col-3">
                                        <div style="margin-left: 20px;">
                                            <h5 style="margin-left: 80px;">Sender:</h5>
                                            <h5 style="margin-bottom: 10px;"><a href="<?= base_url('community/') . $request->SENDER_ID ?>"><?= $request->SENDER ?></a></h5>
                                            <form action="<?= base_url('community/' . $community['COM_ID']) . '/collaboration/accept' ?>" style="display: inline-block;" method="post">
                                                <button type="submit" name="accept" value="<?= $request->COLMEM_ID ?>" class="btn btn-relief-primary mr-1 mb-1">Confirm</button>
                                            </form>
                                            <form action="<?= base_url('community/' . $community['COM_ID']) . '/collaboration/reject' ?>" style="display: inline-block;" method="post">
                                                <button type="submit" name="reject" value="<?= $request->COLMEM_ID ?>" class="btn btn-relief-danger mr-1 mb-1">Reject</button>
                                            </form>
                                        </div>



                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="col-12">
                                <div style="height: 100px; ">
                                    <h4 align="center" style="margin: 100px 0px">No request available</h4>
                                </div>
                            </div>
                        <?php }; ?>


                    </div>
                </div>
            </div>
            <br>
            <?= $this->session->flashdata('message'); ?>
            <div class="content-area-wrapper" style="height: 550px;">
                <div class="sidebar-left">
                    <div class="sidebar">
                        <!-- User Chat profile area -->
                        <div class="chat-profile-sidebar">
                            <header class="chat-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE'] ?>" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-online avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name"><?= $user['USERNAME'] ?></h4>
                                </div>
                            </header>
                            <div class="profile-sidebar-area">
                                <div class="scroll-area">
                                    <h6>About</h6>
                                    <div class="about-user">
                                        <fieldset class="mb-0">
                                            <textarea data-length="120" class="form-control char-textarea" id="textarea-counter" rows="5" readonly placeholder="About User"><?= $user['BIO'] ?></textarea>
                                        </fieldset>
                                        <small class="counter-value float-right"><span class="char-count">108</span> /
                                            120
                                        </small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--/ User Chat profile area -->
                        <!-- Chat Sidebar area -->
                        <div class="sidebar-content card" style="height: 550px;">
                            <span class="sidebar-close-icon">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="chat-search" style="margin-top: 10px; margin-left: 5px;">
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                        <div class="avatar">
                                            <img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE'] ?>" alt="user_avatar" height="40" width="40">
                                            <span class="avatar-status-online"></span>
                                        </div>
                                        <div class="bullet-success bullet-sm position-absolute"></div>
                                    </div>
                                    <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                        <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat">
                                        <div class="form-control-position">
                                            <i class="feather icon-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="users-list" class="chat-user-list list-group position-relative" style="margin-top: 0px;">
                                <h3 class="primary p-1 mb-0" style="border-bottom: 1px solid rgb(197, 197, 197);">
                                    Collaboration List</h3>
                                <a href="" id="new" style="margin: 10px auto;" data-toggle="modal" data-target="#createCollab" class="">+New
                                    Collaboration</a>
                                <ul class="chat-users-list-wrapper media-list" id="collab-list">
                                    <?php if (count($collab) > 0) {

                                        // echo $name;
                                        // echo $community['COM_ID'];
                                        foreach ($collab as $collab) {
                                            $id = $collab->COLLAB_ID;
                                    ?>

                                            <li data-id="<?= $id ?>">
                                                <div class="pr-1">
                                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="<?= base_url('assets/img/community/collab/' . $collab->COLLAB_THUMBNAIL);  ?>" height="42" width="42" alt="Generic placeholder image">
                                                        <i></i>
                                                    </span>
                                                </div>

                                                <div class="user-chat-info">
                                                    <div class="contact-info">
                                                        <h5 class="font-weight-bold mb-0"><?= $collab->COLLAB_NAME ?></h5>
                                                        <p class="truncate"><?= count($this->db->get_where('collab_member', ['COLLAB_ID' => $id])->result()); ?> Community follow</p>
                                                    </div>
                                                    <div class="contact-meta">
                                                        <span class="float-right mb-25">4:14 PM</span>
                                                        <span class="badge badge-primary badge-pill float-right">3</span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                    } else { ?>
                                        <div class="col-12">
                                            <div style="height: 100px; ">
                                                <h4 align="center" style="margin: 100px 0px">No collaboration available</h4>
                                            </div>
                                        </div>
                                    <?php }; ?>
                                </ul>
                            </div>
                        </div>
                        <!--/ Chat Sidebar area -->

                    </div>
                </div>
                <div class="content-right" style="height: 550px;">
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <div class="chat-overlay"></div>
                            <section class="chat-app-window" style="height: 550px;">
                                <div class="start-chat-area" style="height: 550px;">
                                    <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                    <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                                </div>
                                <div class="active-chat d-none">
                                    <div class="chat_navbar">
                                        <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                            <div class="vs-con-items d-flex align-items-center">
                                                <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                                                <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                    <img src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-1.jpg" alt="" height="40" width="40" />
                                                </div>
                                                <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                    <img src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-7.jpg" alt="" height="40" width="40" />
                                                </div>
                                            </div>
                                        </header>
                                    </div>
                                    <div class="user-chats" id="user-chats" style="height: 400px;">

                                        <div class="chats">

                                        </div>
                                        <div id="scroll"></div>
                                    </div>
                                    <div class="chat-app-form">
                                        <form class="chat-app-input d-flex" action="javascript:void(0);">
                                            <input type="text" class="form-control message mr-1 ml-50" id="send" name="send" placeholder="Type your message">
                                            <!-- <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i>
                                                <span class="d-none d-lg-block">Send</span></button> -->
                                        </form>
                                    </div>
                                </div>
                            </section>
                            <!-- User Chat profile right area -->
                            <div class="user-profile-sidebar">
                                <header class="user-profile-header">
                                    <span class="close-icon">
                                        <i class="feather icon-x"></i>
                                    </span>
                                    <div class="header-profile-sidebar">
                                        <div class="avatar">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="user_avatar" height="70" width="70">
                                        </div>
                                        <h4 class="chat-user-name">Komunitas Pecinta Kucing</h4>
                                    </div>
                                </header>
                                <div class="user-profile-sidebar-area p-2">
                                    <h6>About</h6>
                                    <p>Deskripsi dari komunitas ini adalah ......</p>
                                </div>
                            </div>


                            <div class="user-profile-sidebar">
                                <header class="user-profile-header">
                                    <span class="close-icon">
                                        <i class="feather icon-x"></i>
                                    </span>
                                    <div class="header-profile-sidebar">
                                        <div class="avatar">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="user_avatar" height="70" width="70">
                                        </div>
                                        <h4 class="chat-user-name">Komunitas Bola Basket</h4>
                                    </div>
                                </header>
                                <div class="user-profile-sidebar-area p-2">
                                    <h6>About</h6>
                                    <p>Deskripsi dari komunitas ini adalah ......</p>
                                </div>
                            </div>
                            <!--/ User Chat profile right area -->

                        </div>
                    </div>
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
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/app-chat.js"></script>

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
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="Pornography">
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
                                            <input type="checkbox" value="Deception">
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
                                            <input type="checkbox" value="Racism">
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
                                            <input type="checkbox" value="Inactive">
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
                        <textarea rows="4" id="textarea" placeholder="Or describe the problem here" style="width: 475px; height:100px ; margin-left: 16px; padding: 10px;" required="required"></textarea>
                        <label class="control-label" for="textarea"></label><i class="mtrl-select"></i>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Report</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="createCollab" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Create Collaboration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('community/' . $community['COM_ID'] . '/createCollab'); ?>
                        <div class="col-12">
                            <p>Choose Collaboration Thumbnail</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" required data-validation-required-message="This name field is required">
                                <label class="custom-file-label" for="image">Choose file</label>

                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="controls">
                                    </br>
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required data-validation-required-message="This name field is required">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <p>Description</p>
                            <div class="form-group">
                                <textarea rows="4" id="desc" name="desc" style="width: 100%;" required="required"></textarea>

                            </div>
                            <p>Choose Participating Community</p>
                        </div>

                        <div class="form-group" style="margin: 0 16px;">
                            <select data-placeholder="Select a state..." name="multiple[]" class="select2-icons form-control" id="multiple-select" multiple="multiple">

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    </form>
                </div>
            </div>


            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/forms/select/form-select2.js"></script>

            <!-- searching -->
            <script>
                $(document).ready(function() {
                    $('#keyword').keyup(function() {
                        var search = $('#keyword').val();
                        if (search != '') {
                            $.ajax({
                                url: "<?= base_url('ajax') ?>",
                                method: "POST",
                                data: {
                                    search: search
                                },
                                success: function(data) {
                                    $('#result').html(data);
                                }
                            });
                        }
                    });
                });
            </script>
            <!-- menampilkan list komunitas di modal select -->
            <script>
                $(document).ready(function() {
                    $("#new").click(function() {
                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/listCom') ?>",
                            method: "POST",
                            dataType: "json",
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i in data) {
                                    html += '<option value="' + data[i].COM_ID + '">' + data[i].COM_NAME + ' (' + data[i].COM_EMAIL + ') </option>'
                                }
                                $('#multiple-select').html(html);
                            }
                        });
                    });
                });
            </script>
            <!-- load chat kolaborasi -->
            <script>
                $(document).ready(function() {

                    $("#collab-list li").click(function() {
                        var id = $('#collab-list').find('li.active').data('id');

                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/getChat') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $(".chats").html(data);
                                // $(".user-chats").scrollTop($(".user-chats > .chats").height());
                                $(".user-chats").animate({
                                    scrollTop: $(".user-chats > .chats")[0].scrollHeight
                                }, 100);
                            }

                        });

                    });


                    function get_chat_message() {

                        var id = $('#collab-list').find('li.active').data('id');
                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/getChat') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $(".chats").html(data);
                                //tes
                                // $(".user-chats").scrollTop($(".user-chats > .chats").height());
                            }

                        });
                    }

                    setInterval(function() {
                        get_chat_message();
                    }, 2500);
                });
            </script>
            <!-- menyimpan chat baru ke database -->
            <script>
                $(document).ready(function() {

                    $(".message").keyup(function(event) {

                        var id = $('#collab-list').find('li.active').data('id');
                        var message = $('.message').val();

                        if (event.keyCode === 13) {
                            if (message != "") {
                                $.ajax({
                                    url: "<?= base_url('ajax/' . $community['COM_ID'] . '/chat') ?>",
                                    method: "POST",
                                    data: {
                                        message: message,
                                        id: id
                                    },
                                    success: function(data) {
                                        $(".chats").append(data);
                                        $(".message").val("");
                                        $(".user-chats").scrollTop($(".user-chats > .chats").height());
                                    }

                                });

                            }
                        }
                    });

                });
            </script>
</body>
<!-- END: Body-->

</html>