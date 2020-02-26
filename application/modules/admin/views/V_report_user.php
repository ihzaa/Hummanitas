<?php $this->load->view('V_admin-template-atas-css'); ?>

<link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<?php $this->load->view('V_admin-template-atas'); ?>
<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/report-community') ?>">Komunitas</a>
	</li>
	<li class="nav-item">
		<a class="nav-link active" href="#">User</a>
	</li>
</ul>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pelapor</th>
						<th>Nama Terlapor</th>
						<th>Tanggal</th>
						<th>Isi</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama Pelapor</th>
						<th>Nama Terlapor</th>
						<th>Tanggal</th>
						<th>Isi</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					$i = 1;
					foreach ($row as $item) { ?>
						<tr id="brs<?= $i ?>" <?php
												if ($item->status == 1) {
													echo 'style="background-color: #c3c9c5;"';
												}
												?>>
							<td><?= $i ?></td>
							<td><?= $item->pelapor ?></td>
							<td><?= $item->terlapor ?></td>
							<td><?= date('d M, Y', strtotime($item->REPORT_DATE))  ?></td>
							<td><?php echo substr($item->REPORT_DESC, 0, 25); ?></td>
							<td>
								<div class="row justify-content-center">
									<a href="#" style="background-color:
									<?php
									if ($item->status == 0) {
										echo '#dc3545';
									} else {
										echo '#868e96';
									}
									?>;" data-toggle="modal" data-target="#detailModal" id="btn-detail<?= $i ?>" class="btn  btn-circle btn-sm" title=" Detail" data-i="<?= $i ?>" data-pelapor="<?= $item->pelapor ?>" data-terlapor="<?= $item->terlapor ?>" data-isi="<?= $item->REPORT_DESC ?>" data-id_terlapor="<?= $item->SUSPECT_ID ?>" data-id_report="<?= $item->REPORT_ID ?>">
										<i class="fas fa-info text-light"></i>
									</a>
									<a href="#" data-toggle="modal" data-target="#hapusModal" class="btn btn-danger btn-circle btn-sm" title="Hapus" data-id_report="<?= $item->REPORT_ID ?>" data-baris="<?= $i++ ?>">
										<i class="fas fa-trash text-light"></i>
									</a>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Report</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="user" action="<?= base_url('') ?>admin/report-user/del" method="POST">
					<input type="hidden" id="id_terlapor" name="id_terlapor">
					<input type="hidden" name="id_report" id="id_report">
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<label>Nama Pelapor</label>
							<input type="text" class="form-control" placeholder="Nama" id="pelapor" disabled="">
						</div>
						<div class="col-sm-6">
							<label for="nis">Nama Terlapor</label>
							<input type="text" class="form-control" id="terlapor" disabled="">
						</div>
					</div>
					<div class="form-group row">
						<div class="col">
							<label>Isi Laporan</label>
							<textarea id="isi" rows="10" class="form-control" disabled=""></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-danger" href="#">Hapus User Terlapor</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- MODAL HAPUS -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Report?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<button type="button" data-dismiss="modal" class="btn btn-danger" id="btn-id" data-target="">Hapus</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('V_admin-template-bawah'); ?>
<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script>
	$('#detailModal').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget) // Button that trigg  ered the modal
		var modal = $(this)

		modal.find('.modal-body #id_terlapor').val(button.data('id_terlapor'))
		modal.find('.modal-body #id_report').val(button.data('id_report'))
		modal.find('.modal-body #pelapor').val(button.data('pelapor'))
		modal.find('.modal-body #terlapor').val(button.data('terlapor'))
		modal.find('.modal-body #isi').val(button.data('isi'))

		document.getElementById('btn-detail' + button.data('i')).style.backgroundColor = '#868e96';
		document.getElementById('btn-detail' + button.data('i')).parentElement.parentElement.parentElement.style.backgroundColor = '#c3c9c5';

		$.ajax({
			type: 'post',
			url: '<?= base_url('admin/report/read') ?> ',
			data: {
				'id': button.data('id_report')
			},
			error: function(data) {
				alert("fail");
			}
		});
	})

	$('#hapusModal').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget) // Button that trigg  ered the modal
		document.getElementById('btn-id').dataset.target = button.data('id_report')
		document.getElementById('btn-id').dataset.baris = button.data('baris')
	})

	$('#btn-id').click(function() {
		var a = $(this).data('baris')
		$.ajax({
			type: 'post',
			url: '<?= base_url('admin/report/del') ?> ',
			data: {
				'id': $(this).data('target')
			},
			success: function(data) {
				document.getElementById('brs'+a).style.display = 'none'
			},
			error: function(data) {
				alert("fail");
			}
		});
	})

</script>
<?php $this->load->view('V_admin-template-tutup'); ?>
