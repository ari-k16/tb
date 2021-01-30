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
						<a href="<?php echo site_url('admin/banking/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Id_Costumer</th>
										<th>Id_Rekening_Cs</th>
										<th>Jml_Tf_Banking</th>
										<th>Tgl_tf_banking</th>
										<th>Tgl_confirm_banking</th>
										<th>Status_banking</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($banking as $row) : ?>
									<tr>
										<td width="150">
											<?php echo $row->id_costumer ?>
										</td>
										<td>
											<?php echo $row->id_rekening_cs ?>
										</td>
										<td>
											<?php echo $row->jumlah_tf_banking ?>
										</td>
										<td>
											<?php echo $row->tgl_tf_banking ?>
										</td>
										<td>
											<?php echo $row->tgl_konfirmasi_banking ?>
										</td>
										<td>
											<?php echo $row->status_banking ?>
										</td>
										<td width="300">
											<a href="<?php echo site_url('admin/banking/edit/'.$row->id_banking) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/banking/delete/'.$row->id_banking) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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