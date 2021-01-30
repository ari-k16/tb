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
						
						<a href="<?php echo site_url('admin/rekening/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						
						<form action="" method="post" enctype="multipart/form-data">
							<!-- Note atribut action dikosongkan, artinya actionnya akan di proses 
								oleh controller tempat view ini digunakan. Yakni index.php/admin/address/edit/ID -->

								<input type="hidden" name="id" value="<?php echo $rekening->id_rekening_cs ?>">


								<div class="form-group">
									<label for="name">*Bank_ru</label>
									<input class="form-control <?php echo form_error('Bank_ru') ? 'is-invalid':'' ?>" type="text" name="bank_ru" min="0" placeholder="Kota_au" value="<?php echo $rekening->bank_ru ?>">
									<div class="invalid-feedback">
										<?php echo form_error('Bank_ru') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*An_Ru</label>
									<input class="form-control <?php echo form_error('An_ru') ? 'is-invalid':'' ?>" type="text" name="an_ru" min="0" placeholder="Provinsi_au" value="<?php echo $rekening->an_ru ?>">
									<div class="invalid-feedback">
										<?php echo form_error('an_ru') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*No_Ru</label>
									<input class="form-control <?php echo form_error('no_ru') ? 'is-invalid':'' ?>" type="text" name="no_ru" min="0" placeholder="KodePos_au" value="<?php echo $rekening->no_ru ?>">
									<div class="invalid-feedback">
										<?php echo form_error('no_ru') ?>
										<?php echo ("no_ru"); ?>
									</div>
								</div>

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
									<label for="Status">*Status_Ru</label>
										<select name="status_ru" class="form-control">
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
										<?php echo form_error('status_ru') ?>
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