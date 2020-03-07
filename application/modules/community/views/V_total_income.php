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




                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="margin-left: 40%">
                                <h1>Total Income</h1>


                            </div>


                            <br><br>
                            <section id="add-row">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Monthly Cash</h3>

                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">


                                                    <div class="table-responsive">
                                                        <table class="table add-rows" id="monthly">
                                                            <thead>
                                                                <fieldset class="form-group" style="height: 40px;width: 15%;margin-bottom: -10px;">
                                                                    <select class="form-control" id="select">
                                                                        <option value="">Choose Month...</option>
                                                                        <?php foreach ($month as $month) { ?>
                                                                            <option value="<?= $month->MONTH ?>"><?= $month->MONTH ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </fieldset>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Month</th>
                                                                    <th>Year</th>
                                                                    <th>Total</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody id="selectedMonthlyIncome">
                                                                <?php $i = 1;
                                                                foreach ($monthlyIncome as $monthly) {
                                                                ?>
                                                                    <tr>
                                                                        <th>
                                                                            <?= $i ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= $monthly->MONTH ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= $monthly->YEAR ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= number_format($monthly->TOTAL) ?>
                                                                        </th>

                                                                    </tr>
                                                                <?php $i++;
                                                                } ?>

                                                            </tbody>
                                                            <tfoot id="total">
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Total</th>
                                                                    <th></th>
                                                                    <th><strong><?= number_format($totalMonthly['TOTAL']) ?></strong></th>
                                                                </tr>
                                                            </tfoot>


                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </section>
                            <section id="add-row">
                                <div class="col-12">
                                    <div class="card-header">
                                        <h3>Event Cash</h3>

                                    </div>
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">


                                                <div class="table-responsive">
                                                    <table class="table add-rows">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Event</th>
                                                                <th>Money Collected</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;

                                                            foreach ($eventIncome as $event) {
                                                            ?>
                                                                <tr>
                                                                    <th>
                                                                        <?= $i ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= $event->ACTIVITY ?>
                                                                    </th>
                                                                    <th>
                                                                        <?= number_format($event->TOTAL) ?>
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
                            </section>
                            <section id="add-row">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="card-header">
                                            <h3>Total</h3>

                                        </div>
                                        <div class="card">

                                            <div class="card-content">
                                                <div class="card-body">


                                                    <div class="table-responsive">
                                                        <table class="table add-rows">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Activity</th>
                                                                    <th>Total Amount</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1;
                                                                $sum = 0;
                                                                foreach ($eventIncome as $event) {
                                                                ?>
                                                                    <tr>
                                                                        <th>
                                                                            <?= $i ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= $event->ACTIVITY ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= number_format($event->TOTAL) ?>
                                                                        </th>

                                                                    </tr>

                                                                <?php $i++;
                                                                    $sum += $event->TOTAL;
                                                                }
                                                                foreach ($monthlyIncome as $monthly) {
                                                                ?>
                                                                    <tr>
                                                                        <th>
                                                                            <?= $i ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= 'Monthly Cash of ' . $monthly->MONTH . ' ' . $monthly->YEAR ?>
                                                                        </th>
                                                                        <th>
                                                                            <?= number_format($monthly->TOTAL) ?>
                                                                        </th>

                                                                    </tr>
                                                                <?php $i++;
                                                                    $sum += $monthly->TOTAL;
                                                                }
                                                                ?>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Total</th>
                                                                    <th><strong><?= number_format($sum) ?></strong></th>
                                                                </tr>
                                                            </tfoot>

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
                    <script src="<?= base_url('assets/'); ?>new-js/new.js"></script>
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


                    <script>
                        $('#select').on('change', function(e) {
                            var optionSelected = $("option:selected", this);
                            var valueSelected = this.value;

                            $.ajax({
                                url: "<?php echo base_url('ajax/' . $community['COM_ID'] . '/selectedMonthlyIncome') ?>",
                                method: "POST",
                                data: {
                                    valueSelected: valueSelected
                                },
                                dataType: "json",
                                success: function(data) {
                                    $('#selectedMonthlyIncome').html(data.row);
                                    $('#total').html(data.total);
                                }
                            });
                        });
                    </script>
</body>
<!-- END: Body-->




</html>