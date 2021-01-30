<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transaksi/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode_Transaksi</th>
										<th>Id_Costumer</th>
										<th>Id_user</th>
										<th>Nama_cs</th>
										<th>Alamat</th>
										<th>Tgl_Transaksi</th>
										<th>Status_Pembayaran</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($transaksi as $row) : ?>
									<tr>
										<td width="150">
											<?php echo $row->kode_transaksi ?>
										</td>
										<td>
											<?php echo $row->id_costumer ?>
										</td>
										<td>
											<?php echo $row->id_user ?>
										</td>
										<td>
											<?php echo $row->nama_cs ?>
										</td>
										<td>
											<?php echo $row->alamat ?>
										</td>
										<td>
											<?php echo $row->tgl_transaksi ?>
										</td>
										<td>
											<?php echo $row->status_bayar ?>
										</td>
										<td width="300">
											<a href="<?php echo site_url('admin/transaksi/edit/'.$row->id_transaksi) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/transaksi/delete/'.$row->id_transaksi) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php  endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->
	<?php $this->load->view("admin/_partials/scrolltop") ?>
	<?php $this->load->view("admin/_partials/modal") ?>
	<?php $this->load->view("admin/_partials/js") ?>

<script>    
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>



</body>

</html>