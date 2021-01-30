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
					<a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/users/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="username">*Username</label>
							<input autocomplete="off" class="form-control <?php echo form_error('username') ? 'is-invailid':'' ?>" type="text" name="username" placeholder="Username">
							<div class="invalid-feedback">
								<?php echo form_error('username') ?>
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
							<label for="email">*Email</label>
							<input class="form-control <?php echo form_error('email') ? 'is-invailid' :'' ?>" type="email" name="email" min="0" placeholder="Email" />
							<div class="invalid-feedback">
								<?php echo form_error('email') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="full_name">*Full Name</label>
							<input class="form-control <?php echo form_error('full_name') ? 'is-invailid' :'' ?>" type="text" name="full_name" min="0" placeholder="Full Name" />
							<div class="invalid-feedback">
								<?php echo form_error('full_name') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="phone">*Phone</label>
							<input class="form-control <?php echo form_error('phone') ? 'is-invailid' :'' ?>" type="number" name="phone" min="0" placeholder="Phone" />
							<div class="invalid-feedback">
								<?php echo form_error('phone') ?>
							</div>
						</div>

						<div class="form-group">
									<label for="role">*Role</label>
									<select name="role" class="form-control">
										<option value="">--Pilih--</option>
										<?php  
										$pilihan = array("admin","costumer");
										foreach ($pilihan as $nilai){
											if($level==$nilai){
												$cek= "selected";
											}else{ $cek = ""; }
											echo "<option value='$nilai' $cek>$nilai</option>";
										}
										?>
									</select>
									<div class="invalid-feedback">
										<?php echo form_error('role') ?>
									</div>
								</div>

						<div class="form-group">
							<label for="name">Photo</label>
							<input class="form-control-file <?php echo form_error('photo') ? 'is-invailid':'' ?>" type="file" name="photo">
							<div class="invalid-feedback">
								<?php echo form_error('photo') ?>
							</div>
						</div>

						<div class="form-group">
									<label for="name">*Is_active</label>
									<select name="is_active" class="form-control">
										<option value="">--Pilih--</option>
										<?php  
										$pilihan = array("0","1");
										foreach ($pilihan as $nilai){
											if($level==$nilai){
												$cek= "selected";
											}else{ $cek = ""; }
											echo "<option value='$nilai' $cek>$nilai</option>";
										}
										?>
									</select>
									<div class="invalid-feedback">
										<?php echo form_error('is_active') ?>
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