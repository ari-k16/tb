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
					<a href="<?php echo site_url('admin/costumers/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/costumers/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="costumer">*Id_Costumer</label>
							<input autocomplete="off" class="form-control <?php echo form_error('costumer') ? 'is-invailid':'' ?>" type="text" name="id_costumer" placeholder="Id_Costumer" value="<?php echo $kode; ?>" readonly="">
							<div class="invalid-feedback">
								<?php echo form_error('id_costumer') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="nama">*Nama</label>
							<input autocomplete="off" class="form-control <?php echo form_error('costumer') ? 'is-invailid':'' ?>" type="text" name="nama_cs" placeholder="Nama">
							<div class="invalid-feedback">
								<?php echo form_error('Nama') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="username">*Username</label>
							<input autocomplete="off" class="form-control <?php echo form_error('costumer') ? 'is-invailid':'' ?>" type="text" name="username" placeholder="Username">
							<div class="invalid-feedback">
								<?php echo form_error('Username') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="password">*Password</label>
							<input class="form-control <?php echo form_error('password') ? 'is-invailid' :'' ?>" type="password" name="password" min="0" placeholder="Password" />
							<div class="invalid-feedback">
								<?php echo form_error('password') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="point_cs">*Point_cs</label>
							<input class="form-control <?php echo form_error('point_cs') ? 'is-invailid' :'' ?>" type="number" name="point_cs" min="0" placeholder="Point Cs" />
							<div class="invalid-feedback">
								<?php echo form_error('point_cs') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="email">*Email</label>
							<input class="form-control <?php echo form_error('email') ? 'is-invailid' :'' ?>" type="email" name="email" min="0" placeholder="Email" />
							<div class="invalid-feedback">
								<?php echo form_error('email') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="Tlp_CS">*Tlp_CS</label>
							<input class="form-control <?php echo form_error('Tlp_CS') ? 'is-invailid' :'' ?>" type="number" name="tlp_cs" min="0" placeholder="Telp_CS" />
							<div class="invalid-feedback">
								<?php echo form_error('tlp_cs') ?>
							</div>
						</div>

						<div class="form-group">
									<label for="id_address_cs">*Id_address_cs</label>
									<select name="id_address_cs" class="form-control">
									<option disabled selected="">Pilih</option>
										<?php foreach($address as $row): ?>
										<option value="<?php echo $row->id_address_cs; ?>"><?php echo $row->id_address_cs; ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback">
										<?php echo form_error('id_address_cs') ?>
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
							<label for="Status">*Status</label>
								<select name="status" class="form-control">
								<option value="">--Pilih--</option>
									<?php  
										$pilihan = array("Y","N","W");
										foreach ($pilihan as $nilai){
										if($level==$nilai){
										$cek= "selected";
										}else{ $cek = ""; }
										echo "<option value='$nilai' $cek>$nilai</option>";
										}
									?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
						</div>

								<div class="form-group">
									<label for="catatan">Catatan CS</label>
									<textarea name="catatan_cs" class="form-control"></textarea>
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