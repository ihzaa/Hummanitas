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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
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
    <?php $this->load->view('user/v_template_navbar') ?>
    <!-- template menu -->
    <?php $this->load->view('v_template_menu') ?>


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-header mb-2">
                                <div class="relative">
                                    <div class="cover-container">
                                        <img class="img-fluid bg-cover rounded-0 w-100" style="max-height: 370px" src="<?= base_url('assets/img/community/cover/') . $community['COM_COVER'] ?>" alt="User Profile Image">
                                    </div>
                                    <div class="profile-img-container d-flex align-items-center justify-content-between">
                                        <img src="<?= base_url('assets/img/community/profile/') . $community['COM_IMAGE']; ?>" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center profile-header-nav">
                                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                                        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="row">
                                                <div class="col-7">
                                                    <ul class=" justify-content-around w-75 ml-sm-auto">
                                                        <h1><?= $community['COM_NAME'] ?></h1>
                                                        <div class="col-xl-1 text-center">
                                                            <div class="text-center">
                                                                <?php if ($community['ISPUBLIC'] == 1) { ?>
                                                                    <button style=" font-size: 13px; padding-top: 2px; padding-bottom: 2px; width: 200px;" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Anyone can see what's going on in the community">
                                                                        Public Community
                                                                    </button>
                                                                <?php
                                                                } else { ?>
                                                                    <button style=" font-size: 13px; padding-top: 2px; padding-bottom: 2px; width: 200px;" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Only members can see what's going on in the community">
                                                                        Private Community
                                                                    </button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <div class="col-5">
                                                    <fieldset class="form-group" style="display: inline-block;margin-left: 400px; margin-right: 100px">
                                                        <label for="disabledInput" style="font-size: 30px;"><strong>Balance</strong></label>
                                                        <input style="width: 100%" type="text" class="form-control" id="readonlyInput" readonly="readonly" value="2000000">
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="margin-left: 40%">
                                <h1>Monthly Cash</h1>


                            </div>

                            <br><br>
                            <ul class="list-group list-group-horizontal-sm" style="margin-left: 95px">
                                <?php foreach ($month as $month) {
                                    $month_id = $month->MONTH_ID;
                                    $year = date('Y');
                                    if ($this->db->query('SELECT c.CASH_STATUS FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN user u ON u.USER_ID = c.USER_ID WHERE c.USER_ID=' . $user['USER_ID'] . ' AND y.MONTH_ID =' . $month_id . ' AND y.YEAR =' . $year . ' AND c.CASH_STATUS = 1')->row_array()) {
                                ?>
                                        <li class="list-group-item" style="background-color:#48FA54; color:white"><?= $month->MONTH ?></li>
                                    <?php } else { ?>
                                        <li class="list-group-item" style="background-color:#FF6464; color:white"><?= $month->MONTH ?></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                            <?= $this->session->flashdata('message'); ?>

                            <br><br>
                            <div class="col-12">
                                <div class="form-group" style="display: inline-block;">
                                    <div class="controls">
                                        <strong><label style="margin-left: 20px">Donation Every Month</label></strong>
                                        <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) == NULL) { ?>
                                            <input type="number" id="donation" class="form-control" placeholder="Amount" value="<?php if ($community['JUMLAH_KAS'] != 0) {
                                                                                                                                    echo $community['JUMLAH_KAS'];
                                                                                                                                } ?>" style="width: 100%; margin-left: 20px" readonly>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="save" style="margin-left: 30px;display: inline-block;visibility:hidden">Save</button>

                            <?php } else { ?>
                                <input type="number" id="donation" class="form-control" placeholder="Amount" value="<?php if ($community['JUMLAH_KAS'] != 0) {
                                                                                                                        echo $community['JUMLAH_KAS'];
                                                                                                                    } ?>" style="width: 100%; margin-left: 20px">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="save" style="margin-left: 30px;display: inline-block;">Save</button>

                    <?php } ?>
                    <div class="" style="display: inline-block; margin-left: 690px;">
                        <button type="button" class="btn btn-primary mb-2 new" data-toggle="modal" data-target="#myModal2"><i class="feather icon-plus"></i>&nbsp; New Transaction</button>
                    </div>

                    </div>
                    <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                        <!-- Admin section -->
                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">


                                                <div class="table-responsive">
                                                    <table class="table add-rows">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Transaction Date</th>
                                                                <th>Name</th>
                                                                <th>Month</th>
                                                                <th>Year</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($listTransaction as $list) {
                                                                $transaction_id = $list->CASH_ID;
                                                            ?>
                                                                <tr class="baris" style="cursor: pointer;" data-id="<?= $transaction_id ?>" data-baris="<?= $i ?>">
                                                                    <th>
                                                                        <?= $i ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= date('d/m/Y', strtotime($list->CASH_DATE)) ?>
                                                                    </th>
                                                                    <th>
                                                                        <?php if ($list->NAME != NULL) {
                                                                            echo $list->NAME;
                                                                        } else {
                                                                            echo $list->USERNAME;
                                                                        } ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $list->MONTH ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $list->YEAR ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $list->CASH_AMOUNT ?>
                                                                    </th>
                                                                    <?php if ($list->CASH_STATUS == 0) { ?>
                                                                        <th id="status<?= $i ?>" style="background-color:#FF6464; color:white;"> Waiting</th>
                                                                    <?php
                                                                    } else { ?>
                                                                        <th style="background-color:#48FA54; color:white;"> Paid</th>
                                                                    <?php } ?>

                                                                </tr>
                                                            <?php $i++;
                                                            } ?>

                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-header">
                                        <h1>Paid</h1>

                                    </div>
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">


                                                <div class="table-responsive">
                                                    <table class="table add-rows">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>Month</th>
                                                                <th>Year</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($paid as $paid) {
                                                            ?>
                                                                <tr>
                                                                    <th>
                                                                        <?= $i ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $paid->USERNAME ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $paid->MONTH ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $paid->YEAR ?>
                                                                    </th>

                                                                </tr>
                                                            <?php $i++;
                                                            } ?>
                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card-header">
                                        <h1>Unpaid</h1>

                                    </div>
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">


                                                <div class="table-responsive">
                                                    <table class="table add-rows">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>Month</th>
                                                                <th>Year</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($unpaid as $u) {
                                                            ?>
                                                                <tr>
                                                                    <th>
                                                                        <?= $i ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $u['NAME'] ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $u['MONTH'] ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $u['YEAR'] ?>
                                                                    </th>

                                                                </tr>
                                                            <?php $i++;
                                                            } ?>

                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>
                    <?php } else { ?>
                        <!-- Member section -->
                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">


                                                <div class="table-responsive">
                                                    <table class="table add-rows">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Date</th>
                                                                <th>Month</th>
                                                                <th>Year</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($transaction as $list) {
                                                                $transaction_id = $list->CASH_ID;
                                                            ?>
                                                                <tr>
                                                                    <th>
                                                                        <?= $i ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= date('d/m/Y', strtotime($list->CASH_DATE)) ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $list->MONTH ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $list->YEAR ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $list->CASH_AMOUNT ?>
                                                                    </th>
                                                                    <?php if ($list->CASH_STATUS == 0) { ?>
                                                                        <th id="status<?= $i ?>" style="background-color:#FF6464; color:white;"> Waiting</th>
                                                                    <?php
                                                                    } else { ?>
                                                                        <th style="background-color:#48FA54; color:white;"> Paid</th>
                                                                    <?php } ?>

                                                                </tr>
                                                            <?php $i++;
                                                            } ?>

                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>

                    <?php } ?>
                </div>
            </div>





            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>


            <!-- BEGIN: Vendor JS-->
            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/faq-kb.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/datatables/datatable.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/sweet-alerts.js"></script>
            <!-- END: Page JS-->

            <!-- footer user -->
            <?php $this->load->view('user/v_template_footer') ?>
            <!-- footer community -->
            <?php $this->load->view('v_template_footer') ?>

            <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- <form action="< ?= base_url('community/' . $community['COM_ID'] . '/finance/income/1/addTransaction') ?>" enctype="multipart/form-data"> -->
                            <?= form_open_multipart(base_url('community/' . $community['COM_ID'] . '/finance/income/1/addTransaction')); ?>
                            <h5>Choose Month</h5>
                            <ul class="list-unstyled mb-0">
                                <div class="row">
                                    <div class="col">
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="1">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">January</span>
                                                </div>
                                            </fieldset>

                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="2">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">February</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="3">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">March</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="4">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">April</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="5">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">May</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="6">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">June</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="7">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">July</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="8">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">August</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="9">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">September</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="10">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">October</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="11">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">November</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="month[]" value="12">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">December</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </div>
                                </div>
                            </ul>

                            <br>
                            <h5>Choose Year</h5>
                            <select class="form-control" id="selectYear" name="selectYear">
                                <?php foreach ($year as $year) { ?>
                                    <option value="<?= $year->YEAR ?>"><?= $year->YEAR ?></option>
                                <?php } ?>

                            </select>
                            <br>

                            <h5>Proof Of Payment</h5>
                            <div class="custom-file">
                                <input type="file" required class="custom-file-input" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="monthlySubmit" class="btn btn-primary">Send</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- save donation every month -->
            <script>
                $('#save').on('click', function() {
                    var amount = $('#donation').val();

                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('ajax/' . $community['COM_ID'] . '/saveDonation') ?>',
                        data: {
                            amount: amount
                        },
                        success: function(data) {
                            Swal.fire(
                                'Success!',
                                'Donation has been saved.',
                                'success'
                            )
                        },
                        error: function() {
                            Swal.fire(
                                'Failed!',
                                'There is problem when saving donation.',
                                'error'
                            )
                        }
                    });
                });
            </script>

            <!-- confirm modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="Mbaris" id="Mbaris">
                        <div class="modal-body" id="confirmBody">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirmButton">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.baris').click(function() {
                        var transactionId = $(this).data('id');
                        var baris = $(this).data('baris');
                        $('#Mbaris').val(baris);
                        $.ajax({
                            url: "<?php echo base_url('ajax/get_Monthly_transaction') ?>",
                            method: "POST",
                            data: {
                                transactionId: transactionId
                            },
                            success: function(data) {
                                $('#confirmBody').html(data);
                                $('#confirmModal').modal('show');
                            }
                        });
                    });
                });
            </script>

            <script>
                $("#confirmButton").click(function() {
                    var id = $('#transactionId').val();
                    var status = $('#Mbaris').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('ajax/confirmMonthlyIncome') ?>',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if (data == 'success') {
                                Swal.fire(
                                    'Request success!',
                                    'Transaction has been confirmed.',
                                    'success'
                                )
                                changeStatus(status);
                            } else if (data == 'failed') {
                                Swal.fire(
                                    'Request failed!',
                                    'You already confirm this transaction.',
                                    'warning'
                                )
                            }
                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                });

                function changeStatus(a) {
                    document.getElementById('status' + a).style.backgroundColor = '#48FA54';
                    document.getElementById('status' + a).innerHTML = 'Paid';
                }
            </script>

</body>
<!-- END: Body-->




</html>