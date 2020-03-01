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
										<div class="dropdown">
											<a data-toggle="dropdown"><i class="feather icon-more-horizontal cursor-pointer"></i></a>
											<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/setting'); ?>">Edit Info</a></div>
										</div>
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
									<div class="card-header d-flex justify-content-between">
										<h4>Members</h4>
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
													<form method="post" action="community/viewMember">
														<button style="margin-left: 100px" type="submit" name="view" value="<?= $id ?>" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user"></i></button>
													</form>
												</div>

											</div>
										<?php
										};

										?>

										<a href="list-member.html" class="btn btn-primary w-100 mt-1"><i class="feather icon-plus mr-25"></i>Load More</a>

									</div>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="new-postbox">
											<div class="avatar mr-50"><img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE']; ?>" alt="png" height="50"></div>
											<div class="newpst-input">
												<form id="form-post" action="<?= base_url('community/' . $community['COM_ID'] . '/posting') ?>" method="POST" enctype="multipart/form-data">
													<textarea rows="2" id="isi" name="isi" style="height: 70px;" placeholder="write something"></textarea>
													<br>
													<div class="attachments">
														<ul>
															<li style="float: left;">

																<label class="fileContainer">
																	<input type='file' id="gambar" name="gambar" />
																	<img id="blah" src="#" alt="" width="250" />
																	<i class="fa fa-image" id="icon-gmr"></i>
																</label>
															</li>

															<li>
																<button type="submit" href="#" id="btn-posting-ya">Post</button>
															</li>
														</ul>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="post" id="kotak-postingan">
									<?php

									if ($postingan != NULL) {
										foreach ($postingan as $p) {
											if ($p->POST_IMAGE) {
												echo '<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
													<p class="mb-0"><a href="" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a></p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50" data-toggle="tooltip" title="Like"></i>
													<span>0</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span>0</span>
												</div>
											</div>
											<fieldset class="form-label-group mb-50">
												<textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
												<label for="label-textarea">Add Comment</label>
											</fieldset>
											<button type="button" class="btn btn-sm btn-primary">Post Comment</button>
										</div>
									</div>';
											} else {
												echo '<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
													<p class="mb-0"><a href="" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a></p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50" data-toggle="tooltip" title="Like"></i>
													<span>0</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span>0</span>
												</div>
											</div>
											<fieldset class="form-label-group mb-50">
												<textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
												<label for="label-textarea">Add Comment</label>
											</fieldset>
											<button type="button" class="btn btn-sm btn-primary">Post Comment</button>
										</div>
									</div>';
											}
										}
									} else {
										echo '<div class="card">
										<div class="card-body">
                                        <div style="height: 600px; ">
                                        <h2 align="center" style="margin: 50px 0px"><strong>WELCOME TO HUMMANITAS</strong></h2>
                                        <img class="img-fluid card-img-top rounded-sm mb-2" style="height:500px;" src="'  . base_url('assets/') . 'app-assets/images/logo/logoWeb.png" alt="avtar img holder">
                                       
                                    </div>
										</div>
									</div>';
									}

									?>

								</div>
							</div>
							<div class="col-lg-3 col-12">
								<div class="card">
									<div class="card-header d-flex justify-content-between align-items-center border-bottom pb-1">
										<div>
											<p class="mb-75"><strong>Upcoming Events</strong></p>
										</div>
										<p>Sat, 16, Feb</p>
									</div>
									<div class="card-content">
										<div class="list-group analytics-list">
											<?php if (count($event) > 0) {

												// echo $name;
												// echo $community['COM_ID'];
												foreach ($event as $event) {
													$id = $event->EVENT_ID; ?>
													<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
														<div class="float-left">
															<p class="text-bold-600 font-medium-2 mb-0 mt-25"><?= $event->EVENT_TITLE ?></p>
															<small><?= date("j F Y", strtotime($event->START_DATE)) ?></small>

														</div>
													</div>

												<?php
												}
											} else { ?>
												<div class="col-12">
													<div style="height: 200px; ">
														<h4 align="center" style="margin: 100px 0px">No event available</h4>
													</div>
												</div>
											<?php }; ?>


										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<h4>Photos</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<?php if (count($image) > 0) {
												// $id = $image['IMAGE_ID'];
												// echo $name;
												// echo $community['COM_ID'];
												foreach ($image as $image) { ?>
													<div class="col-md-4 col-6 user-latest-img">
														<a href="<?= base_url('assets/img/community/gallery/' . $community['COM_ID'] . '/' . $image->GALLERY_NAME . '/') . $image->IMAGE ?>" data-lightbox="mygallery"><img src="<?= base_url('assets/img/community/gallery/' . $community['COM_ID'] . '/' . $image->GALLERY_NAME . '/') . $image->IMAGE ?>" class="img-fluid mb-1 rounded-sm" alt="avtar img holder"></a>
													</div>
												<?php
												}
											} else { ?>
												<div class="col-12">
													<div style="height: 200px; ">
														<h4 align="center" style="margin: 100px 0px">No photo available</h4>
													</div>
												</div>
											<?php }; ?>

										</div>
										<div class="row">
											<div class="col-12 text-center">
												<a type="button" href="<?= base_url('community/' . $community['COM_ID'] . '/gallery'); ?>" class="btn btn-primary block-element mb-1">+ View More</a>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-12 text-center">
								<button type="button" id="more" class="btn btn-primary block-element mb-1">Load
									More</button>
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
	<script src="<?= base_url('assets/'); ?>new-js/new.js"></script>
	<script src="<?= base_url('assets/'); ?>assets/js/lightbox-plus-jquery.min.js"></script>
	<!-- END: Page JS-->
	<script>
		$(document).ready(function() {
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
						$('#blah').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);

					$('#icon-gmr').toggle();
				}
			}

			$("#gambar").change(function() {
				readURL(this);
			});

			$("#form-post").submit(function(e) {
				e.preventDefault();
				$.ajax({
					url: $(this).attr("action"),
					data: new FormData(this),
					cache: false,
					processData: false,
					contentType: false,
					type: 'POST',
					success: function(data) {
						$('#kotak-postingan').prepend(data);
						reset_input();
					},
					error: function(data) {
						alert('tidaaa');
					}
				});
			});

			function reset_input() {
				$('#isi').val('');
				$('#gambar').val('');
				$('#blah').attr('src', '#');
				$('#icon-gmr').toggle();
			}


		});
	</script>

	<!-- footer user -->
	<?php $this->load->view('user/v_template_footer') ?>
	<!-- footer community -->
	<?php $this->load->view('v_template_footer') ?>

	<!-- FUNGSI PREVIEW INPUT GAMBAR POSTINGAN -->




</body>
<!-- END: Body-->

</html>
