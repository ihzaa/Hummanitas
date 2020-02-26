<?php $this->load->view('V_admin-template-atas-css'); ?>
<?php $this->load->view('V_admin-template-atas'); ?>
<div class="col d-flex justify-content-center mt-2">
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Komunitas</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_com ?></div>
					</div>
					<div class="col-auto">
						<i class="fa fa-globe fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_user ?></div>
					</div>
					<div class="col-auto">
						<i class="fa fa-user fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('V_admin-template-bawah'); ?>
<?php $this->load->view('V_admin-template-tutup'); ?>
