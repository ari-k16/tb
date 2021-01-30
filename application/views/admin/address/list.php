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
						<a href="<?php echo site_url('admin/address/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>id_costumer</th>
										<th>Kota</th>
										<th>Provinsi</th>
										<th>Kode POS</th>
										<th>Deskel</th>
										<th>More</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($address as $row) : ?>
									<tr>
										<td width="150">
											<?php echo $row->id_costumer ?>
										</td>
										<td>
											<?php echo $row->kota_au ?>
										</td>
										<td>
											<?php echo $row->provinsi_au ?>
										</td>
										<td>
											<?php echo $row->kodepos_au ?>
										</td>
										<td>
											<?php echo $row->desakel_au ?>
										</td>
										<td>
											<?php echo $row->more_au ?>
										</td>
										<td width="300">
											<a href="<?php echo site_url('admin/address/edit/'.$row->id_address_cs) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/address/delete/'.$row->id_address_cs) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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