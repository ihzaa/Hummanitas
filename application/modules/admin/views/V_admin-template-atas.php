</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="blank.html">
				<div class="sidebar-brand-icon">
					<i class="fas fa-user"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin</div>
			</a>
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php
								$this->load->helper('url');
								if (current_url() == base_url('admin'))
									echo 'active open';
								else
									echo '';
								?>">
				<a class="nav-link" href="<?= base_url('admin') ?>" aria-expanded="true" aria-controls="collapsePages">
					<span>Dashboard</span>
				</a>
				<hr class="sidebar-divider my-0">
			</li>
			<li class="nav-item <?php
								$this->load->helper('url');
								if (current_url() == base_url('admin/report-community') || current_url() == base_url('admin/report-user'))
									echo 'active open';
								else
									echo '';
								?>">
				<a class="nav-link" href="<?= base_url('admin/report-community') ?>">
					<span>Report</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
						</li>

						<!-- Nav Item - Alerts -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bell fa-fw"></i>
								<!-- Counter - Alerts -->
								<span class="badge badge-danger badge-counter count" id="count"><?= $count ?></span>
							</a>
							<!-- Dropdown - Alerts -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Notification Center
								</h6>
								<div class="notif">
									<?php if ($report != NULL) {
										foreach ($report as $report) {
											if ($report->COM_ID == NULL) { ?>
												<a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/report-user') ?>">
													<div class="mr-3">
														<div class="icon-circle bg-primary">
															<i class="icon-user"></i>
														</div>
													</div>
													<div>
														<div class="small text-gray-500"><?= date('d M Y h:ia', strtotime($report->REPORT_DATE)) ?></div>
														<span class="font-weight-bold">There is new reported user!</span>
													</div>
												</a>
											<?php } else { ?>
												<a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/report-community') ?>">
													<div class="mr-3">
														<div class="icon-circle bg-primary">
															<i class="icon-users"></i>
														</div>
													</div>
													<div>
														<div class="small text-gray-500"><?= date('d M Y h:ia', strtotime($report->REPORT_DATE)) ?></div>
														<span class="font-weight-bold">There is new reported community!</span>
													</div>
												</a>
										<?php }
										}
									} else { ?>
										<a class="dropdown-item text-center small text-gray-500" href="#">No new report</a>
									<?php } ?>

									<a class="dropdown-item text-center small text-gray-500" href="#"></a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
								<i class="fas fa-user"></i>
							</a>
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
								<a class="dropdown-item" href="<?= base_url('admin/kelola-profil') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profil
								</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout</a>
							</div>
						</li>
					</ul>
				</nav>

				<h2 align="Center"><?= $judul_halaman ?></h2>
				<div class="container-fluid">