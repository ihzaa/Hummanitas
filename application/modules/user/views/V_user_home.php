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
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

	<!-- template navbar -->
	<?php $this->load->view('v_template_navbar') ?>


	<!-- BEGIN: Content-->
	<div class="app-content content" style="padding-top: 4rem">
		<div class="content-wrapper" style="margin-top: -100px;">
			<div class="content-header row">
				<div class="content-header-left col-md-9 col-12 mb-2">
					<div class="row breadcrumbs-top">
						<div class="col-12">
							<h2 class="content-header-title float-left mb-0">User</h2>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb">

									<li class="breadcrumb-item active">Home
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="content-body">
				<div id="user-profile">

					<section id="profile-info">
						<div class="row">
							<div class="col-lg-3 col-12">
								<div class="card">
									<div class="card-header mx-auto pb-0">
										<div class="row m-0">
											<div class="col-sm-12 text-center">
												<h4><?php
													if ($user['NAME'] == NULL) {
														echo $user['USERNAME'];
													} else {
														echo $user['NAME'];
													} ?></h4>
											</div>
										</div>
									</div>
									<div class="card-content">
										<div class="card-body text-center mx-auto">
											<div class="avatar avatar-xl">
												<img class="img-fluid" src="<?= base_url('assets/img/user/') . $user['USER_IMAGE']; ?>" alt="img placeholder">
											</div>

											<a href="<?php echo base_url('user/user_profile') ?>" class="btn gradient-light-primary btn-block mt-2">View
												Profile</a>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<h4>About Me</h4>
										<div class="dropdown">
											<a data-toggle="dropdown"><i class="feather icon-more-horizontal cursor-pointer"></i></a>
											<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-account-settings.html">Edit Info</a></div>
										</div>
									</div>
									<div class="card-body">
										<p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love
											jujubes.
											Topping cake wafer.</p>
										<div class="mt-1">
											<h6 class="mb-0">Phone Number</h6>
											<p>031826739881</p>
										</div>
										<div class="mt-1">
											<h6 class="mb-0">Lives:</h6>
											<p>Jl. Ngampelsari, Malang</p>
										</div>
										<div class="mt-1">
											<h6 class="mb-0">Email:</h6>
											<p>bucketful@fiendhead.org</p>
										</div>
										<!-- <div class="mt-1">
                                            <h6 class="mb-0">Website:</h6>
                                            <p>www.pixinvent.com</p>
                                        </div> -->
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Following Community</h4>
									</div>
									<div class="card-body suggested-block">
										<?php if (count($user_com) > 0) {
											foreach ($user_com as $com) {
												$id = $com->COM_ID;
										?>
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="avatar mr-50">
														<img src="<?= base_url('assets/img/community/profile/' . $com->COM_IMAGE); ?>" alt="avtar img holder" height="35" width="35">
													</div>
													<div class="user-page-info">
														<a href="<?= base_url('community/') . $com->COM_ID; ?>">
															<p><?= $com->COM_NAME ?></p>
														</a>
														<span class="font-small-2"><?= count($this->db->get_where('community_member', ['COM_ID' => $id])->result()); ?> Members</span>
													</div>

												</div>
											<?php
											}
										} else {
											?>
											<div class="d-flex justify-content-start align-items-center mb-1">
												<h4>No community followed</h4>
											</div>
										<?php
										}; ?>

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
												if ($is_like[$count]) {
													echo '<div class="card">
													<div class="card-body">
													<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
													</div>
													<div class="user-page-info">
													<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a>
													posted to
													<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a>
													</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
													</div>
													<p>' . $p->POST_CONTENT . '</p>
													<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="d-flex align-items-center">
															<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
															<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
															<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
															<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
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
													<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a>
													posted to
													<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a>
													</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
													</div>
													<p>' . $p->POST_CONTENT . '</p>
													<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="d-flex align-items-center">
															<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
															<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
															<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
															<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
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
											} else {
												if ($is_like[$count]) {
													echo '<div class="card">
													<div class="card-body">
													<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
													</div>
													<div class="user-page-info">
													<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a>
													posted to
													<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a>
													</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
													</div>
													<p>' . $p->POST_CONTENT . '</p>
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="d-flex align-items-center">
															<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
															<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
															<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
															<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
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
													<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.NAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->NAME . '</strong></a>
													posted to
													<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a>
													</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
													</div>
													<p>' . $p->POST_CONTENT . '</p>
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="d-flex align-items-center">
															<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
															<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
															<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
															<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
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
									<div class="card-header d-flex justify-content-between align-items-center border-bottom pb-1">
										<div>
											<p class="mb-75"><strong>Upcoming Events</strong></p>
										</div>
										<p>Sat, 16, Feb</p>
									</div>
									<div class="card-content">
										<div class="list-group analytics-list">
											<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
												<div class="float-left">
													<p class="text-bold-600 font-medium-2 mb-0 mt-25">Refactor button
														component</p>
													<small>16 February 2019</small>
													<a href="home-community.html">
														<p class="mb-75">by <strong>Komunitas Bola Basket</strong> </p>
													</a>
												</div>
											</div>
											<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
												<div class="float-left">
													<p class="text-bold-600 font-medium-2 mb-0 mt-25">Submit report to
														admin</p>
													<small>20 February 2019</small>
													<a href="home-community.html">
														<p class="mb-75">by <strong>Komunitas BPecinta Kucing</strong>
														</p>
													</a>
												</div>
											</div>
											<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
												<div class="float-left">
													<p class="text-bold-600 font-medium-2 mb-0 mt-25">Prepare
														presentation</p>
													<small>25 February 2019</small>
													<a href="home-community.html">
														<p class="mb-75">by <strong>Komunitas Bola Basket</strong> </p>
													</a>
												</div>

											</div>
											<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
												<div class="float-left">
													<p class="text-bold-600 font-medium-2 mb-0 mt-25">Calculate monthly
														income</p>
													<small>28 February 2019</small>
													<a href="home-community.html">
														<p class="mb-75">by <strong>Komunitas Pecinta Kucing</strong>
														</p>
													</a>
												</div>
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
	<!-- END: Page JS-->


	<!-- tambahan -->
	<script src="<?= base_url('assets/'); ?>new-js/new.js"></script>

	<script>
		// fungsi ketika btn LIKE ditekan
		$('.like').click(function() {
			$(this).toggle();
			$(this).next().toggle();
			row = $(this).data('row');
			$('#jml_like' + row).toggle();
			$.ajax({
				url: '<?= base_url('community/posting/like') ?> ',
				data: {
					id: $(this).data('id')
				},
				type: 'POST',
				success: function(data) {
					likeToDislike(row);
				},
				error: function(data) {
					alert('tidaaa');
				}
			});
		});

		function likeToDislike(row) {
			$('#dislike' + row).toggle();
			$('#ldg' + row).toggle();
			$('#jml_like' + row).html(parseInt($('#jml_like' + row).html()) + 1);
			$('#jml_like' + row).toggle();
		}

		// fungsi ketika btn DISLIKE ditekan
		$('.dislike').click(function() {
			$(this).toggle();
			$(this).prev().toggle();
			row = $(this).data('row');
			$('#jml_like' + row).toggle();
			$.ajax({
				url: '<?= base_url('community/posting/dislike') ?> ',
				data: {
					id: $(this).data('id')
				},
				type: 'POST',
				success: function(data) {
					DislikeToLike(row);
				},
				error: function(data) {
					alert('tidaaa');
				}
			});
		});

		function DislikeToLike(row) {
			$('#like' + row).toggle();
			$('#ldg' + row).toggle();
			$('#jml_like' + row).html(parseInt($('#jml_like' + row).html()) - 1);
			$('#jml_like' + row).toggle();
		}
	</script>
	<!-- footer user -->
	<?php $this->load->view('v_template_footer') ?>
</body>
<!-- END: Body-->

</html>
