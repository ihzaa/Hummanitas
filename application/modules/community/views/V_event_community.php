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
    <!-- <link rel="stylesheet" type="text/css" href="< ?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css"> -->
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/datepicker.css">

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
            <div class="card">
                <br>
                <div align="center">
                    <h1>List Event</h1>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-content" style="margin-left: 85%">
                    <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                        <button class="btn btn-primary mt-1" data-toggle="modal" data-target="#myModal2">+Add New
                            Event</button>
                    <?php } ?>
                </div>

                <br>
                <div class="card-content">

                    <?php

                    if (count($event) > 0) {

                        foreach ($event as $events) {

                            $id = $events->EVENT_ID;



                    ?>

                            <div class="col-lg-4 col-md-6 col-sm-12" style="display: inline-block;margin: 0 -2px ">
                                <div class="card border-primary text-center bg-transparent">
                                    <div class="card-content" style="height: 200px">
                                        <img src="<?= base_url('assets/img/community/event/') . $events->EVENT_THUMBNAIL; ?>" alt="element 04" width="200px" height="200px" class="float-left" style="padding-right: 1.5rem;">
                                        <div class="card-body" align='left' style="margin-top: -20px">
                                            <h4 class="card-title mt-3"><?php echo $events->EVENT_TITLE ?></h4>
                                            <p class="card-text mb-25"><?php echo date('d M, Y', strtotime($events->START_DATE))  ?></p>
                                            <a href="<?= base_url('community/' . $community['COM_ID'] . '/event' . '/' . $id); ?>" class="btn btn-primary mt-1">View</a>
                                            <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                                                <button class="btn btn-primary mt-1 edit" value="<?= $id ?>">edit</button>
                                            <?php } ?>
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



            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- calendar Modal starts-->
    <!-- Modal Add-->
    <div class="modal fade" id="myModal2" style="z-index: 1041" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <?= form_open_multipart('community/' . $community['COM_ID'] . '/event/add'); ?>


                    <div class="form-group">
                        <label style="margin-left: 20px">Change profile photo</label>
                        <div class="row align-items-center">


                            <div class="col-sm-12">
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" required id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="controls">
                            <label for="account-name">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" required data-validation-required-message="This name field is required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <label for="account-name">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Location" required data-validation-required-message="This name field is required">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="startDate">Start date</label>
                        <div class="docs-datepicker">
                            <div class="input-group">

                                <input type="date" class="form-control" min="<?= date('Y-m-d') ?>" required id="startDate" name="startDate" placeholder="Pick a date" autocomplete="off" ">
                                <div class=" input-group-append">
                                <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="docs-datepicker-container"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="EndDate">End date</label>
                    <div class="docs-datepicker">
                        <div class="input-group">

                            <input type="date" class="form-control" required id="endDate" name="endDate" placeholder="Pick a date" autocomplete="off">
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
                    <label for="accountTextarea">Description</label>
                    <textarea class="form-control" name="description" required id="accountTextarea" rows="3" placeholder=""></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>



    <!-- Modal Edit-->
    <div class="modal fade" id="myModal3" style="z-index: 1041" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- <?= form_open_multipart('community/' . $community['COM_ID'] . '/event/eventEdit'); ?> -->
                <div class="modal-body" id="editEvent">


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
    <!-- <script src="< ?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="< ?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script> -->
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- <script src="< ?= base_url('assets/'); ?>app-assets/js/scripts/pages/account-setting.js"></script> -->
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
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/datepicker.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/main.js"></script>
    <!-- END: Page JS-->


    <!-- footer user -->
    <?php $this->load->view('user/v_template_footer') ?>
    <!-- footer community -->
    <?php $this->load->view('v_template_footer') ?>

    <script>
        $(document).ready(function() {
            $('.edit').on('click', function() {
                var id = $(this).val();

                $.ajax({
                    url: "<?= base_url('community/' . $community['COM_ID'] . '/event/editEvent') ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#editEvent').html(data);
                        $('#myModal3').modal('show');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#startDate').on('change', function(e) {
                var input = document.getElementById('endDate');
                input.setAttribute('min', this.value);
            });
        });
    </script>
</body>
<!-- END: Body-->



</html>