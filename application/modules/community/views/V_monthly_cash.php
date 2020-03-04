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
                                <li class="list-group-item" style="background-color: grey">January</li>
                                <li class="list-group-item"> February </li>
                                <li class="list-group-item">March</li>
                                <li class="list-group-item">April </li>
                                <li class="list-group-item">May</li>
                                <li class="list-group-item"> June</li>
                                <li class="list-group-item">July</li>
                                <li class="list-group-item">august</li>
                                <li class="list-group-item">September</li>
                                <li class="list-group-item">October </li>
                                <li class="list-group-item">November </li>
                                <li class="list-group-item">December </li>
                            </ul>

                            <br><br>
                            <div class="col-12">
                                <div class="form-group" style="display: inline-block;">
                                    <div class="controls">
                                        <strong><label style="margin-left: 20px">Donation Every Month</label></strong>
                                        <input type="text" class="form-control" placeholder="Amount" style="width: 100%; margin-left: 20px">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" style="margin-left: 30px;display: inline-block;">Save</button>

                                <div class="" style="display: inline-block; margin-left: 690px;">
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal"><i class="feather icon-plus"></i>&nbsp; New Transaction</button>
                                </div>

                            </div>
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
                                                                    <th>ID</th>
                                                                    <th>Date</th>
                                                                    <th>Name</th>
                                                                    <th>Month</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="cursor: pointer;" data-toggle="modal" data-id="1" data-target="#confirmModal">
                                                                    <th>1</th>
                                                                    <th>10/1/2011</th>
                                                                    <th>Azmi</th>
                                                                    <th>Jan,Feb</th>
                                                                    <th>Rp.50000</th>
                                                                    <th>Waiting</th>

                                                                </tr>
                                                                <tr style="cursor: pointer;" data-toggle="modal" data-id="1" data-target="#confirmModal">
                                                                    <th>2</th>
                                                                    <th>10/3/2011</th>
                                                                    <th>Azmi</th>
                                                                    <th>March</th>
                                                                    <th>Rp.50000</th>
                                                                    <th>Waiting</th>

                                                                </tr>
                                                                <tr style="cursor: pointer;" data-toggle="modal" data-id="1" data-target="#confirmModal">
                                                                    <th>3</th>
                                                                    <th>10/4/2011</th>
                                                                    <th>yusuf</th>
                                                                    <th>April</th>
                                                                    <th>Rp.50000</th>
                                                                    <th>Waiting</th>

                                                                </tr>

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
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Month</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>1</th>
                                                                    <th>Azmi</th>
                                                                    <th>Jan</th>


                                                                </tr>
                                                                <tr>
                                                                    <th>2</th>
                                                                    <th>Azmi</th>
                                                                    <th>March</th>


                                                                </tr>
                                                                <tr>
                                                                    <th>3</th>
                                                                    <th>Azmi</th>
                                                                    <th>April</th>


                                                                </tr>

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
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Month</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>1</th>
                                                                    <th>Azmi</th>
                                                                    <th>Jan</th>

                                                                </tr>
                                                                <tr>
                                                                    <th>2</th>
                                                                    <th>Azmi</th>
                                                                    <th>March</th>


                                                                </tr>
                                                                <tr>
                                                                    <th>3</th>
                                                                    <th>Azmi</th>
                                                                    <th>April</th>


                                                                </tr>

                                                            </tbody>


                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </section>
                        </div>
                    </div>


                    <!-- Bordered table end -->

                    <div class="modal fade" id="myModal2" role="dialog">
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


                    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Name</label>
                                                <input readonly="" class="form-control" value="Azmi">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Payment Information</label>
                                                <input readonly="" class="form-control" value="Pembayaran Bulan March">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>
                                                    Proof Of Payment
                                                </label>
                                                <br>
                                                <a href="app-assets/images/profile/user-uploads/user-13.jpg" data-lightbox="mygallery">
                                                    <img src="app-assets/images/profile/user-uploads/user-13.jpg" alt="Card image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h5>Choose Month</h5>
                                    <ul class="list-unstyled mb-0">
                                        <div class="row">
                                            <div class="col">
                                                <li>
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                                            <input type="checkbox" value="false">
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
                                    <h5>Proof Of Payment</h5>
                                    <div class="col-12">

                                        <input id="uploadFile1" placeholder="Pilih File..." disabled="disabled" />
                                        <div class="fileUpload btn btn-primary">
                                            <span>Upload</span>
                                            <input id="uploadBtn1" type="file" class="upload" />
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>




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
                    <!-- END: Page JS-->

</body>
<!-- END: Body-->




</html>

<script>
    $(function() {
        $('#confirmModal').modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on('show', function() {
            var getIdFromRow = $(event.target).closest('tr').data('id');
            //make your ajax call populate items or what even you need
            // $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
        });
    });
</script>