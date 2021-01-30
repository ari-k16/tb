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
			
			<?php $this->load->view("admin/_partials/breadcrumb") ?>

			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php endif; ?>

			<div class="card mb-3">
				<div class="card-header">
					<a href="<?php echo site_url('welcome_message') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/banking/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="id_costumer">*Id_costumer</label>
								<select name="id_costumer" class="form-control">
								<option disabled selected="">Pilih</option>
									<?php foreach($costumers as $row): ?>
								<option value="<?php echo $row->id_costumer; ?>"><?php echo $row->id_costumer; ?></option>
										<?php endforeach; ?>
								</select>
							<div class="invalid-feedback">
								<?php echo form_error('id_costumer') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="id_rekening_cs">*Id_rekening_cs</label>
								<select name="id_rekening_cs" class="form-control">
									<option disabled selected="">Pilih</option>
									<?php foreach($rekening as $row): ?>	
									<option value="<?php echo $row->id_rekening_cs ?>"><?php echo $row->id_rekening_cs ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('id_rekening_cs') ?>
								</div>
						</div>

						<div class="form-group">
							<label for="nama">*Jumlah_Tf_Banking</label>
							<input autocomplete="off" class="form-control <?php echo form_error('Jumlah_Tf_Banking') ? 'is-invailid':'' ?>" type="double" name="jumlah_tf_banking" placeholder="Jumlah_Tf_Banking">
							<div class="invalid-feedback">
								<?php echo form_error('jumlah_tf_banking') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="username">*Tgl_tf_banking</label>
							<input autocomplete="off" class="form-control datepicker <?php echo form_error('tgl_tf_banking') ? 'is-invailid':'' ?>" type="date" name="tgl_tf_banking" placeholder="Tgl_tf_banking">
							<div class="invalid-feedback">
								<?php echo form_error('tgl_tf_banking') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="Tgl_konfirmasi_banking">*Tgl_konfirmasi_banking</label>
							<input class="form-control datepicker <?php echo form_error('Tgl_konfirmasi_banking') ? 'is-invailid' :'' ?>" type="date" name="tgl_konfirmasi_banking" min="0" placeholder="Tgl_konfirmasi_banking" />
							<div class="invalid-feedback">
								<?php echo form_error('tgl_konfirmasi_banking') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="Status">*Status_Banking</label>
								<select name="status_banking" class="form-control">
								<option value="">--Pilih--</option>
									<?php  
										$pilihan = array("Y","N");
										foreach ($pilihan as $nilai){
										if($level==$nilai){
										$cek= "selected";
										}else{ $cek = ""; }
										echo "<option value='$nilai' $cek>$nilai</option>";
										}
									?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('status_banking') ?>
								</div>
						</div>

						<div class="form-group">
							<label for="id_user">*Id_user</label>
								<select name="id_user" class="form-control">
									<option disabled selected="">Pilih</option>
										<?php foreach($user as $row): ?>
										<option value="<?php echo $row->id_user; ?>"><?php echo $row->id_user; ?></option>
										<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('id_user') ?>
								</div>
						</div>
						
						<input class="btn btn-success" type="submit" name="btn" value="Save">
					</form>
				</div>

				<div class="card-footer small text-muted">
					*required fields
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer") ?>
		</div>
		<!-- /.content-wrapper -->
	</div>

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("admin/_partials/scrolltop") ?>
	<?php $this->load->view("admin/_partials/js") ?>

	<script type="text/javascript">
		$(function(){
			$(".datepicker").datepicker({
				format : 'yyyy-mm-dd',
				autoclose: true;
				todayHighlight: true;
			});
		});
	</script>

</body>
</html>