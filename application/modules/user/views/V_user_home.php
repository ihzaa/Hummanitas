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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
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
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
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

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content" style="padding-top: 4rem">
        <div class="content-wrapper" style="margin-top: -100px;">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">User</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active">Home
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div id="user-profile">

                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="card">
                                    <div class="card-header mx-auto pb-0">
                                        <div class="row m-0">
                                            <div class="col-sm-12 text-center">
                                                <h4><?php
                                                    if ($user['NAME'] == NULL) {
                                                        echo $user['USERNAME'];
                                                    } else {
                                                        echo $user['NAME'];
                                                    } ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body text-center mx-auto">
                                            <div class="avatar avatar-xl">
                                                <img class="img-fluid" src="<?= base_url('assets/img/user/') . $user['USER_IMAGE']; ?>" alt="img placeholder">
                                            </div>

                                            <a href="<?php echo base_url('user/user_profile') ?>" class="btn gradient-light-primary btn-block mt-2">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>About Me</h4>
                                        <div class="dropdown">
                                            <a data-toggle="dropdown"><i class="feather icon-more-horizontal cursor-pointer"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-account-settings.html">Edit Info</a></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love
                                            jujubes.
                                            Topping cake wafer.</p>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Phone Number</h6>
                                            <p>031826739881</p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Lives:</h6>
                                            <p>Jl. Ngampelsari, Malang</p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Email:</h6>
                                            <p>bucketful@fiendhead.org</p>
                                        </div>
                                        <!-- <div class="mt-1">
                                            <h6 class="mb-0">Website:</h6>
                                            <p>www.pixinvent.com</p>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Following Community</h4>
                                    </div>
                                    <div class="card-body suggested-block">
                                        <?php if (count($user_com) > 0) {
                                            foreach ($user_com as $com) {
                                                $id = $com->COM_ID;
                                        ?>
                                                <div class="d-flex justify-content-start align-items-center mb-1">
                                                    <div class="avatar mr-50">
                                                        <img src="<?= base_url('assets/img/community/profile/' . $com->COM_IMAGE); ?>" alt="avtar img holder" height="35" width="35">
                                                    </div>
                                                    <div class="user-page-info">
                                                        <a href="<?= base_url('community/') . $com->COM_ID; ?>">
                                                            <p><?= $com->COM_NAME ?></p>
                                                        </a>
                                                        <span class="font-small-2"><?= count($this->db->get_where('community_member', ['COM_ID' => $id])->result()); ?> Members</span>
                                                    </div>

                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <h4>No community followed</h4>
                                            </div>
                                        <?php
                                        }; ?>

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="post">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-1">
                                                    <img src="<?= base_url('assets/'); ?>app-assets/images/profile/user-uploads/user-01.jpg" alt="avtar img holder" height="45" width="45">
                                                </div>
                                                <div class="user-page-info">
                                                    <p class="mb-0"><a href="<?php echo base_url('user/user_profile_guest') ?>" style="color: black;"><strong>Leeanna
                                                                Alvord</strong></a> posted to
                                                        <a href="home-community.html"><strong>Komunitas Pecinta
                                                                Kucing</strong></a></p>
                                                    <span class="font-small-2">12 Dec 2018 at 1:16 AM</span>
                                                </div>
                                            </div>
                                            <p>I love jujubes wafer pie ice cream tiramisu. Chocolate I love pastry
                                                pastry
                                                sesame snaps wafer. Pastry topping biscuit lollipop topping I love lemon
                                                drops sweet roll bonbon. Brownie donut icing.</p>
                                            <img class="img-fluid card-img-top rounded-sm mb-2" src="<?= base_url('assets/'); ?>app-assets/images/profile/post-media/2.jpg" alt="avtar img holder">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="d-flex align-items-center">
                                                    <i class="feather icon-heart font-medium-2 mr-50" data-toggle="tooltip" title="Like"></i>
                                                    <span>145</span>
                                                    <i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
                                                    <span>77</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-50">
                                                    <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0"><a href="" style="color: black;">Kitty Allanson</a>
                                                    </h6>
                                                    <span class="font-small-2">orthoplumbate morningtide naphthaline
                                                        exarteritis</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-2">
                                                <div class="avatar mr-50">
                                                    <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0"><a href="" style="color: black;">Jeanie Bulgrin</a>
                                                    </h6>
                                                    <span class="font-small-2">blockiness pandemy metaxylene speckle
                                                        coppy</span>
                                                </div>
                                            </div>
                                            <fieldset class="form-label-group mb-50">
                                                <textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
                                                <label for="label-textarea">Add Comment</label>
                                            </fieldset>
                                            <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-1">
                                                    <img src="<?= base_url('assets/'); ?>app-assets/images/profile/user-uploads/user-01.jpg" alt="avtar img holder" height="45" width="45">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">Leeanna Alvord</h6>
                                                    <span class="font-small-2">11 Dec 2018 at 1:35 AM</span>
                                                </div>
                                                <div class="ml-auto user-like"><i class="feather icon-heart"></i></div>
                                            </div>
                                            <p>Candy jelly beans powder brownie biscuit. Jelly marzipan oat cake cake.
                                                Cupcake I love wafer cake. Halvah I love powder jelly I love cheesecake
                                                cotton candy tiramisu brownie.</p>
                                            <img class="img-fluid rounded-sm mb-2" src="<?= base_url('assets/'); ?>app-assets/images/profile/post-media/25.jpg" alt="avtar img holder">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="d-flex align-items-center">
                                                    <i class="feather icon-heart font-medium-2 mr-50"></i>
                                                    <span>276</span>
                                                </div>
                                                <div class="ml-2">
                                                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lai Lewandowski" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="C<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Darcey Nooner" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Julee Rossignol" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Jeffrey Gerondale" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li class="d-inline-block pl-50">
                                                            <span>+271 more</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p class="ml-auto d-flex align-items-center">
                                                    <i class="feather icon-message-square font-medium-2 mr-50"></i>105
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-50">
                                                    <img src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">Darcey Nooner</h6>
                                                    <span class="font-small-2">I love cupcake danish jujubes
                                                        sweet.</span>
                                                </div>
                                                <div class="ml-auto cursor-pointer">
                                                    <i class="feather icon-heart mr-50"></i>
                                                    <i class="feather icon-message-square"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-2">
                                                <div class="avatar mr-50">
                                                    <img src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">Lai Lewandowski</h6>
                                                    <span class="font-small-2">Wafer I love brownie jelly bonbon tart
                                                        apple
                                                        pie</span>
                                                </div>
                                                <div class="ml-auto cursor-pointer">
                                                    <i class="feather icon-heart mr-50"></i>
                                                    <i class="feather icon-message-square"></i>
                                                </div>
                                            </div>
                                            <fieldset class="form-label-group mb-50">
                                                <textarea class="form-control" id="label-textarea2" rows="3" placeholder="Add Comment"></textarea>
                                                <label for="label-textarea2">Add Comment</label>
                                            </fieldset>
                                            <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-1">
                                                    <img src="C:\xampp\htdocs\template2/app-assets/images/profile/user-uploads/user-01.jpg" alt="avtar img holder" height="45" width="45">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">Leeanna Alvord</h6>
                                                    <span class="font-small-2">10 Dec 2018 at 5:35 AM</span>
                                                </div>
                                                <div class="ml-auto user-like"><i class="feather icon-heart"></i></div>
                                            </div>
                                            <p>Wafer I love brownie jelly bonbon tart. Candy jelly beans powder brownie
                                                biscuit. Jelly marzipan oat cake cake.</p>
                                            <iframe src="https://www.youtube.com/embed/WALZwXyxpHQ" class="w-100 height-250"></iframe>
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="d-flex  cursor-pointeralign-items-center">
                                                    <i class="feather icon-heart font-medium-2 mr-50"></i>
                                                    <span>269</span>
                                                </div>
                                                <div class="ml-2">
                                                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="C:\xampp\htdocs\template2/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Julee Rossignol" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Darcey Nooner" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                        </li>
                                                        <li class="d-inline-block pl-50">
                                                            <span>+264 more</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p class="ml-auto d-flex align-items-center">
                                                    <i class="feather icon-message-square font-medium-2 mr-50"></i>98
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-50">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">Darcey Nooner</h6>
                                                    <span class="font-small-2">I love cupcake danish jujubes
                                                        sweet.</span>
                                                </div>
                                                <div class="ml-auto cursor-pointer">
                                                    <i class="feather icon-heart mr-50"></i>
                                                    <i class="feather icon-message-square"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center mb-2">
                                                <div class="avatar mr-50">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">Lai Lewandowski</h6>
                                                    <span class="font-small-2">Wafer I love brownie jelly bonbon tart
                                                        apple
                                                        pie</span>
                                                </div>
                                                <div class="ml-auto cursor-pointer">
                                                    <i class="feather icon-heart mr-50"></i>
                                                    <i class="feather icon-message-square"></i>
                                                </div>
                                            </div>
                                            <fieldset class="form-label-group mb-50">
                                                <textarea class="form-control" id="label-textarea3" rows="3" placeholder="Add Comment"></textarea>
                                                <label for="label-textarea3">Add Comment</label>
                                            </fieldset>
                                            <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">

                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center border-bottom pb-1">
                                        <div>
                                            <p class="mb-75"><strong>Upcoming Events</strong></p>
                                        </div>
                                        <p>Sat, 16, Feb</p>
                                    </div>
                                    <div class="card-content">
                                        <div class="list-group analytics-list">
                                            <div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
                                                <div class="float-left">
                                                    <p class="text-bold-600 font-medium-2 mb-0 mt-25">Refactor button
                                                        component</p>
                                                    <small>16 February 2019</small>
                                                    <a href="home-community.html">
                                                        <p class="mb-75">by <strong>Komunitas Bola Basket</strong> </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
                                                <div class="float-left">
                                                    <p class="text-bold-600 font-medium-2 mb-0 mt-25">Submit report to
                                                        admin</p>
                                                    <small>20 February 2019</small>
                                                    <a href="home-community.html">
                                                        <p class="mb-75">by <strong>Komunitas BPecinta Kucing</strong>
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
                                                <div class="float-left">
                                                    <p class="text-bold-600 font-medium-2 mb-0 mt-25">Prepare
                                                        presentation</p>
                                                    <small>25 February 2019</small>
                                                    <a href="home-community.html">
                                                        <p class="mb-75">by <strong>Komunitas Bola Basket</strong> </p>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
                                                <div class="float-left">
                                                    <p class="text-bold-600 font-medium-2 mb-0 mt-25">Calculate monthly
                                                        income</p>
                                                    <small>28 February 2019</small>
                                                    <a href="home-community.html">
                                                        <p class="mb-75">by <strong>Komunitas Pecinta Kucing</strong>
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" id="more" class="btn btn-primary block-element mb-1">Load
                                    More</button>
                            </div>
                        </div>
                    </section>
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
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
    <!-- END: Page JS-->


    <!-- tambahan -->
    <script src="<?= base_url('assets/'); ?>new-js/new.js"></script>
</body>
<!-- END: Body-->

</html>