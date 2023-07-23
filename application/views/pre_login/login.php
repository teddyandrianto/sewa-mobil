<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>Sewa</b>Mobil</a>
	</div>

	<?php if ($this->session->flashdata('pesan')) echo $this->session->flashdata('pesan');?>
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Login Akun Pengguna</p>
			<form action="<?php echo base_url('index.php/login/proses_login')?>" method="post">
				<div class="input-group mb-3">
					<input type="number" class="form-control" name="nomorTelpon" placeholder="Masukan Nomor Handphone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-phone"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Masuk</button>
					</div>

				</div>
			</form>

			<p class="mt-2">
				<a href="<?php echo base_url('index.php/registrasi') ?>" class="text-center">Registrasi pengguna Baru</a>
			</p>
		</div>

	</div>
</div>
