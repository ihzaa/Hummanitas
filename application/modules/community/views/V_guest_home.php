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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

	<!-- template navbar -->
	<?php $this->load->view('user/v_template_navbar') ?>

	<!-- BEGIN: Main Menu-->
	<div class="horizontal-menu-wrapper">
		<div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mr-auto"><a class="navbar-brand" href="html/ltr/horizontal-menu-template/index.html">
							<div class="brand-logo"></div>
							<h2 class="brand-text mb-0">Hummanitas</h2>
						</a></li>
					<li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
				</ul>
			</div>
			<!-- Horizontal menu content-->
			<div class="navbar-container main-menu-content" data-menu="menu-container">
				<!-- include ../../../includes/mixins-->
				<ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" style="margin-left: 250px;">
					<li><a style="margin-left: 100px;color:black" href="<?= base_url('community/') . $community['COM_ID'] . '/guest' ?>"><i class="feather icon-home"></i><span data-i18n="Dashboard">Home</span></a>
					</li>
					<li><a style="margin-left: 20px; color:black" href="<?= base_url('community/') . $community['COM_ID'] . '/guest/gallery' ?>"><i class="feather icon-image"></i><span data-i18n="Dashboard">Gallery</span></a>
					</li>
					<li><a style="margin-left: 20px; color:black" href="<?= base_url('community/') . $community['COM_ID'] . '/guest/member' ?>"><i class="feather icon-users"></i><span data-i18n="Dashboard">Member
								List</span></a>
					</li>
					<li data-menu=""><a class="dropdown-item" href="" data-target="#myModal" data-toggle="modal" data-i18n="Raise Support"><i class="feather icon-alert-circle"></i>Report</a>
					</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- END: Main Menu-->

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
										<button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" data-target="#myModal2" data-toggle="modal">Join</button>
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
														<button style=" font-size: 13px; padding-top: 2px; padding-bottom: 2px; width: 200px;" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Anyone can see what's going on in the community">
															Public Community
														</button>
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
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="post">
									<?php
									$count = 0;
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
														<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a></p>
														<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
												</div>
												<p>' . $p->POST_CONTENT . '</p>
												<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="d-flex align-items-center">
														<i class="feather icon-heart font-medium-2 mr-50 like" title="Like" data-toggle="modal" data-target="#warning"></i>
														<span>' . $jml_like[$count] . '</span>
														<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
														<span>' . count($comment[$count]) . '</span>
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
														<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a></p>
														<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
												</div>
												<p>' . $p->POST_CONTENT . '</p>
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="d-flex align-items-center">
														<i class="feather icon-heart font-medium-2 mr-50 like" title="Like" data-toggle="modal" data-target="#warning"></i>
														<span>' . $jml_like[$count] . '</span>
														<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
														<span>' . count($comment[$count]) . '</span>
													</div>
												</div>
										';
											}

											echo '
											<div class="divider">
												<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
											</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
											if (!empty($comment[$count])) {
												echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="' . $comment[$count][count($comment[$count]) - 1]->COMMENT_ID . '">';
												for ($i = count($comment[$count]) - 1; $i >= 0; $i--) {
													$c = $comment[$count][$i];
													echo '
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="avatar mr-50">
															<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="Avatar" height="30" width="30">
														</div>
														<div class="user-page-info">
															<h6 class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;">' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->NAME . '</a>
															</h6>
															<span class="font-small-2">' . $c->COMMENT_CONTENT . '</span>
														</div>
													</div>
													<hr>';
												}
											} else {
												echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="">';
											}
											echo '</div></div></div>';
											$count++;
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
													<form method="post" action="<?= base_url('community/viewMember'); ?>">
														<button style="margin-left: 100px" type="submit" name="view" value="<?= $id ?>" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user"></i></button>
													</form>
												</div>

											</div>
										<?php
										};

										?>

										<a href="<?= base_url('community/' . $community['COM_ID'] . '/guest/member') ?>" class="btn btn-primary w-100 mt-1"><i class="feather icon-plus mr-25"></i>Load More</a>

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
												<a type="button" href="<?= base_url('community/' . $community['COM_ID'] . '/guest/gallery'); ?>" class="btn btn-primary block-element mb-1">+ View More</a>
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

	<!-- BEGIN: Footer-->
	<!-- <footer class="footer footer-static footer-light navbar-shadow">
		<p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="http://www.hummasoft.com/" target="_blank">Hummasoft</a>All rights Reserved</span>
			<button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
		</p>
	</footer> -->
	<!-- END: Footer-->


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
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/extensions/sweet-alerts.js"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
	<script src="<?= base_url('assets/'); ?>new-js/new.js"></script>
	<script src="<?= base_url('assets/'); ?>assets/js/lightbox-plus-jquery.min.js"></script>
	<!-- END: Page JS-->



	<div class="modal fade" id="myModal2" role="dialog">
		<div class="modal-dialog" style="width: 30%">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Join Community</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body" align="left">
					<form role="form" id="join-form" method="post">
						<div class="form-group">
							<label for="basicInput">Enter Community Join Code</label>
							<div class="form-group half">
								<input type="text" id="code" class="form-control" id="basicInput" placeholder="Enter Code">
							</div>
							<br>
						</div>
						<div class="modal-footer">
							<button type="submit" id="kirim" class="btn btn-outline-success mr-1 mb-1">Join</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade text-left" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-body">
					Sorry, you can not like the post because you are not member of this community.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-warning waves-effect waves-light" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- footer user -->
	<?php $this->load->view('user/v_template_footer') ?>
	<!-- footer community -->
	<?php $this->load->view('v_template_footer') ?>
	<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/modal/components-modal.js"></script>
</body>
<!-- END: Body-->

</html>

<script>
	$(document).ready(function() {
		$("#join-form").submit(function(e) {
			e.preventDefault();
			var code = $("#code").val();;
			// var decs = $("#js_personal_desc").val();
			if (code != '') {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url('community/' . $community['COM_ID'] . '/joinGuest') ?>',
					data: {
						code: code
					},
					success: function(data) {
						if (data == 'success') {
							Swal.fire(
								'Your request has been send!',
								'Please wait for the community to accept.',
								'success'
							)
						} else if (data == 'failed') {
							Swal.fire(
								'Request failed!',
								'The following code did not match the community code.',
								'warning'
							)
						} else {
							Swal.fire(
								'Request failed!',
								'You already send request to the following community.',
								'warning'
							)
						}

					},
					error: function() {
						alert('fail');
					}
				});
			} else {
				Swal.fire(
					'Field is empty!',
					'Field cannot be empty.',
					'warning'
				)
			}
		});
	});
</script>
