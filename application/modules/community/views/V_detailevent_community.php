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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css">


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


            <nav aria-label="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="font-size: 20px;">
                        <li class="breadcrumb-item"><a href="<?= base_url('community/' . $community['COM_ID'] . '/event'); ?>">Event</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail
                        </li>
                    </ol>
                </nav>
            </nav>



            <div class="card">



                <div class="card-body">
                    <div class="row mb-5 mt-2">
                        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?= base_url('assets/img/community/event/') . $event['EVENT_THUMBNAIL']; ?>" class="img-fluid" width="400" alt="product image">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row align-items-center">
                                <div class="col-9">

                                    <h3><?= $event['EVENT_TITLE'] ?></h3>

                                    <?php

                                    $start = $event['START_DATE'];
                                    $date = strtotime($start);

                                    $newStart = date("j F Y", $date);

                                    $end = $event['END_DATE'];
                                    $date = strtotime($end);

                                    $newEnd = date("j F Y", $date);
                                    ?>
                                    <p class="text-muted" style="display: inline-block;"><?= $newStart ?> - <?= $newEnd ?></p>
                                    <p style="margin-top: -10px" class="text-muted"><?= $event['EVENT_LOC'] ?></p>
                                </div>
                                <div class="col">
                                    <?php
                                    $data = $this->db->query('SELECT * FROM activity where EVENT_ID = ' . $this->uri->segment(4))->result();

                                    if ($data != NULL) {

                                        $activity_id = $data[0]->ACTIVITY_ID;
                                    }


                                    if ($data != NULL) {

                                        $Total = $this->db->query('SELECT SUM(ANOTHER_AMOUNT) as TOTAL FROM  event e  join activity a on e.EVENT_ID = a.EVENT_ID  join another_income i on a.ACTIVITY_ID=i.ACTIVITY_ID WHERE e.EVENT_ID=' . $this->uri->segment(4) . ' AND ANOTHER_STATUS = 1')->row_array();
                                    ?>

                                        <h5 align="center" style="margin-top: -15px;">Event Income: <?php if ($Total['TOTAL'] != NULL) {
                                                                                                        echo $Total['TOTAL'];
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?></h5>
                                        <button class="btn btn-primary mb-2" data-toggle="modal" name="Donate" data-target="#myModal2"><i class="feather icon-plus"></i>&nbsp; Donate</button>
                                    <?php }  ?>


                                </div>
                            </div>




                            <hr>
                            <p><?= $event['EVENT_DESC'] ?></p>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">DONATE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?= form_open_multipart(base_url('community/' . $community['COM_ID'] . '/event/' . $event['EVENT_ID'] . '/addDonate')); ?>
                    <h5>Event</h5>
                    <ul class="list-unstyled mb-0 listEventIncome">

                    </ul>
                    <div>
                        <br>
                        <h5>Amount</h5>
                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount" style="width: 100%;">
                        <p style="font-size: 9px">format example: "20000"</p>
                    </div>

                    <br>
                    <h5>Proof Of Payment</h5>
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" id="memberSend" class="btn btn-primary">Send</button>
                </div>
                </form>
            </div>
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
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/account-setting.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('assets/'); ?>aapp-assets/js/scripts/pages/user-profile.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/faq-kb.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/datatables/datatable.js"></script>
    <!-- END: Page JS-->

    <!-- footer user -->
    <?php $this->load->view('user/v_template_footer') ?>
    <!-- footer community -->
    <?php $this->load->view('v_template_footer') ?>
</body>
<!-- END: Body-->




</html>