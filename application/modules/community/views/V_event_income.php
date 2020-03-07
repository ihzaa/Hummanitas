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
                                                        <input style="width: 100%" type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= number_format($balance) ?>">
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) == NULL) { ?>
                        <!-- member section -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="margin-left: 40%">
                                    <h1>Event Income</h1>

                                    <div class="" style="margin-left: 70%; margin-bottom: -30px;margin-top: 20px;">
                                        <button class="btn btn-primary mb-2 new" data-toggle="modal" data-target="#myModal2"><i class="feather icon-plus"></i>&nbsp; New Transaction</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <?= $this->session->flashdata('message'); ?>
                                    <section id="add-row">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">

                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <?php $listTransaction = $this->db->query('SELECT a.ANOTHER_DATE,a.ANOTHER_AMOUNT,a.ANOTHER_ID,a.ANOTHER_STATUS,u.USERNAME,u.NAME,c.ACTIVITY FROM another_income a JOIN community_member m on m.MEMBER_ID = a.USER_ID JOIN user u on m.USER_ID = u.USER_ID JOIN activity c on a.ACTIVITY_ID = c.ACTIVITY_ID WHERE a.COM_ID =' . $community['COM_ID'] . ' AND u.USER_ID =' . $user['USER_ID'] . ' ORDER BY ANOTHER_STATUS ASC')->result();
                                                            ?>
                                                            <div class="table-responsive">
                                                                <table class="table add-rows">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Date</th>
                                                                            <th>Event</th>
                                                                            <th>Amount</th>
                                                                            <th>Status</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1;
                                                                        foreach ($listTransaction as $list) {
                                                                            $transaction_id = $list->ANOTHER_ID;
                                                                        ?>
                                                                            <tr>
                                                                                <th>
                                                                                    <?= $i ?>
                                                                                </th>
                                                                                <th>
                                                                                    <?= date('d/m/Y', strtotime($list->ANOTHER_DATE)) ?>
                                                                                </th>
                                                                                <th>
                                                                                    <?= $list->ACTIVITY ?>
                                                                                </th>
                                                                                <th>
                                                                                    <?= number_format($list->ANOTHER_AMOUNT) ?>
                                                                                </th>
                                                                                <?php if ($list->ANOTHER_STATUS == 0) { ?>
                                                                                    <th style="background-color:#FF6464; color:white;"> Waiting</th>
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
                                </div>

                                <br><br>

                            </div>

                        </div>

                    <?php } else { ?>

                        <!-- admin section -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="margin-left: 40%">
                                    <h1>Event Income</h1>
                                </div><br>

                                <div class="col-12">
                                    <?= $this->session->flashdata('message'); ?>
                                    <form action="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/2/addEvent') ?>" method="POST">
                                        <fieldset class="form-group" style="display: inline-block; width: 200px; margin-left: 25px;">
                                            <label for="basicSelect"><strong>Add Event</strong></label>
                                            <select class="form-control" id="selectEvent" name="selectEvent">
                                                <?php

                                                if (count($event) > 0) { ?>
                                                    <option value="0">choose event</option>
                                                    <?php foreach ($event as $event) {

                                                        $id = $event->EVENT_ID;

                                                    ?>
                                                        <option value="<?= $id ?>"><?= $event->EVENT_TITLE ?></option>
                                                    <?php    }
                                                } else {
                                                    ?>
                                                    <option value="0">There are no event</option>
                                                <?php }
                                                ?>

                                            </select>
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary" style="margin-left: 20px">Add</button>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="card collapse-icon accordion-icon-rotate">
                                        <div class="card-body">
                                            <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                                <?php

                                                if (count($activity) > 0) { ?>
                                                    <?php foreach ($activity as $activity) {
                                                        $id = $activity->ACTIVITY_ID;
                                                    ?>

                                                        <div class="collapse-margin">
                                                            <div class="card-header" id="heading<?= $id ?>" data-toggle="collapse" role="button" data-target="#collapse<?= $id ?>" aria-expanded="false" aria-controls="collapse<?= $id ?>">
                                                                <span class="lead collapse-title collapsed">
                                                                    <?= $activity->ACTIVITY ?>
                                                                </span>

                                                                <?php $Total = $this->db->query('SELECT SUM(ANOTHER_AMOUNT) as TOTAL FROM another_income  WHERE ANOTHER_STATUS =  1 AND COM_ID =' . $community['COM_ID'] . ' AND ACTIVITY_ID =' . $id)->row_array();
                                                                ?>
                                                                <h4 style="position: absolute;margin-left: 900px;">
                                                                    <strong>Total:</strong> <?php if ($Total['TOTAL'] != NULL) {
                                                                                                echo number_format($Total['TOTAL']);
                                                                                            } else {
                                                                                                echo '-';
                                                                                            } ?></h4>
                                                                <a href="" style="margin-right: 30px"><i class="feather icon-x"></i></a>
                                                            </div>

                                                            <div id="collapse<?= $id ?>" class="collapse" aria-labelledby="heading<?= $id ?>" data-parent="#accordionExample">
                                                                <div class="card-body">

                                                                    <section id="add-row">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="card">

                                                                                    <div class="card-content">
                                                                                        <div class="card-body">
                                                                                            <div class="" style="margin-left: 82%">
                                                                                                <button class="btn btn-primary mb-2" id="adminTransacton" data-toggle="modal" data-value="<?= $id ?>" data-target="#myModal"><i class="feather icon-plus"></i>&nbsp;
                                                                                                    New Transaction</button>
                                                                                            </div>
                                                                                            <?php $listTransaction = $this->db->query('SELECT a.ANOTHER_DATE,a.ANOTHER_AMOUNT,a.ANOTHER_ID,a.ANOTHER_STATUS,u.USERNAME,u.NAME,c.ACTIVITY FROM another_income a JOIN community_member m on m.MEMBER_ID = a.USER_ID JOIN user u on m.USER_ID = u.USER_ID JOIN activity c on a.ACTIVITY_ID = c.ACTIVITY_ID WHERE a.COM_ID =' . $community['COM_ID'] . ' AND a.ACTIVITY_ID =' . $id . ' ORDER BY ANOTHER_STATUS ASC')->result();
                                                                                            ?>

                                                                                            <div class="table-responsive">
                                                                                                <table class="table add-rows">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>ID</th>
                                                                                                            <th>Date</th>
                                                                                                            <th>Name</th>
                                                                                                            <th>Event</th>
                                                                                                            <th>Amount</th>
                                                                                                            <th>Status</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php $i = 1;
                                                                                                        foreach ($listTransaction as $list) {
                                                                                                            $transaction_id = $list->ANOTHER_ID;
                                                                                                        ?>
                                                                                                            <tr class="baris" style="cursor: pointer;" data-id="<?= $transaction_id ?>" data-value="<?= $activity->ACTIVITY_ID ?>" data-baris="<?= $i ?>">
                                                                                                                <th>
                                                                                                                    <?= $i ?>
                                                                                                                </th>
                                                                                                                <th>
                                                                                                                    <?= date('d/m/Y', strtotime($list->ANOTHER_DATE)) ?>
                                                                                                                </th>
                                                                                                                <th>
                                                                                                                    <?php if ($list->NAME != NULL) {
                                                                                                                        echo $list->NAME;
                                                                                                                    } else {
                                                                                                                        echo $list->USERNAME;
                                                                                                                    } ?>
                                                                                                                </th>
                                                                                                                <th>
                                                                                                                    <?= $list->ACTIVITY ?>
                                                                                                                </th>
                                                                                                                <th>
                                                                                                                    <?= number_format($list->ANOTHER_AMOUNT) ?>
                                                                                                                </th>
                                                                                                                <?php if ($list->ANOTHER_STATUS == 0) { ?>
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
                                                                </div>
                                                            </div>
                                                        </div>


                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="col-12">
                                                        <div style="height: 200px; ">
                                                            <h1 align="center" style="margin: 100px 0px">There is still no event income available</h1>
                                                        </div>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>

                            </div>

                        </div>
                    <?php } ?>







                    <!-- Bordered table end -->


                    <!-- Modal member-->
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
                                    <?= form_open_multipart(base_url('community/' . $community['COM_ID'] . '/finance/income/2/addTransaction')); ?>
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



                    <!-- Modal admin-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" id="adminPaid">
                                    <?= form_open_multipart(base_url('community/' . $community['COM_ID'] . '/finance/income/2/addTransaction')); ?>
                                    <div>
                                        <br>

                                        <input type="text" id="activityId" name="activityId" class="form-control" placeholder="Amount" style="width: 100%;" hidden>
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
                                    <button type="submit" id="adminSend" class="btn btn-primary">Send</button>
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
                    <!-- <script src="< ?= base_url('assets/'); ?>assets/js/lightbox-plus-jquery.min.js"></script> -->
                    <!-- END: Page JS-->

                    <!-- footer user -->
                    <?php $this->load->view('user/v_template_footer') ?>
                    <!-- footer community -->
                    <?php $this->load->view('v_template_footer') ?>


                    <script>
                        $(document).on("click", "#adminTransacton", function() {
                            var activityId = $(this).data('value');
                            $("#adminPaid #activityId").val(activityId);

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
                                    url: "<?php echo base_url('ajax/get_event_transaction') ?>",
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
                                url: '<?php echo base_url('ajax/confirmEventIncome') ?>',
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


                    <script>
                        $(document).ready(function() {
                            $(".new").click(function() {
                                $.ajax({
                                    url: "<?= base_url('ajax/' . $community['COM_ID'] . '/listEventIncome') ?>",
                                    method: "POST",
                                    dataType: "json",
                                    success: function(data) {
                                        var html = '';
                                        var i;
                                        for (i in data) {
                                            html += '<li><fieldset><div class = "vs-checkbox-con vs-checkbox-primary" ><input type = "checkbox" name="activityId" value = "' + data[i].ACTIVITY_ID + '" ><span class = "vs-checkbox" ><span class="vs-checkbox--check"><i class="vs-icon feather icon-check"></i></span></span><span class ="" >' + data[i].ACTIVITY + '</span></div></fieldset></li>'
                                        }
                                        $('.listEventIncome').html(html);
                                    }
                                });
                            });
                        });
                    </script>
</body>
<!-- END: Body-->


</html>