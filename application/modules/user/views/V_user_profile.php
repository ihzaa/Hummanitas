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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/app-user.css">
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
    <div class="app-content content" style="padding-top: 4rem;">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Account</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- page users view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- account start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="users-view-image">
                                            <img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE']; ?>" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                                            <div class="col-12">
                                                <a href="<?php echo base_url('user/user_setting') ?>" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">
                                                        <h1><?php
                                                            if ($user['NAME'] == NULL) {
                                                                echo $user['USERNAME'];
                                                            } else {
                                                                echo $user['NAME'];
                                                            } ?></h1>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">Email</td>
                                                    <td><?php echo $user['EMAIL'] ?></td>
                                                </tr>
                                                <td class="font-weight-bold">Mobile</td>
                                                <td><?php
                                                    if ($user['NOTELP'] == NULL) {
                                                        echo  'Not registered';
                                                    } else {
                                                        echo $user['NOTELP'];
                                                    } ?></td>

                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-5">
                                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                                <tr style="height: 50px">
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Gender</td>
                                                    <td><?= $user['GENDER']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">address</td>
                                                    <td> <?php
                                                            if ($user['ADDRESS'] == NULL) {
                                                                echo  'Not registered';
                                                            } else {
                                                                echo $user['ADDRESS'];
                                                            } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- account end -->
                        <!-- information start -->
                        <div class="col-md-6 col-12 ">
                            <div class="card" style="min-height: 210px">
                                <div class="card-header">
                                    <div class="card-title mb-2">Followed Community</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <?php if (count($user_com) > 0) {
                                            foreach ($user_com as $com) {
                                                $id = $com->COM_ID;
                                        ?>

                                                <tr>
                                                    <td class="font-weight-bold"><a href="<?= base_url('community/') . $com->COM_ID; ?>"><?= $com->COM_NAME ?></a></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td>
                                                    <h4>No community followed</h4>
                                                </td>
                                            </tr>
                                        <?php
                                        }; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- information start -->
                        <!-- social links end -->
                        <div class="col-md-6 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">About Me</div>
                                </div>
                                <textarea class="form-control" id="basicTextarea" rows="3" style="margin-left: 10px; width: 97%; height: 100px;" readonly style="position: relative;"><?= $user['BIO']; ?></textarea>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <!-- social links end -->
                        <!-- permissions start -->

                        <!-- permissions end -->
                    </div>
                </section>
                <!-- page users view end -->

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
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/app-user.js"></script>
    <!-- END: Page JS-->

    <!-- footer user -->
    <?php $this->load->view('v_template_footer') ?>

</body>
<!-- END: Body-->

</html>