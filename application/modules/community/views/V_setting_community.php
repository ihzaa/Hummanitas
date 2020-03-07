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
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/pickadate/pickadate.css">
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
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/forms/validation/form-validation.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

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
			<div class="content-header row">
				<div class="content-header-left col-md-9 col-12 mb-2">
					<div class="row breadcrumbs-top">
						<div class="col-12">
							<h2 class="content-header-title float-left mb-0">Community Settings</h2>
						</div>
					</div>
				</div>

			</div>
			<div class="content-body">
				<!-- account setting page start -->
				<section id="page-account-settings">
					<div class="row">
						<!-- left menu section -->
						<div class="col-md-3 mb-2 mb-md-0">
							<ul class="nav nav-pills flex-column mt-md-0 mt-1">
								<li class="nav-item">
									<a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
										<i class="feather icon-globe mr-50 font-medium-3"></i>
										General
									</a>
								</li>


							</ul>
						</div>
						<!-- right content section -->
						<div class="col-md-9">
							<div class="card">
								<div class="card-content">
									<div class="card-body">
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
												<?= form_open_multipart('community/' . $community['COM_ID'] . '/setting_community1'); ?>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label style="margin-left: 20px">Change image community</label>

															<br><br>
															<img src=" <?= base_url('assets/img/community/profile/') . $community['COM_IMAGE']; ?>" id="img-preview" style="height: 100px;width: 100px;border-radius: 10%;margin-left: 20px">
															<br><br>

															<div class="row align-items-center">


																<div class="col-sm-3">
																	<div class="custom-file">

																		<input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="image" name="image">
																		<label class="custom-file-label" for="image">Choose file</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label style="margin-left: 20px">Change cover community</label>
															<br><br>

															<img src="<?= base_url('assets/img/community/cover/') . $community['COM_COVER']; ?>" id="cvr-prev" style="height: 200px;width: 450px">
															<br><br>
															<div class="row align-items-center">


																<div class="col-sm-6">
																	<div class="custom-file">

																		<input type="file" class="custom-file-input" id="cover" name="cover">
																		<label class="custom-file-label" for="image">Choose file</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<hr>

												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<label for="accountTextarea">description</label>
															<textarea class="form-control" id="description" name="description" rows="3" placeholder="description"><?= $community['COM_DESC'] ?></textarea>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label>Name</label>
																<input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-validation-required-message="This name field is required" value="<?= $community['COM_NAME'] ?>">
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label>Location</label>
																<input type="text" class="form-control" id="location" name="location" required placeholder="Location" data-validation-required-message="This Address field is required" value="<?= $community['COM_LOC'] ?>">
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label>Address</label>
																<input type="text" class="form-control" id="address" name="address" required placeholder="Address" data-validation-required-message="This Address field is required" value="<?= $community['COM_ADDRESS'] ?>">
															</div>
														</div>
													</div>

													<div class="col-12">

														<div class="form-group">
															<div class="controls">
																<label>E-mail</label>
																<input type="email" class="form-control" id="email" name="email" placeholder="Email" required data-validation-required-message="This email field is required" value="<?= $community['COM_EMAIL'] ?>">
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label for="account-phone">Phone</label>
																<input type="text" class="form-control" id="account-phone" name="phone" required placeholder="Phone number" data-validation-required-message="This phone number field is required" value="<?= $community['COM_TELP'] ?>">
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<label>Private</label>
															<ul class="list-unstyled mb-0">
																<?php if ($community['ISPUBLIC'] == 1) {
																?>
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
																<?php } else {
																?>

																	<li class="d-inline-block mr-2">
																		<fieldset>
																			<div class="vs-radio-con">
																				<input type="radio" name="vueradio" checked value="0">
																				<span class="vs-radio">
																					<span class="vs-radio--border"></span>
																					<span class="vs-radio--circle"></span>
																				</span>
																				Yes
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
																				No
																			</div>
																		</fieldset>
																	</li>

																<?php } ?>



															</ul>
														</div>
													</div>



													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
															changes</button>
													</div>
												</div>
												</form>
											</div>





										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- account setting page end -->

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
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/dropzone.min.js"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/account-setting.js"></script>
	<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/forms/select/form-select2.js"></script>
	<!-- END: Page JS-->

	<!-- footer user -->
	<?php $this->load->view('user/v_template_footer') ?>
	<!-- footer community -->
	<?php $this->load->view('v_template_footer') ?>

	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#img-preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#image").change(function() {
			readURL(this);
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#cvr-prev').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#cover").change(function() {
			readURL(this);
		});
	</script>
</body>
<!-- END: Body-->

</html>
