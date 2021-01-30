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
					<a href="<?php echo site_url('admin/address/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/address/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="costumer">*Id_address_cs</label>
							<input autocomplete="off" class="form-control <?php echo form_error('costumer') ? 'is-invailid':'' ?>" type="text" name="id_address_cs" placeholder="Id_address_cs" value="<?php echo $kode; ?>" readonly="">
							<div class="invalid-feedback">
								<?php echo form_error('Id_address_cs') ?>
							</div>
						</div>

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
							<label for="Kota_au">*Kota_au</label>
							<input autocomplete="off" class="form-control <?php echo form_error('kota_au') ? 'is-invailid':'' ?>" type="text" name="kota_au" placeholder="Kota_au">
							<div class="invalid-feedback">
								<?php echo form_error('kota_au') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="provinsi_au">*Provinsi_au</label>
							<input class="form-control <?php echo form_error('provinsi_au') ? 'is-invailid' :'' ?>" type="text" name="provinsi_au" min="0" placeholder="Provinsi_au" />
							<div class="invalid-feedback">
								<?php echo form_error('provinsi_au') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="Kodepos_au">*Kode POS</label>
							<input class="form-control <?php echo form_error('kodepos_au') ? 'is-invailid' :'' ?>" type="number" name="kodepos_au" min="0" placeholder="Kodepos_au" />
							<div class="invalid-feedback">
								<?php echo form_error('kodepos_au') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="email">*Desakel</label>
							<input class="form-control <?php echo form_error('deskel') ? 'is-invailid' :'' ?>" type="text" name="desakel_au" min="0" placeholder="Deskel" />
							<div class="invalid-feedback">
								<?php echo form_error('deskel_au') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="kecamatan_au">*Kecamatan</label>
							<input class="form-control <?php echo form_error('kecamatan_au') ? 'is-invailid' :'' ?>" type="text" name="kecamatan_au" min="0" placeholder="Kecamatan" />
							<div class="invalid-feedback">
								<?php echo form_error('kecamatan_au') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="More_au">*More_au</label>
							<input class="form-control <?php echo form_error('more_au') ? 'is-invailid' :'' ?>" type="text" name="more_au" min="0" placeholder="More_au" />
							<div class="invalid-feedback">
								<?php echo form_error('more_au') ?>
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

</body>
</html>