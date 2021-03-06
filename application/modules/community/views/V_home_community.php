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

										<a href="<?= base_url('community/' . $community['COM_ID'] . '/member') ?>" class="btn btn-primary w-100 mt-1"><i class="feather icon-plus mr-25"></i>Load More</a>

									</div>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="new-postbox">
											<div class="avatar mr-50"><img src="<?= base_url('assets/img/user/') . $user['USER_IMAGE']; ?>" alt="png" height="50"></div>
											<div class="newpst-input">
												<?php
												$count = 0;
												?>
												<form id="form-post" action="<?= base_url('community/' . $community['COM_ID'] . '/posting') ?>" method="POST" enctype="multipart/form-data">
													<textarea rows="2" id="isi" name="isi" style="height: 70px;" placeholder="write something"></textarea>
													<br>
													<div class="attachments">
														<ul>
															<li style="float: left;">
																<input type="hidden" name="cnt_row" id="cnt_row" value="<?= count($postingan) ?>">
																<label class="fileContainer">
																	<input type='file' id="gambar" name="gambar" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
																	<img id="blah" src="#" alt="" width="250" />
																	<i class="fa fa-image" id="icon-gmr"></i>
																</label>
															</li>

															<li>
																<button type="submit" href="#" id="btn-posting-ya">Post</button>
																<div class="spinner-border text-primary mr-100" id="ldg-post" role="status" style="display:none;"></div>
															</li>
														</ul>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="post" id="kotak-postingan">


								</div>
							</div>
							<div class="col-lg-3 col-12">
								<div class="card">
									<div class="card-header d-flex justify-content-between align-items-center border-bottom pb-1">
										<div>
											<p class="mb-75"><strong>Upcoming Events</strong></p>
										</div>
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
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
	<!-- END: Page JS-->

	<!-- footer user -->
	<?php $this->load->view('user/v_template_footer') ?>
	<!-- footer community -->
	<?php $this->load->view('v_template_footer') ?>

	<!-- FUNGSI PREVIEW INPUT GAMBAR POSTINGAN -->

	<script>
		$(document).ready(function() {

			var flag = 4;
			$.ajax({
				type: "POST",
				url: "<?= base_url('ajax/' . $community['COM_ID'] . '/loadMoreComPost') ?>",
				data: {
					'offset': 0,
					'limit': 4
				},
				success: function(data) {
					$('.post').html(data);
					flag += 4;
				}
			});

			$(window).scroll(function() {
				if ($(window).scrollTop() == $(document).height() - $(window).height()) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('ajax/' . $community['COM_ID'] . '/loadMoreComPost') ?>",
						data: {
							'offset': 0,
							'limit': flag
						},
						success: function(data) {
							$('.post').html(data);
							flag += 4;
						}
					});
				}
			});

		});
	</script>

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
				$('#btn-posting-ya').toggle();
				$('#ldg-post').toggle();
				var isi = $('textarea[name=isi]').val();
				var gambar = $('input[name=gambar]').val();
				if (isi == '' && gambar == '') {
					Swal.fire(
						'Failed!',
						'You must fill post description or post photo or both',
						'error'
					);
					$('#btn-posting-ya').toggle();
					$('#ldg-post').toggle();
				} else {
					$.ajax({
						url: $(this).attr("action"),
						data: new FormData(this),
						cache: false,
						processData: false,
						contentType: false,
						type: 'POST',
						success: function(data) {
							// $('#kotak-postingan').prepend(data);
							$(data).prependTo('#kotak-postingan').slideDown('slow');
							reset_input();
						},
						error: function(data) {
							alert('tidaaa');
						}
					});
				}
			});

			function reset_input() {
				$('#isi').val('');
				$('#gambar').val('');
				$('#blah').attr('src', '#');
				$('#icon-gmr').show();
				$('#cnt_row').val(parseInt($('#cnt_row').val()) + 1);
				$('#btn-posting-ya').show();
				$('#ldg-post').hide();
			}

			// fungsi ketika btn LIKE ditekan
			$(document).on("click", ".like", function() {
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
			$(document).on("click", ".dislike", function() {
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

			$(document).on("click", ".delete-post-btn", function() {
				var id = $(this).data('id');
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
					confirmButtonClass: 'btn btn-primary',
					cancelButtonClass: 'btn btn-danger ml-1',
					buttonsStyling: false,
				}).then(function(result) {
					if (result.value) {
						$.ajax({
							url: '<?= base_url('community/posting/delete') ?> ',
							data: {
								id_post: id
							},
							type: 'POST',
							success: function(data) {},
							error: function(data) {
								alert('tidaaa');
							}
						});
						Swal.fire({
							type: "success",
							title: 'Deleted!',
							text: 'Your post has been deleted.',
							confirmButtonClass: 'btn btn-success',
						})
						document.getElementById('Kpost' + id).style.display = "none";
					}
				})
			});

			$(document).on('click', '.btn-comment-post', function() {

				id = $(this).data('id');
				isi_com = $('#input-comment' + id).val();
				if (isi_com != '') {
					$(this).hide();
					$(this).next().show();
					$.ajax({
						url: '<?= base_url('posting/comment/store') ?> ',
						data: {
							id_post: id,
							isi: isi_com
						},
						type: 'POST',
						success: function(data) {
							$(data).appendTo('#kotak-komen' + id).slideDown('slow');
							reset_comment_input(id);
						},
						error: function(data) {
							alert('tidaaa');
						}
					});
				}
			});

			function reset_comment_input(id) {
				$('#jml_cmt' + id).html(parseInt($('#jml_cmt' + id).html()) + 1);
				$('#input-comment' + id).val('');
				$('#ldg-comment' + id).prev().show();
				$('#ldg-comment' + id).hide();
			}

			$(document).on("click", '.load-more', function() {
				var id_post_i = $(this).data('id');
				var last_id_i = $('#last_id_com' + id_post_i).val();
				if ($(this).html() == 'Load More') {
					$(this).html('Loading...');
					$.ajax({
						url: '<?= base_url('posting/comment/loadmore') ?> ',
						data: {
							id_post: id_post_i,
							last_id: last_id_i
						},
						type: 'POST',
						success: function(data) {
							success_load_comment(id_post_i);
							$(data).prependTo('#kotak-komen' + id_post_i).slideDown('slow');
						},
						error: function(data) {
							alert('tidaaa');
						}
					});
				}
			});

			function success_load_comment(i) {
				$('#load-more' + i).parent().parent().remove();
				$('#last_id_com' + i).remove();
			}

			$(document).on('click', '.del-comment', function() {
				var id_c = $(this).data('id');
				var id = $(this).data('post');
				$.ajax({
					url: '<?= base_url('posting/comment/delete') ?> ',
					data: {
						id_com: id_c
					},
					type: 'POST',
					success: function(data) {
						ApusBlokComent(id_c, id);
					},
					error: function(data) {
						alert('tidaaa');
					}
				});
			});

			function ApusBlokComent(i, id) {
				$('#jml_cmt' + id).html(parseInt($('#jml_cmt' + id).html()) - 1);
				$('#hr-ke' + i).remove();
				$('#del-comment' + i).parent().parent().parent().parent().remove();
			}
		});
	</script>






</body>
<!-- END: Body-->

</html>