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
						<a href="<?php echo site_url('admin/rekening/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Id_Rekening_CS</th>
										<th>Bank_ru</th>
										<th>An_ru</th>
										<th>Id_Costumer</th>
										<th>Status_Ru</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rekening as $row) : ?>
									<tr>
										<td width="150">
											<?php echo $row->id_rekening_cs ?>
										</td>
										<td>
											<?php echo $row->bank_ru ?>
										</td>
										<td>
											<?php echo $row->an_ru ?>
										</td>
										<td>
											<?php echo $row->id_costumer ?>
										</td>
										<td>
											<?php echo $row->status_ru ?>
										</td>
										<td width="300">
											<a href="<?php echo site_url('admin/rekening/edit/'.$row->id_rekening_cs) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/rekening/delete/'.$row->id_rekening_cs) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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