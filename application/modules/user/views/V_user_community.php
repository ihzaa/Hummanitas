<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- - var description  = ""-->
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/shepherd-theme-default.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/file-uploaders/dropzone.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/users.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

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




    <!-- BEGIN: Content-->
    <div class="app-content content" style="padding-top: 5rem">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div class="card" style="height:445px">

                    <div class="card-content" style="height: 400px;">
                        <div class="card-body">
                            <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox" style="height: 400px;">
                                    <div class="carousel-item active" style="height: 400px;">
                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/slider/slide1.jpg" alt="First slide">
                                        <div class="carousel-caption">
                                            <h3 style="font-size:24px;color: rgb(0, 0, 0);
                                            text-shadow:
                                             -1px -1px 0 rgb(255, 255, 255),  
                                              1px -1px 0 rgb(255, 255, 255),
                                              -1px 1px 0 rgb(255, 255, 255),
                                               1px 1px 0 rgb(255, 255, 255);"><strong>WELCOME TO HUMMANITAS</strong></h3>
                                            <div style="margin-left:-185px;width:143%;height: 100px;;background-color: black;opacity: 60%">

                                            </div>
                                            <p style="position: absolute;margin:-70px 60px;font-size: 22px;color: white;
                                            ">Makes your community life easier with us. We give you great features to help you manage your community.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" style="height: 400px;">
                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/slider/slide2.jpg" alt="Second slide">
                                        <div class="carousel-caption">
                                            <h3 style="font-size:24px;color: rgb(0, 0, 0);
                                            text-shadow:
                                             -1px -1px 0 rgb(255, 255, 255),  
                                              1px -1px 0 rgb(255, 255, 255),
                                              -1px 1px 0 rgb(255, 255, 255),
                                               1px 1px 0 rgb(255, 255, 255);"><strong>Available Features</strong></h3>
                                            <div style="margin-left:-187px;width:143%;height: 135px;;background-color: black;opacity: 60%">

                                            </div>
                                            <p align="left" style="position: absolute;margin-top: -120px;margin-left:190px;font-size: 22px;color: white;
                                            ">- Create Community<br>
                                                - Add event for your Community<br>
                                                - Create Collaboration with other Community<br>
                                                - Financial Features<br>
                                                - Gallery to post your event photos</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" style="height: 400px;">
                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/slider/slide3.jpg" alt="Third slide">
                                        <div class="carousel-caption">
                                            <h1 style="font-size:24px;color: rgb(0, 0, 0);
                                            text-shadow:
                                             -1px -1px 0 rgb(255, 255, 255),  
                                              1px -1px 0 rgb(255, 255, 255),
                                              -1px 1px 0 rgb(255, 255, 255),
                                               1px 1px 0 rgb(255, 255, 255);">Let's get started</h1>

                                            <div class="btn round btn-dark" id="tour">Start Tour</div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="user-profile">
                    <?= $this->session->flashdata('message'); ?>
                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-12 col-12">

                                <div class="card">
                                    <section id="knowledge-base-search">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card knowledge-base-bg white">
                                                    <div class="card-header" style="border-bottom: 1px solid #cecece">
                                                        <h1 class="Black">Community List </h1><br>

                                                        <button type="button" data-toggle="modal" data-target="#myModal" id="createCommunty" class="btn btn-primary block-element mb-1">+Create Community</button>




                                                    </div>
                                                    <div class="card-content">
                                                        <br>
                                                        <!-- <div class="card-body p-sm-4 p-2"> -->

                                                        <form style="display: inline-block;margin-left: 500px;">
                                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                <input type="text" class="form-control form-control-lg" id="searchbar" placeholder="Search Community">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-search px-1"></i>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                        <!-- action="< ?= base_url('user/searchCode')  ?>" method="post" -->
                                                        <!-- <form name="getdata" method="post" action=""> -->
                                                        <div style="display: inline-block;margin-left: 200px;">

                                                            <div class="controls">
                                                                <label><strong>Search by Community Code</strong></label>
                                                                <input style="width: 180px;" type="text" class="form-control" id="codeCom" name="code" placeholder="Enter Code">
                                                            </div>
                                                        </div>
                                                        <div style="display: inline-block;margin-left: 3px;">
                                                            <button class="btn gradient-light-primary" id="hasil" style="margin-bottom: 5px;padding: 10px 5px;font-size: 10px;"><i class="feather icon-search px-1"></i></button>
                                                        </div>
                                                        <!-- </form> -->
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Knowledge base Jumbotron ends -->
                                    <!-- Knowledge base -->

                                    <!-- ' . $com[$i]['COM_NAME'] . ' -->
                                    <section id="knowledge-base-content">
                                        <div class="community">
                                            <div class="row search-content-info">

                                                <?php
                                                if (count($community) > 0) {
                                                    foreach ($community as $com) {
                                                        $id = $com->COM_ID;

                                                ?>
                                                        <div class="col-md-4 col-sm-6 col-12 search-content">
                                                            <div class="card">
                                                                <center>
                                                                    <div class="card-body text-center">

                                                                        <img src="<?= base_url('assets/img/community/profile/') . $com->COM_IMAGE; ?>" class="mx-auto mb-2" width="100" alt="knowledge-base-image">
                                                                        <h4><?php echo $com->COM_NAME ?></h4>
                                                                        <small class="text-dark" style="font-size: 15px"><strong>Malang</strong></small><br>
                                                                        <small class="text-dark"><?php echo $com->COM_ADDRESS ?></small>

                                                                    </div>
                                                                    <div class="tutorial">
                                                                        <form action="cekMember" method="post">
                                                                            <button type="submit" name="view" value="<?= $id ?>" class="btn gradient-light-primary">View</button>
                                                                        </form>
                                                                    </div>
                                                                </center>
                                                            </div>
                                                        </div>


                                                    <?php    }
                                                } else {
                                                    ?>
                                                    <div class="col-12">
                                                        <div style="height: 200px; ">
                                                            <h1 align="center" style="margin: 100px 0px">There is still no community created</h1>
                                                        </div>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                            <?php
                                            if (count($community) <= 3) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button type="button" id="moreCom" class="btn btn-primary block-element mb-1" hidden>Load More</button>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button type="button" id="moreCom" class="btn btn-primary block-element mb-1">Load More</button>
                                                    </div>
                                                </div>
                                            <?php
                                            } ?>



                                        </div>

                                    </section>
                                </div>


                            </div>

                        </div>
                </div>

                </section>
            </div>

        </div>
    </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade" id="quickJoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Quick Join</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="comDetail">
                    <!-- <div></div> -->




                </div>


                <!-- <div class="modal-footer">
                    <button type="button" style="margin-right: 190px;" class="btn btn-primary" data-dismiss="modal">Join</button> -->
                <!-- </div> -->
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Create Community</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('user/create_community'); ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Choose profile photo</label>
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" required data-validation-required-message="This name field is required">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required data-validation-required-message="This name field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Description</label>
                                <textarea type="text" class="form-control" name="desc" placeholder="Description" required data-validation-required-message="This description field is required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required placeholder="Address" data-validation-required-message="This Address field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="form-group">
                            <div class="controls">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required placeholder="Email" data-validation-required-message="This email field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Phone number" data-validation-required-message="This phone number field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Private</label>
                            <ul class="list-unstyled mb-0">
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


                            </ul>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

                </form>
            </div>
        </div>




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
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/prism.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>

        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/faq-kb.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/dropzone.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/tether.min.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/shepherd.min.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/tour.js"></script>
        <!-- END: Page JS-->
        <script src="<?= base_url('assets/'); ?>new-js/new.js"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                //     // Initiate DataTable function comes with plugin
                //     // Start jQuery click function to view Bootstrap modal when view info button is clicked
                $('#hasil').click(function() {
                    //         // Get the id of selected phone and assign it in a variable called phoneData
                    var code = $('#codeCom').val();
                    //         // Start AJAX function
                    $.ajax({
                        // Path for controller function which fetches selected phone data
                        url: "<?php echo base_url() ?>user/get_com_result",
                        // // Method of getting data
                        method: "POST",
                        // // Data is sent to the server
                        data: {
                            code: code
                        },
                        // // Callback function that is executed after data is successfully sent and recieved
                        success: function(data) {
                            // // Print the fetched data of the selected phone in the section called #phone_result
                            // // within the Bootstrap modal
                            $('#comDetail').html(data);
                            // // Display the Bootstrap modal
                            $('#quickJoin').modal('show');
                        }
                    });
                    // End AJAX function
                });
            });
        </script>
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


</body>
<!-- END: Body-->


</html>