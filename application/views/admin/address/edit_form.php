<!DOCTYPE html>
<html>

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

				<?php if($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card -->
				<div class="card mb-3">
					<div class="card-header">
						
						<a href="<?php echo site_url('admin/address/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						
						<form action="" method="post" enctype="multipart/form-data">
							<!-- Note atribut action dikosongkan, artinya actionnya akan di proses 
								oleh controller tempat view ini digunakan. Yakni index.php/admin/address/edit/ID -->

								<input type="hidden" name="id" value="<?php echo $address->id_address_cs ?>">

						<div class="form-group">
							<label for="id_costumer">*Id_costumer</label>
								<select name="id_costumer" class="form-control <?php echo form_error('Id_costumer') ?>">
									<option>Pilih</option>
									<?php foreach($costumers as $row): ?>
									<option value="<?php echo $row->id_costumer; ?>"><?php echo $row->id_costumer; ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('id_costumer') ?>
								</div>
						</div>

								<div class="form-group">
									<label for="name">*Kota_au</label>
									<input class="form-control <?php echo form_error('Kota_au') ? 'is-invalid':'' ?>" type="text" name="kota_au" min="0" placeholder="Kota_au" value="<?php echo $address->kota_au ?>">
									<div class="invalid-feedback">
										<?php echo form_error('kota_au') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Provinsi_au</label>
									<input class="form-control <?php echo form_error('provinsi_au') ? 'is-invalid':'' ?>" type="text" name="provinsi_au" min="0" placeholder="Provinsi_au" value="<?php echo $address->provinsi_au ?>">
									<div class="invalid-feedback">
										<?php echo form_error('provinsi_au') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Kode POS</label>
									<input class="form-control <?php echo form_error('kodepos_au') ? 'is-invalid':'' ?>" type="text" name="kodepos_au" min="0" placeholder="KodePos_au" value="<?php echo $address->kodepos_au ?>">
									<div class="invalid-feedback">
										<?php echo form_error('kodepos_au') ?>
										<?php echo ("kodepos_au"); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Desakel_au</label>
									<input class="form-control <?php echo form_error('desakel_au') ? 'is-invalid':'' ?>" type="text" name="desakel_au" min="0" placeholder="Desakel_au" value="<?php echo $address->desakel_au ?>">
									<div class="invalid-feedback">
										<?php echo form_error('desakel_au') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Kecamatan_au</label>
									<input class="form-control <?php echo form_error('kecamatan_au') ? 'is-invalid':'' ?>" type="text" name="kecamatan_au" min="0" placeholder="Kecamatan_au" value="<?php echo $address->kecamatan_au ?>">
									<div class="invalid-feedback">
										<?php echo form_error('kecamatan_au') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*More_au</label>
									<input class="form-control <?php echo form_error('more_au') ? 'is-invalid':'' ?>" type="text" name="more_au" min="0" placeholder="More_au" value="<?php echo $address->more_au ?>">
									<div class="invalid-feedback">
										<?php echo form_error('more_au') ?>
									</div>
								</div>

								<input class="btn btn-success" type="submit" name="btn" value="Save" />
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
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop") ?>

		<?php $this->load->view("admin/_partials/js") ?>
	</div>
	
</body>

</html>