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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/shepherd-theme-default.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/file-uploaders/dropzone.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- template navbar -->
    <?php $this->load->view('v_template_navbar') ?>

    <!-- BEGIN: Content-->
    <div class="app-content content" style="padding-top: 5rem">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div class="card" style="height:445px">

                    <div class="card-content" style="height: 400px;">
                        <div class="card-body">
                            <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox" style="height: 400px;">
                                    <div class="carousel-item active" style="height: 400px;">
                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/slider/slide1.jpg" alt="First slide">
                                        <div class="carousel-caption">
                                            <h3 style="font-size:24px;color: rgb(0, 0, 0);
                                            text-shadow:
                                             -1px -1px 0 rgb(255, 255, 255),  
                                              1px -1px 0 rgb(255, 255, 255),
                                              -1px 1px 0 rgb(255, 255, 255),
                                               1px 1px 0 rgb(255, 255, 255);"><strong>WELCOME TO HUMMANITAS</strong></h3>
                                            <div style="margin-left:-185px;width:143%;height: 100px;;background-color: black;opacity: 60%">

                                            </div>
                                            <p style="position: absolute;margin:-70px 60px;font-size: 22px;color: white;
                                            ">Makes your community life easier with us. We give you great features to help you manage your community.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" style="height: 400px;">
                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/slider/slide2.jpg" alt="Second slide">
                                        <div class="carousel-caption">
                                            <h3 style="font-size:24px;color: rgb(0, 0, 0);
                                            text-shadow:
                                             -1px -1px 0 rgb(255, 255, 255),  
                                              1px -1px 0 rgb(255, 255, 255),
                                              -1px 1px 0 rgb(255, 255, 255),
                                               1px 1px 0 rgb(255, 255, 255);"><strong>Available Features</strong></h3>
                                            <div style="margin-left:-187px;width:143%;height: 135px;;background-color: black;opacity: 60%">

                                            </div>
                                            <p align="left" style="position: absolute;margin-top: -120px;margin-left:190px;font-size: 22px;color: white;
                                            ">- Create Community<br>
                                                - Add event for your Community<br>
                                                - Create Collaboration with other Community<br>
                                                - Financial Features<br>
                                                - Gallery to post your event photos</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" style="height: 400px;">
                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/slider/slide3.jpg" alt="Third slide">
                                        <div class="carousel-caption">
                                            <h1 style="font-size:24px;color: rgb(0, 0, 0);
                                            text-shadow:
                                             -1px -1px 0 rgb(255, 255, 255),  
                                              1px -1px 0 rgb(255, 255, 255),
                                              -1px 1px 0 rgb(255, 255, 255),
                                               1px 1px 0 rgb(255, 255, 255);">Let's get started</h1>

                                            <div class="btn round btn-dark" id="tour">Start Tour</div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="user-profile">
                    <?= $this->session->flashdata('message'); ?>
                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-12 col-12">

                                <div class="card">
                                    <section id="knowledge-base-search">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card knowledge-base-bg white">
                                                    <div class="card-header" style="border-bottom: 1px solid #cecece">
                                                        <h1 class="Black">Community List </h1><br>

                                                        <button type="button" data-toggle="modal" data-target="#myModal" id="createCommunty" class="btn btn-primary block-element mb-1">+Create Community</button>




                                                    </div>
                                                    <div class="card-content">
                                                        <br>
                                                        <!-- <div class="card-body p-sm-4 p-2"> -->

                                                        <form style="display: inline-block;margin-left: 500px;">
                                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                <input type="text" class="form-control form-control-lg" id="searchbar" placeholder="Search Community">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-search px-1"></i>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                        <!-- action="< ?= base_url('user/searchCode')  ?>" method="post" -->
                                                        <!-- <form name="getdata" method="post" action=""> -->
                                                        <div style="display: inline-block;margin-left: 200px;">

                                                            <div class="controls">
                                                                <label><strong>Search by Community Code</strong></label>
                                                                <input style="width: 180px;" type="text" class="form-control" id="codeCom" name="code" placeholder="Enter Code">
                                                            </div>
                                                        </div>
                                                        <div style="display: inline-block;margin-left: 3px;">
                                                            <button class="btn gradient-light-primary" id="hasil" style="margin-bottom: 5px;padding: 10px 5px;font-size: 10px;"><i class="feather icon-search px-1"></i></button>
                                                        </div>
                                                        <!-- </form> -->
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Knowledge base Jumbotron ends -->
                                    <!-- Knowledge base -->

                                    <!-- ' . $com[$i]['COM_NAME'] . ' -->
                                    <section id="knowledge-base-content">
                                        <div class="community">
                                            <div class="row search-content-info">

                                                <?php
                                                if (count($community) > 0) {
                                                    foreach ($community as $com) {
                                                        $id = $com->COM_ID;

                                                ?>
                                                        <div class="col-md-4 col-sm-6 col-12 search-content">
                                                            <div class="card">
                                                                <center>
                                                                    <div class="card-body text-center">

                                                                        <img src="<?= base_url('assets/img/community/profile/') . $com->COM_IMAGE; ?>" class="mx-auto mb-2" width="100" alt="knowledge-base-image">
                                                                        <h4><?php echo $com->COM_NAME ?></h4>
                                                                        <small class="text-dark" style="font-size: 15px"><strong>Malang</strong></small><br>
                                                                        <small class="text-dark"><?php echo $com->COM_ADDRESS ?></small>

                                                                    </div>
                                                                    <div class="tutorial">
                                                                        <form action="cekMember" method="post">
                                                                            <button type="submit" name="view" value="<?= $id ?>" class="btn gradient-light-primary">View</button>
                                                                        </form>
                                                                    </div>
                                                                </center>
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
                                            <?php
                                            if (count($community) <= 3) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button type="button" id="moreCom" class="btn btn-primary block-element mb-1" hidden>Load More</button>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button type="button" id="moreCom" class="btn btn-primary block-element mb-1">Load More</button>
                                                    </div>
                                                </div>
                                            <?php
                                            } ?>



                                        </div>

                                    </section>
                                </div>


                            </div>

                        </div>
                </div>

                </section>
            </div>

        </div>
    </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade" id="quickJoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Quick Join</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="comDetail">
                    <!-- <div></div> -->




                </div>


                <!-- <div class="modal-footer">
                    <button type="button" style="margin-right: 190px;" class="btn btn-primary" data-dismiss="modal">Join</button> -->
                <!-- </div> -->
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Create Community</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('user/create_community'); ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Choose profile photo</label>
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" required data-validation-required-message="This name field is required">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required data-validation-required-message="This name field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Description</label>
                                <textarea type="text" class="form-control" name="desc" placeholder="Description" required data-validation-required-message="This description field is required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required placeholder="Address" data-validation-required-message="This Address field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="form-group">
                            <div class="controls">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required placeholder="Email" data-validation-required-message="This email field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Phone number" data-validation-required-message="This phone number field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Private</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="vueradio" checked value="0">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            No
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="vueradio" value="1">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            Yes
                                        </div>
                                    </fieldset>
                                </li>


                            </ul>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

                </form>
            </div>
        </div>







        <!-- BEGIN: Vendor JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/dropzone.min.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/prism.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>

        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/faq-kb.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/dropzone.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/tether.min.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/shepherd.min.js"></script>
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/tour.js"></script>
        <!-- END: Page JS-->
        <script src="<?= base_url('assets/'); ?>new-js/new.js"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                //     // Initiate DataTable function comes with plugin
                //     // Start jQuery click function to view Bootstrap modal when view info button is clicked
                $('#hasil').click(function() {
                    //         // Get the id of selected phone and assign it in a variable called phoneData
                    var code = $('#codeCom').val();
                    //         // Start AJAX function
                    $.ajax({
                        // Path for controller function which fetches selected phone data
                        url: "<?php echo base_url() ?>user/get_com_result",
                        // // Method of getting data
                        method: "POST",
                        // // Data is sent to the server
                        data: {
                            code: code
                        },
                        // // Callback function that is executed after data is successfully sent and recieved
                        success: function(data) {
                            // // Print the fetched data of the selected phone in the section called #phone_result
                            // // within the Bootstrap modal
                            $('#comDetail').html(data);
                            // // Display the Bootstrap modal
                            $('#quickJoin').modal('show');
                        }
                    });
                    // End AJAX function
                });
            });
        </script>

        <!-- footer user -->
        <?php $this->load->view('v_template_footer') ?>

</body>
<!-- END: Body-->


</html>