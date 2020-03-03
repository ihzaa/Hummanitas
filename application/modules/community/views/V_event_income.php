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

                    <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) == NULL) { ?>
                        <!-- member section -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="margin-left: 40%">
                                    <h1>Event Income</h1>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="" style="margin-left: 70%; margin-bottom: -30px;margin-top: 20px;">
                                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal2"><i class="feather icon-plus"></i>&nbsp; New Transaction</button>
                                    </div>
                                </div>

                                <div class="card-body">
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
                                                                            <th>Event</th>
                                                                            <th>Amount</th>
                                                                            <th>Status</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>1</th>
                                                                            <th>10/1/2011</th>
                                                                            <th>Aniv</th>
                                                                            <th>Rp.50000</th>
                                                                            <th>Waiting</th>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>2</th>
                                                                            <th>10/1/2011</th>
                                                                            <th>Aniv</th>
                                                                            <th>Rp.50000</th>
                                                                            <th>Waiting</th>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>3</th>
                                                                            <th>10/1/2011</th>
                                                                            <th>Aniv</th>
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
                                    <?php

                                    if (count($activity) > 0) { ?>
                                        <?php foreach ($activity as $activity) {
                                            $id = $activity->ACTIVITY_ID;
                                        ?>
                                            <div class="card collapse-icon accordion-icon-rotate">
                                                <div class="card-body">
                                                    <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                                        <div class="collapse-margin">
                                                            <div class="card-header" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                <span class="lead collapse-title collapsed">
                                                                    <?= $activity->ACTIVITY ?>
                                                                </span>

                                                                <?php $Total = $this->db->query('SELECT SUM(ANOTHER_AMOUNT) as TOTAL FROM another_income  WHERE COM_ID =' . $community['COM_ID'] . ' AND ACTIVITY_ID =' . $id)->row_array();
                                                                ?>
                                                                <h4 style="position: absolute;margin-left: 900px;">
                                                                    <strong>Total:</strong> <?= $Total['TOTAL'] ?></h4>
                                                                <a href="" style="margin-right: 30px"><i class="feather icon-x"></i></a>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                                                                            <?php $listTransaction = $this->db->query('SELECT a.ANOTHER_DATE,a.ANOTHER_AMOUNT,a.ANOTHER_ID,a.ANOTHER_STATUS,u.USERNAME,u.NAME,c.ACTIVITY FROM another_income a JOIN community_member m on m.MEMBER_ID = a.USER_ID JOIN user u on m.USER_ID = u.USER_ID JOIN activity c on a.ACTIVITY_ID = c.ACTIVITY_ID WHERE a.COM_ID =' . $community['COM_ID'] . ' AND a.ACTIVITY_ID =' . $id)->result();
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
                                                                                                        <?php if (count($listTransaction) != 0) {
                                                                                                            $i = 1;
                                                                                                            foreach ($listTransaction as $list) {
                                                                                                                $transaction_id = $list->ANOTHER_ID;
                                                                                                        ?>
                                                                                                                <tr style="cursor: pointer;" data-toggle="modal" data-id="<?= $transaction_id ?>" data-target="#confirmModal">
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
                                                                                                                        <?= $list->ANOTHER_AMOUNT ?>
                                                                                                                    </th>
                                                                                                                    <th>Waiting</th>

                                                                                                                </tr>
                                                                                                            <?php $i++;
                                                                                                            } ?>

                                                                                                        <?php } else { ?>
                                                                                                            <div class="col-12">
                                                                                                                <div style="min-height: 200px; ">
                                                                                                                    <h1 align="center" style="margin: 100px 0px">No transaction</h1>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php } ?>

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

                                                    </div>
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
                                    <h5>Event</h5>
                                    <ul class="list-unstyled mb-0">

                                        <li>
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" value="false">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Aniv</span>
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
                                                    <span class="">Meeting</span>
                                                </div>
                                            </fieldset>
                                        </li>

                                    </ul>



                                    <div>
                                        <br>
                                        <h5>Amount</h5>
                                        <input type="text" class="form-control" placeholder="Amount" style="width: 100%;">
                                    </div>

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

</body>
<!-- END: Body-->

</html>