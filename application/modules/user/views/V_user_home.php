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

    <!-- template navbar -->
    <?php $this->load->view('v_template_navbar') ?>


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

    <!-- footer user -->
    <?php $this->load->view('v_template_footer') ?>
</body>
<!-- END: Body-->

</html>