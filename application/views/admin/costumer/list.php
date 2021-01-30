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
						<a href="<?php echo site_url('admin/costumers/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Point</th>
										<th>Email</th>
										<th>Telpon</th>
										<th>Status</th>
										<th>Catatan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($costumers as $costumer) : ?>
									<tr>
										<td width="150">
											<?php echo $costumer->nama_cs ?>
										</td>
										<td>
											<?php echo $costumer->point_cs ?>
										</td>
										<td>
											<?php echo $costumer->email ?>
										</td>
										<td>
											<?php echo $costumer->tlp_cs ?>
										</td>
										<td>
											<?php echo $costumer->status ?>
										</td>
										<td>
											<?php echo $costumer->catatan_cs ?>
										</td>
										<td width="300">
											<a href="<?php echo site_url('admin/costumers/edit/'.$costumer->id_costumer) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/costumers/delete/'.$costumer->id_costumer) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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