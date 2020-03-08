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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/lightbox.min.css">
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
                    <section id="profile-info">
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
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="card" style="min-height: 800px;">
                                    <div class="card-header">
                                        <h2>Album</h2>
                                        <button style="padding: 10px;margin-right: 20px;" type="button" data-toggle="modal" data-target="#createModal" class="btn btn-primary block-element mb-1">+Create Album</button>
                                    </div>
                                    <br>
                                    <div class="gallery-album">
                                        <?= $this->session->flashdata('message'); ?>
                                        <?php if (count($album) > 0) {
                                            $previousId = '';
                                            foreach ($album as $album => $v) {
                                                $id = $v->GALLERY_ID;
                                                // var_dump($v);
                                                // die;
                                                // foreach ($v['GALLERY_ID'] as $v => $b) {
                                                if ($previousId != $id) {
                                        ?>
                                                    <li id="<?= 'gallery_' . $id ?>">
                                                        <a href="<?= base_url('community/' . $community['COM_ID'] . '/gallery/' . $id); ?>"><img src="<?= base_url('assets/img/community/gallery/' . $community['COM_ID'] . '/' . $v->GALLERY_NAME . '/' . $v->IMAGE); ?>">
                                                        </a>
                                                        <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                                                            <button type="button" class="btn btn-danger mr-1 mb-1 delGallery" name="del" value="<?= $id ?>" style="padding:3px 3px;top:-140px; margin-left: 110px">Delete</button>
                                                        <?php } else { ?>
                                                            <button type="button" class="btn btn-danger mr-1 mb-1 delGallery" style="visibility:hidden;padding:3px 3px;top:-140px; margin-left: 110px">Delete</button>
                                                        <?php } ?>
                                                        <div class="caption">
                                                            <a href="<?= base_url('community/' . $community['COM_ID'] . '/gallery/' . $id); ?>"><?= $v->GALLERY_NAME ?></a>
                                                            <p><?= count($this->db->get_where('images', ['GALLERY_ID' => $id])->result()); ?> photos</p>
                                                        </div>
                                                    </li>
                                            <?php
                                                }
                                                $previousId = $id;
                                            }
                                        } else {
                                            ?>
                                            <div class="col-12">
                                                <div style="min-height: 200px; ">
                                                    <h1 align="center" style="margin: 100px 0px">No album has been created</h1>
                                                </div>
                                            </div>
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Members</h4>
                                        <i class="feather icon-more-horizontal cursor-pointer"></i>
                                    </div>
                                    <div class="card-body">

                                        <?php foreach ($member as $member) {
                                            $id = $member->USER_ID;
                                        ?>
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div class="avatar mr-50">
                                                            <img src="<?= base_url('assets/img/user/') . $member->USER_IMAGE; ?>" alt="avtar img holder" height="35" width="35">
                                                        </div>
                                                        <div class="user-page-info">
                                                            <h6 class="mb-0"><?php
                                                                                if ($member->NAME == NULL) {
                                                                                    echo $member->USERNAME;
                                                                                } else {
                                                                                    echo $member->NAME;
                                                                                } ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <form method="post" action="<?= base_url('') ?>community/viewMember">
                                                        <button style="margin-left: 100px" type="submit" name="view" value="<?= $id ?>" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user"></i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        <?php
                                        };

                                        // if ($member->num_rows() > 5) {
                                        ?>

                                        <a href="<?= base_url('community/' . $community['COM_ID'] . '/member'); ?>" class="btn btn-primary w-100 mt-1"><i class="feather icon-plus mr-25"></i>Load More</a>
                                        <!-- < ?php -->
                                        <!-- // } else { ?> -->
                                        <!-- <a href="list-member.html" class="btn btn-primary w-100 mt-1"><i class="feather icon-plus mr-25" hidden></i>Load More</a> -->
                                        <!-- < ?php
                                        }; ?> -->
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

    <script src="<?= base_url('assets/'); ?>assets/js/lightbox-plus-jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>new-js/new.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/sweet-alerts.js"></script>


    <!-- END: Page JS-->



    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Create New Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('community/' . $community['COM_ID'] . '/gallery/add'); ?>
                    <fieldset class="form-group">
                        <label for="basicInput">Album Name</label>
                        <input type="text" name="name" class="form-control" required id="basicInput" placeholder="">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="frmImgUpload">Choose Photo</label><br>
                        <!-- <form method="post" action="" enctype="multipart/form-data" id="frmImgUpload"> -->
                        <input name="image_name[]" type="file" multiple="multiple" accept="image/x-png,image/gif,image/jpeg,image/jpg" required />
                        <!-- </form> -->
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" name="upload" id="upload" type="submit" value="create" />
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer user -->
    <?php $this->load->view('user/v_template_footer') ?>
    <!-- footer community -->
    <?php $this->load->view('v_template_footer') ?>


    <script>
        $(document).ready(function() {
            $(".delGallery").click(function() {
                var id = $(this).val();
                Swal.fire({
                    title: 'You want to delete the selected album?',
                    text: '',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?= base_url('ajax/deleteGallery') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Deleted!',
                                    'The selected gallery has been deleted.',
                                    'success'
                                )
                                $('#gallery_' + id).fadeOut(300, function() {
                                    $(this).remove();
                                });
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'There is error when deleting gallery.',
                                    'error'
                                )
                            }
                        });

                    }
                })

            });
        });
    </script>


</body>
<!-- END: Body-->

</html>