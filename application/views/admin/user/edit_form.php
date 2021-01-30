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
						
						<a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						
						<form action="" method="post" enctype="multipart/form-data">
							<!-- Note atribut action dikosongkan, artinya actionnya akan di proses 
								oleh controller tempat view ini digunakan. Yakni index.php/admin/products/edit/ID -->

								<input type="hidden" name="id" value="<?php echo $user->id_user ?>">

								<div class="form-group">
									<label for="name">*Username</label>
									<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="Username" value="<?php echo $user->username ?>">
									<div class="invalid-feedback">
										<?php echo form_error('username') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Password</label>
									<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password" min="0" placeholder="Password" value="<?php echo $user->password ?>">
									<div class="invalid-feedback">
										<?php echo form_error('password') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Email</label>
									<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="email" name="email" min="0" placeholder="Email" value="<?php echo $user->email ?>">
									<div class="invalid-feedback">
										<?php echo form_error('email') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Full Name</label>
									<input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>" type="text" name="full_name" min="0" placeholder="Full Name" value="<?php echo $user->full_name ?>">
									<div class="invalid-feedback">
										<?php echo form_error('full_name') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Phone</label>
									<input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>" type="text" name="phone" min="0" placeholder="Password" value="<?php echo $user->phone ?>">
									<div class="invalid-feedback">
										<?php echo form_error('phone') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Role</label>
									<select name="role" class="form-control" value="<?php echo $user->role ?>">
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
									<input class="form-control-file <?php echo form_error('photo') ? 'is-invalid':'' ?>" type="file" name="photo">
									<input type="hidden" name="old_image" value="<?php echo $user->photo ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('photo') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="name">*Is_active</label>
									<select name="is_active" class="form-control" value="<?php echo $user->is_active ?>">
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