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
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/lightbox.min.css"> -->
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
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>About</h4>
                                    <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                                        <div class="dropdown">
                                            <a data-toggle="dropdown"><i class="feather icon-more-horizontal cursor-pointer"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/setting'); ?>">Edit Info</a></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <p><?= $community['COM_DESC']; ?></p>
                                    <div class="mt-1">
                                        <h6 class="mb-0">Addres:</h6>
                                        <p><?= $community['COM_ADDRESS']; ?></p>
                                    </div>
                                    <div class="mt-1">
                                        <h6 class="mb-0">Email:</h6>
                                        <p><?= $community['COM_EMAIL']; ?></p>
                                    </div>
                                    <div class="mt-1">
                                        <h6 class="mb-0">Phone Number:</h6>
                                        <p><?= $community['COM_TELP']; ?></p>
                                    </div>
                                    <div class="mt-1">
                                        <h6 class="mb-0">Community Code:</h6>
                                        <p><?= $community['COM_CODE']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Invite User </h4>
                                </div>
                                <div class="card-body">
                                    <div style="display: inline-block; margin-left: 3px">
                                        <div class="controls">
                                            <label><strong>Invite by Phone Number</strong></label>
                                            <input style="width: 180px;" type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="Enter Phone" required data-validation-required-message="This field is required">
                                            <!-- <input style="width: 180px;" type="text" class="form-control" id="codeCom" name="code" placeholder="Enter Code"> -->
                                        </div>
                                    </div>
                                    <div style="display: inline-block;margin-left: 3px;">
                                        <button class="btn gradient-light-primary" id="invite" style="margin-bottom: 5px;padding: 10px 5px;font-size: 10px;"><i class="feather icon-search px-1"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="content-body col-9">
                            <!-- users edit start -->
                            <section class="users-edit">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs mb-3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Member Management</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                                        <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Request Member</span>
                                                    </a>
                                                </li>


                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                                    <div class="card">
                                                        <section id="knowledge-base-search">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <?= $this->session->flashdata('message'); ?>
                                                                    <div class="card knowledge-base-bg white">

                                                                        <div class="card-content">
                                                                            <!-- <div class="card-body p-sm-4 p-2"> -->
                                                                            <div align="center" style="margin-top: 20px">

                                                                                <h1 class="Black">Member Management</h1>
                                                                                <br>
                                                                            </div>
                                                                            <form style="margin-right: 20px;margin-left: 20px">
                                                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                                    <input type="text" class="form-control form-control-lg" id="searchbar" placeholder="Search Member">
                                                                                    <div class="form-control-position">
                                                                                        <i class="feather icon-search px-1"></i>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </form>
                                                                            <!-- </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <!-- Knowledge base Jumbotron ends -->
                                                        <!-- Knowledge base -->
                                                        <section id="knowledge-base-content">
                                                            <div class="memberManage">
                                                                <div class="row search-content-info">

                                                                    <?php
                                                                    foreach ($member as $member) {
                                                                        $id = $member->MEMBER_ID;

                                                                    ?>
                                                                        <div class="col-md-4 col-sm-6 col-12 search-content">
                                                                            <div class="card">
                                                                                <div class="card-body text-center">
                                                                                    <img src="<?= base_url('assets/img/user/') . $member->USER_IMAGE; ?>" class="mx-auto mb-2" width="100" alt="knowledge-base-image">
                                                                                    <h4><?php if ($member->NAME != NULL) {
                                                                                            echo $member->NAME;
                                                                                        } else {
                                                                                            echo $member->USERNAME;
                                                                                        } ?></h4>
                                                                                    <small class="text-dark"><?php if ($member->ISADMIN != 1) {
                                                                                                                    echo 'Member';
                                                                                                                } else {
                                                                                                                    echo 'Admin';
                                                                                                                } ?></small>
                                                                                </div>

                                                                                <?php
                                                                                if ($member->USER_ID != $user['USER_ID']) {
                                                                                    if ($member->ISADMIN != 1) {
                                                                                        // echo $id;
                                                                                ?> <form action="<?= base_url('community/' . $community['COM_ID']) . '/memberManagement/makeAdmin' ?>" style="display: inline-block;" method="post">
                                                                                            <button type="submit" name="makeAdmin" style="display: inline-block; padding: 7px 18px; font-size: 13px;margin-left: 50px;" value="<?= $id  ?>" class="btn btn-outline-primary">Make<br>
                                                                                                Admin</button>
                                                                                        </form>
                                                                                    <?php } else { ?>
                                                                                        <form action="<?= base_url('community/' . $community['COM_ID']) . '/memberManagement/removeAdmin' ?>" style="display: inline-block;" method="post">
                                                                                            <button type="submit" name="removeAdmin" style="display: inline-block; padding: 7px 18px; font-size: 13px;margin-left: 50px;" value="<?= $id ?>" class="btn btn-outline-primary">Remove<br>
                                                                                                Admin</button>
                                                                                        </form>
                                                                                    <?php } ?>
                                                                                    <form action="<?= base_url('community/' . $community['COM_ID']) . '/memberManagement/removeMember' ?>" style="display: inline-block;" method="post">
                                                                                        <button value="<?= $id ?>" type="submit" name="removeMember" style="display: inline-block; padding: 13px 10px; margin-left: 5px;" class="btn btn-outline-primary">Remove</button>
                                                                                    </form>
                                                                                <?php } else { ?>
                                                                                    <div style="height: 30px"></div>

                                                                                <?php } ?>
                                                                            </div>

                                                                        </div>
                                                                    <?php } ?>
                                                                </div>


                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 text-center">
                                                                    <button type="button" id="memberManage" class="btn btn-primary block-element mb-1">Load
                                                                        More</button>
                                                                </div>
                                                            </div>
                                                        </section>


                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">

                                                    <div class="requestMember">
                                                        <div class="row search-content-info">
                                                            <?php if (count($request) > 0) {


                                                                foreach ($request as $req) { ?>
                                                                    <div class="col-xl-4 col-md-5 col-sm-12 profile-card-1" style="display: inline-block;">
                                                                        <div class="card" style="border: 1px solid #babfc7">
                                                                            <div class="card-header mx-auto">
                                                                                <div class="avatar avatar-xl">
                                                                                    <img class="img-fluid" src="<?= base_url('assets/img/user/') . $req->USER_IMAGE; ?>" alt="img placeholder">
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-content">
                                                                                <div class="card-body text-center">
                                                                                    <h4><?= $req->USERNAME ?></h4>
                                                                                    <p class=""><?= $req->EMAIL ?></p>
                                                                                    <div class="card-btns d-flex justify-content-between">
                                                                                        <form action="<?= base_url('community/' . $community['COM_ID']) . '/memberManagement/accept' ?>" method="post">
                                                                                            <button type="submit" name="accept" value="<?= $req->MEMBER_ID ?>" class="btn gradient-light-primary">Accept</button>
                                                                                        </form>
                                                                                        <form action="<?= base_url('community/' . $community['COM_ID']) . '/memberManagement/reject' ?>" method="post">
                                                                                            <button type="submit" name="reject" value="<?= $req->MEMBER_ID ?>" class="btn btn-outline-primary">Reject</button>
                                                                                        </form>
                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <div class="col-12">
                                                                    <div style="height: 200px; ">
                                                                        <h1 align="center" style="margin: 100px 0px">There is no new request</h1>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- users edit ends -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade" id="quickJoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Invite User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="userDetail">



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
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/faq-kb.js"></script>
    <!-- END: Page JS-->
    <script src="<?= base_url('assets/'); ?>new-js/new.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            //     // Initiate DataTable function comes with plugin
            //     // Start jQuery click function to view Bootstrap modal when view info button is clicked
            $('#invite').click(function() {
                //         // Get the id of selected phone and assign it in a variable called phoneData
                var phoneNum = $('#phoneNum').val();


                //         // Start AJAX function
                $.ajax({
                    // Path for controller function which fetches selected phone data
                    url: "<?php echo base_url('community/' . $community['COM_ID'] . '/get_user_detail') ?>",
                    // // Method of getting data
                    method: "POST",
                    // // Data is sent to the server
                    data: {
                        phoneNum: phoneNum
                    },
                    // // Callback function that is executed after data is successfully sent and recieved
                    success: function(data) {
                        // // Print the fetched data of the selected phone in the section called #phone_result
                        // // within the Bootstrap modal
                        $('#userDetail').html(data);
                        // // Display the Bootstrap modal
                        $('#quickJoin').modal('show');
                    }
                });
                // End AJAX function
            });
        });
    </script>


    <!-- footer user -->
    <?php $this->load->view('user/v_template_footer') ?>
    <!-- footer community -->
    <?php $this->load->view('v_template_footer') ?>

</body>
<!-- END: Body-->

</html>