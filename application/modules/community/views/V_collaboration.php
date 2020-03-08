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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/forms/select/select2.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/app-chat.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">

    <!-- template navbar -->
    <?php $this->load->view('user/v_template_navbar') ?>
    <!-- template menu -->
    <?php $this->load->view('v_template_menu') ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="col-md-12 col-sm-12" style="margin-top: 30px;">
            <div class="card" id="request" style="margin: 0px 20px">
                <div class="card-header" style="padding: 20px 20px;">
                    <h4 class="card-title">Collaboration Request </h4><span style="position:absolute;margin-left: 230px; font-size: 12px;" class="badge badge-primary badge-pill float-right"><?= count($request) ?></span>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse">
                    <div class="card-body">
                        <?php if (count($request) > 0) {

                            // echo $name;
                            // echo $community['COM_ID'];
                            foreach ($request as $request) {
                                $id = $request->COLLAB_ID;
                        ?>
                                <div class="row align-items-center">
                                    <div class="col-1">
                                        <img style="width: 80px; height: 80px; border-radius: 7px;" src="<?= base_url('assets/img/community/collab/' . $request->COLLAB_THUMBNAIL);  ?>" alt="avtar img holder">
                                    </div>
                                    <div class="col-8" style="border-left: 1px solid rgb(226, 226, 226);border-right: 1px solid rgb(226, 226, 226);">
                                        <h5><?= $request->COLLAB_NAME ?></h5>
                                        <p><?= $request->COLLAB_DESC ?></p>
                                    </div>
                                    <div class="col-3">
                                        <div style="margin-left: 20px;">
                                            <h5 style="margin-left: 80px;">Sender:</h5>
                                            <h5 style="margin-bottom: 10px;"><a href="<?= base_url('community/') . $request->SENDER_ID ?>"><?= $request->SENDER ?></a></h5>
                                            <form action="<?= base_url('community/' . $community['COM_ID']) . '/collaboration/accept' ?>" style="display: inline-block;" method="post">
                                                <button type="submit" name="accept" value="<?= $request->COLMEM_ID ?>" class="btn btn-relief-primary mr-1 mb-1">Confirm</button>
                                            </form>
                                            <form action="<?= base_url('community/' . $community['COM_ID']) . '/collaboration/reject' ?>" style="display: inline-block;" method="post">
                                                <button type="submit" name="reject" value="<?= $request->COLMEM_ID ?>" class="btn btn-relief-danger mr-1 mb-1">Reject</button>
                                            </form>
                                        </div>



                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="col-12">
                                <div style="height: 100px; ">
                                    <h4 align="center" style="margin: 100px 0px">No request available</h4>
                                </div>
                            </div>
                        <?php }; ?>


                    </div>
                </div>
            </div>
            <br>
            <?= $this->session->flashdata('message'); ?>
            <div class="content-area-wrapper" style="height: 550px;">
                <div class="sidebar-left">
                    <div class="sidebar">
                        <!-- User Chat profile area -->
                        <div class="chat-profile-sidebar">
                            <header class="chat-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE'] ?>" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-online avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name"><?= $user['USERNAME'] ?></h4>
                                </div>
                            </header>
                            <div class="profile-sidebar-area">
                                <div class="scroll-area">
                                    <h6>About</h6>
                                    <div class="about-user">
                                        <fieldset class="mb-0">
                                            <textarea data-length="120" class="form-control char-textarea" id="textarea-counter" rows="5" readonly placeholder="<?= $user['BIO'] ?>"><?= $user['BIO'] ?></textarea>
                                        </fieldset>
                                        <small class="counter-value float-right"><span class="char-count">108</span> /
                                            120
                                        </small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--/ User Chat profile area -->
                        <!-- Chat Sidebar area -->
                        <div class="sidebar-content card" style="height: 550px;">
                            <span class="sidebar-close-icon">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="chat-search" style="margin-top: 10px; margin-left: 5px;">
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                        <div class="avatar">
                                            <img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE'] ?>" alt="user_avatar" height="40" width="40">
                                            <span class="avatar-status-online"></span>
                                        </div>
                                        <div class="bullet-success bullet-sm position-absolute"></div>
                                    </div>
                                    <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                        <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat">
                                        <div class="form-control-position">
                                            <i class="feather icon-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="users-list" class="chat-user-list list-group position-relative" style="margin-top: 0px;">
                                <h3 class="primary p-1 mb-0" style="border-bottom: 1px solid rgb(197, 197, 197);">
                                    Collaboration List</h3>
                                <?php if (count($this->db->get_where('community_member', ['COM_ID' => $community['COM_ID'], 'USER_ID' => $user['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) { ?>
                                    <a href="" id="new" style="margin: 10px auto;" data-toggle="modal" data-target="#createCollab" class="">+New
                                        Collaboration</a>
                                <?php } ?>
                                <ul class="chat-users-list-wrapper media-list" id="collab-list">
                                    <?php if (count($collab) > 0) {

                                        foreach ($collab as $collab) {
                                            $id = $collab->COLLAB_ID;

                                    ?>

                                            <li data-id="<?= $id ?>" id="<?= 'collab_' . $id ?>">
                                                <div class=" pr-1">
                                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="<?= base_url('assets/img/community/collab/' . $collab->COLLAB_THUMBNAIL);  ?>" height="42" width="42" alt="Generic placeholder image">
                                                        <i></i>
                                                    </span>
                                                </div>

                                                <div class="user-chat-info">
                                                    <div class="contact-info">
                                                        <h5 class="font-weight-bold mb-0"><?= $collab->COLLAB_NAME ?></h5>
                                                        <p class="truncate"><?= count($this->db->get_where('collab_member', ['COLLAB_ID' => $id, 'COLMEM_STATUS' => 1])->result()); ?> Community follow</p>
                                                    </div>

                                                    <div class="contact-meta" id="<?= 'contact_' . $id ?>">
                                                        <!-- <span class="badge badge-primary badge-pill float-right">3</span> -->
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                    } else { ?>
                                        <div class="col-12">
                                            <div style="height: 100px; ">
                                                <h4 align="center" style="margin: 100px 0px">No collaboration available</h4>
                                            </div>
                                        </div>
                                    <?php }; ?>
                                </ul>
                            </div>
                        </div>
                        <!--/ Chat Sidebar area -->

                    </div>
                </div>
                <div class="content-right" style="height: 550px;">
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <div class="chat-overlay"></div>
                            <section class="chat-app-window" style="height: 550px;">
                                <div class="start-chat-area" style="height: 550px;">
                                    <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                    <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                                </div>
                                <div class="active-chat d-none">
                                    <div class="chat_navbar">
                                        <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                            <div class="vs-con-items d-flex align-items-center" id="header">
                                            </div>
                                            <div class="vs-con-items d-flex align-items-center">
                                                <button class="btn" type="submit" id="leaveCollab" name="leaveCollab" style="background-color:transparent; padding:0 0;"><i class="feather icon-log-out font-large-1"></i></button>
                                            </div>
                                        </header>
                                    </div>
                                    <div class="user-chats" id="user-chats" style="height: 400px;">

                                        <div class="chats">

                                        </div>
                                        <div id="scroll"></div>
                                    </div>
                                    <div class="chat-app-form">
                                        <form class="chat-app-input d-flex" action="javascript:void(0);">
                                            <input type="text" class="form-control message mr-1 ml-50" id="send" name="send" placeholder="Type your message">
                                            <!-- <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i>
                                                <span class="d-none d-lg-block">Send</span></button> -->
                                        </form>
                                    </div>
                                </div>
                            </section>

                        </div>
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
        <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/app-chat.js"></script>

        <!-- END: Page JS-->


        <!-- footer user -->
        <?php $this->load->view('user/v_template_footer') ?>
        <!-- footer community -->
        <?php $this->load->view('v_template_footer') ?>

        <!-- Modal -->
        <div class="modal fade" id="createCollab" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Create Collaboration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('community/' . $community['COM_ID'] . '/createCollab'); ?>
                        <div class="col-12">
                            <p>Choose Collaboration Thumbnail</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required data-validation-required-message="This name field is required">
                                <label class="custom-file-label" for="image">Choose file</label>

                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="controls">
                                    </br>
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required data-validation-required-message="This name field is required">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <p>Description</p>
                            <div class="form-group">
                                <textarea rows="4" id="desc" name="desc" style="width: 100%;" required="required"></textarea>

                            </div>
                            <p>Choose Participating Community</p>
                        </div>

                        <div class="form-group" style="margin: 0 16px;">
                            <select data-placeholder="Select a state..." name="multiple[]" class="select2-icons form-control" id="multiple-select" multiple="multiple">

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    </form>
                </div>
            </div>


            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/forms/select/form-select2.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
            <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/sweet-alerts.js"></script>

            <!-- menampilkan list komunitas di modal select -->
            <script>
                $(document).ready(function() {
                    $("#new").click(function() {
                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/listCom') ?>",
                            method: "POST",
                            dataType: "json",
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i in data) {
                                    html += '<option value="' + data[i].COM_ID + '">' + data[i].COM_NAME + ' (' + data[i].COM_EMAIL + ') </option>'
                                }
                                $('#multiple-select').html(html);
                            }
                        });
                    });
                });
            </script>
            <!-- load chat kolaborasi -->
            <script>
                $(document).ready(function() {

                    $("#collab-list li").click(function() {
                        var id = $('#collab-list').find('li.active').data('id');

                        $('#leaveCollab').val(id);
                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/getChat') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $(".chats").html(data);
                                $(".user-chats").animate({
                                    scrollTop: $(".user-chats > .chats")[0].scrollHeight
                                }, 100);
                            }
                        });
                    });

                    $("#collab-list li").click(function() {
                        var id = $('#collab-list').find('li.active').data('id');
                        setInterval(function() {
                            get_chat_message();
                        }, 500);

                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/getMember') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $("#header").html(data);
                            }
                        });
                    });

                    function get_chat_message() {

                        var id = $('#collab-list').find('li.active').data('id');
                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/getChat') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $(".chats").html(data);
                            }

                        });
                    }


                });
            </script>

            <!-- menyimpan chat baru ke database -->
            <script>
                $(document).ready(function() {

                    $(".message").keyup(function(event) {

                        var id = $('#collab-list').find('li.active').data('id');
                        var message = $('.message').val();

                        if (event.keyCode === 13) {
                            if (message != "") {
                                $.ajax({
                                    url: "<?= base_url('ajax/' . $community['COM_ID'] . '/chat') ?>",
                                    method: "POST",
                                    data: {
                                        message: message,
                                        id: id
                                    },
                                    success: function(data) {
                                        // $(".chats").append(data);
                                        $(".message").val("");
                                        // $(".user-chats").scrollTop($(".user-chats > .chats").height());
                                        $(".user-chats").animate({
                                            scrollTop: $(".user-chats > .chats")[0].scrollHeight
                                        }, 100);
                                    }

                                });

                            }
                        }
                    });

                });
            </script>

            <!-- ambil waktu last chat -->
            <script>
                $(window).on('load', function() {
                    var idArray = [];
                    var li = document.getElementById('collab-list').getElementsByTagName("li");

                    setInterval(function() {
                        refresh();
                    }, 1000);

                    for (i = 0; i < li.length; i++) {

                        idArray.push($(li)[i].getAttribute('data-id'));

                    }
                    var id = idArray.join(',');

                    var todayFormat = function(date) {
                        return ('0' + date.getHours()).slice(-2) + ":" + ('0' + date.getMinutes()).slice(-2);
                    }

                    var pastFormat = function(date) {
                        return date.getDate() + "/" + (date.getMonth() + 1);
                    }
                    $.ajax({
                        url: "<?= base_url('ajax/get_last_chat') ?>",
                        method: "POST",
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            var obj = data;
                            var html = '';
                            for (var i = 0; i < obj.length; i++) {
                                if (obj[i] != null) {
                                    var date = new Date(obj[i].TIME)
                                    var current = new Date();

                                    if (pastFormat(date) == pastFormat(current)) {
                                        html += '<span class="float-right mb-25">' + todayFormat(date) + '</span>';
                                        $('#contact_' + obj[i].COLLAB_ID).html(html);
                                    } else {
                                        html += '<span class="float-right mb-25">' + pastFormat(date) + '</span>';
                                        $('#contact_' + obj[i].COLLAB_ID).html(html);
                                    }
                                    html = '';

                                    if (obj[i].COUNT > 0) {
                                        html += '<span class="badge badge-primary badge-pill float-right">' + obj[i].COUNT + '</span>';
                                        $('#contact_' + obj[i].COLLAB_ID).html(html);
                                    }
                                    html = '';
                                }
                            }
                        }
                    });

                    function refresh() {
                        var idArray = [];
                        var li = document.getElementById('collab-list').getElementsByTagName("li");

                        for (i = 0; i < li.length; i++) {

                            idArray.push($(li)[i].getAttribute('data-id'));

                        }
                        var id = idArray.join(',');

                        var todayFormat = function(date) {
                            return ('0' + date.getHours()).slice(-2) + ":" + ('0' + date.getMinutes()).slice(-2);
                        }

                        var pastFormat = function(date) {
                            return date.getDate() + "/" + (date.getMonth() + 1);
                        }
                        $.ajax({
                            url: "<?= base_url('ajax/' . $community['COM_ID'] . '/get_last_chat') ?>",
                            method: "POST",
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                var obj = data;
                                var html = '';
                                for (var i = 0; i < obj.length; i++) {
                                    if (obj[i] != null) {
                                        var date = new Date(obj[i].TIME)
                                        var current = new Date();

                                        if (obj[i].COUNT > 0) {
                                            if (pastFormat(date) == pastFormat(current)) {
                                                html += '<span class="float-right mb-25">' + todayFormat(date) + '</span><br><span class="badge badge-primary badge-pill float-right">' + obj[i].COUNT + '</span>';
                                                $('#contact_' + obj[i].COLLAB_ID).html(html);
                                            } else {
                                                html += '<span class="float-right mb-25">' + pastFormat(date) + '</span><br><span class="badge badge-primary badge-pill float-right">' + obj[i].COUNT + '</span>';
                                                $('#contact_' + obj[i].COLLAB_ID).html(html);
                                            }
                                            html = '';
                                        } else {
                                            if (pastFormat(date) == pastFormat(current)) {
                                                html += '<span class="float-right mb-25">' + todayFormat(date) + '</span>';
                                                $('#contact_' + obj[i].COLLAB_ID).html(html);
                                            } else {
                                                html += '<span class="float-right mb-25">' + pastFormat(date) + '</span>';
                                                $('#contact_' + obj[i].COLLAB_ID).html(html);
                                            }
                                            html = '';
                                        }
                                    }
                                }
                            }
                        });
                    }

                    // if ($('#collab-list').find('li').hasClass('active')) {
                    //     var id = $('#collab-list').find('li.active').data('id');

                    //     alert(id);
                    // }
                });
            </script>

            <script>
                $(document).ready(function() {
                    $("#leaveCollab").click(function() {
                        var id = $(this).val();

                        Swal.fire({
                            title: 'You sure you want to leave this collaboration?',
                            text: 'This choice cannot be withdrawn',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: "<?= base_url('community/' . $community['COM_ID'] . '/leaveCollab') ?>",
                                    method: "POST",
                                    data: {
                                        id: id
                                    },
                                    success: function(data) {
                                        Swal.fire(
                                            'Success leaving collaboration!',
                                            'Your community wont get any new update from the deleted collaboration.',
                                            'success'
                                        )
                                        $('#collab_' + id).fadeOut(300, function() {
                                            $(this).remove();
                                        });
                                    },
                                    error: function() {
                                        Swal.fire(
                                            'Error!',
                                            'There is error when leaving collaboration',
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