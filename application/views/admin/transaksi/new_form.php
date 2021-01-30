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
					<a href="<?php echo site_url('admin/transaksi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/transaksi/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="kode_transaksi">*Kode_transaksi</label>
							<input autocomplete="off" class="form-control <?php echo form_error('kode_transaksi') ? 'is-invailid':'' ?>" type="text" name="kode_transaksi" placeholder="Kode_transaksi" value="<?php echo $kode; ?>" readonly="">
							<div class="invalid-feedback">
								<?php echo form_error('kode_transaksi') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="id_costumer">*Id_Costumer</label>
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
							<label for="id_user">*Id_User</label>
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

						<div class="form-group">
							<label for="nama_cs">*Nama_Cs</label>
							<input class="form-control <?php echo form_error('nama_cs') ? 'is-invailid' :'' ?>" type="text" name="nama_cs" min="0" placeholder="Nama CS" />
							<div class="invalid-feedback">
								<?php echo form_error('nama_cs') ?>
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
							<label for="tlp_cs">*Tlp_Cs</label>
							<input class="form-control <?php echo form_error('tlp_cs') ? 'is-invailid' :'' ?>" type="numer" name="tlp_cs" min="0" placeholder="tlp_cs" />
							<div class="invalid-feedback">
								<?php echo form_error('tlp_cs') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="alamat">*Alamat</label>
							<input class="form-control <?php echo form_error('alamat') ? 'is-invailid' :'' ?>" type="text" name="alamat" min="0" placeholder="Alamat" />
							<div class="invalid-feedback">
								<?php echo form_error('alamat') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="tgl_transaksi">*Tgl_Transaksi</label>
							<input class="form-control <?php echo form_error('tgl_transaksi') ? 'is-invailid' :'' ?>" type="datetime-local" name="tgl_transaksi" min="0" placeholder="Tgl_Transaksi" />
							<div class="invalid-feedback">
								<?php echo form_error('tgl_transaksi') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="jumlah_transaksi">*Jumlah_Transaksi</label>
							<input class="form-control <?php echo form_error('jumlah_transaksi') ? 'is-invailid' :'' ?>" type="number" name="jumlah_transaksi" min="0" placeholder="jumlah_transaksi" />
							<div class="invalid-feedback">
								<?php echo form_error('jumlah_transaksi') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="status_bayar">*Status_Bayar</label>
							<input class="form-control <?php echo form_error('status_bayar') ? 'is-invailid' :'' ?>" type="text" name="status_bayar" min="0" placeholder="Status_Bayar" />
							<div class="invalid-feedback">
								<?php echo form_error('status_bayar') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="jumlah_bayar">*Jumlah_Bayar</label>
							<input class="form-control <?php echo form_error('jumlah_bayar') ? 'is-invailid' :'' ?>" type="number" name="jumlah_bayar" min="0" placeholder="Jumlah_bayar" />
							<div class="invalid-feedback">
								<?php echo form_error('jumlah_bayar') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="rekening_pembayaran">*Rekening_Pembayaran</label>
							<input class="form-control <?php echo form_error('rekening_pembayaran') ? 'is-invailid' :'' ?>" type="text" name="rekening_pembayaran" min="0" placeholder="Rekening_Pembayaran" />
							<div class="invalid-feedback">
								<?php echo form_error('rekening_pembayaran') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="rekening_cs">*Rekening_Cs</label>
							<input class="form-control <?php echo form_error('rekening_cs') ? 'is-invailid' :'' ?>" type="text" name="rekening_cs" min="0" placeholder="Rekening_Costumer" />
							<div class="invalid-feedback">
								<?php echo form_error('rekening_cs') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="bukti_bayar">Bukti_Pembayaran</label>
							<input class="form-control-file <?php echo form_error('bukti_bayar') ? 'is-invailid':'' ?>" type="file" name="bukti_bayar">
							<div class="invalid-feedback">
								<?php echo form_error('bukti_bayar') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="tgl_post">*Tgl_Post</label>
							<input class="form-control <?php echo form_error('tgl_post') ? 'is-invailid' :'' ?>" type="datetime-local" name="tgl_post" min="0" placeholder="Tgl_post" />
							<div class="invalid-feedback">
								<?php echo form_error('tgl_post') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="tgl_update">*Tgl_Update</label>
							<input class="form-control <?php echo form_error('tgl_update') ? 'is-invailid' :'' ?>" type="datetime-local" name="tgl_update" min="0" placeholder="Tgl_post" />
							<div class="invalid-feedback">
								<?php echo form_error('tgl_update') ?>
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