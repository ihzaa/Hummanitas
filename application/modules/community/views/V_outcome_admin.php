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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Vendor CSS-->
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
                                                <ul class="justify-content-around w-75 ml-sm-auto">
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
                                            <fieldset class="form-group" style="display: inline-block;margin-left: 400px; margin-right: 100px">
                                                <label for="disabledInput" style="font-size: 30px;"><strong>Balance</strong></label>
                                                <input style="width: 90%" type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= number_format($balance) ?>">
                                            </fieldset>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="margin-left: 40%">
                                    <h1>Outcome</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>


                                <section id="add-row">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">

                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="">
                                                            <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                                                                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal" style="margin-left: 88%"><i class="feather icon-plus"></i>&nbsp; Outcome</button>

                                                            <?php } ?>
                                                        </div>


                                                        <div class="table-responsive">
                                                            <table class="table add-rows">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Date</th>
                                                                        <th>Name</th>
                                                                        <th>Activity</th>
                                                                        <th>Total</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($outcome as $outcome) {
                                                                    ?>
                                                                        <tr>
                                                                            <th><?= $i++ ?></th>
                                                                            <th><?= date('d M, Y', strtotime($outcome->OUTCOME_DATE))  ?></th>
                                                                            <th><?= $outcome->USERNAME ?></th>
                                                                            <th><?= $outcome->OUTCOME_ACTIVITY ?></th>
                                                                            <th><?= number_format($outcome->OUTCOME_AMOUNT) ?></th>

                                                                        </tr>

                                                                    <?php } ?>
                                                                </tbody>
                                                                <tfooter>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>Total</th>
                                                                    <th></th>
                                                                    <th><?= number_format($total['total']) ?></th>
                                                                </tfooter>


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



                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">

                                <div class="modal-content">
                                    <form id="form-post" action="<?= base_url('community/' . $community['COM_ID'] . '/finance/outcome/add') ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">


                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">Name</label>
                                                    <input readonly class="form-control" id="name" required name="name" placeholder="Name" required data-validation-required-message="This name field is required" value="<?= $user['USERNAME'] ?>">
                                                </div><br>
                                            </div>

                                            <div class="form-group">
                                                <label for="EndDate">date</label>
                                                <div class="docs-datepicker">
                                                    <div class="input-group">

                                                        <input type="date" class="form-control " id="Date" name="date" placeholder="Pick a date" required autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="docs-datepicker-container"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="accountTextarea">Activity</label>
                                                <textarea class="form-control" id="activity" required name="activity" rows="2" placeholder=""></textarea>
                                            </div>

                                            <div>
                                                <label>Amount</label>
                                                <input type="text" class="form-control" required placeholder="Amount" id="amount" name="amount" style="width: 100%;">
                                            </div>





                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- footer user -->
                    <?php $this->load->view('user/v_template_footer') ?>
                    <!-- footer community -->
                    <?php $this->load->view('v_template_footer') ?>



                    <!-- BEGIN: Vendor JS-->
                    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
                    <!-- BEGIN Vendor JS-->

                    <!-- BEGIN: Page Vendor JS-->
                    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
                    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
                    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
                    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
                    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
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