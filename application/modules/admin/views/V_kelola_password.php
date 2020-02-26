<?php $this->load->view('V_admin-template-atas-css'); ?>
<?php $this->load->view('V_admin-template-atas'); ?>
<div class="row  d-flex justify-content-center">
	<div class="col-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
			</div>
			<div class="card-body">
				<form action="<?= base_url('admin/kelola-profil/ubah-password') ?>" method="POST" id="form_pass" onsubmit="cek()">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" style="width:225px;" id="basic-addon1">Password Lama</span>
						</div>
						<input type="text" class="form-control form-control-user" name="pass_lama" placeholder="Password Lama" id="psl" required="">
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" style="width:225px;" id="basic-addon1">Password Baru</span>
						</div>
						<input type="password" class="form-control form-control-user" name="pass1" placeholder="Password Baru" id="ps1" required="">
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" style="width:225px;" id="basic-addon1">Konfirmasi
								Password Baru</span>
						</div>
						<input type="password" class="form-control form-control-user" name="pass2" placeholder="Konfirmasi Password Baru" id="ps2" required="">
					</div>

					<div class="alert alert-danger alert-dismissible fade show text-center" id="passgasama" style="display: none;">
						Konfirmasi Password Tidak Sesuai !!
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-user btn-block">
							Ubah Password
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('V_admin-template-bawah'); ?>
<script>
	function cek() {
		var ps1 = document.getElementById('ps1').value;
		var ps2 = document.getElementById('ps2').value;
		if (ps1 != ps2) {
			document.getElementById('passgasama').style.display = "block";
			event.preventDefault();
			return false;
		}
		return true;
	}
</script>
<?php $this->load->view('V_admin-template-tutup'); ?>
