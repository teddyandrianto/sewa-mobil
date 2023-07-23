<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>Sewa</b>Mobil</a>
	</div>

	<?php if ($this->session->flashdata('pesan')) echo $this->session->flashdata('pesan');?>
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Registrasi Pengguna</p>
			<form action="<?php echo base_url('index.php/registrasi/proses_registrasi') ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" name="nama" placeholder="Masukan Nama" maxlength="25" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="number" class="form-control" name="nomorTelpon" placeholder="Masukan Nomor Handphone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-phone"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="number" class="form-control" name="nomorSim" placeholder="Masukan Nomor SIM" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="14" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-id-card"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<textarea class="form-control" rows="2" name="alamat" placeholder="Masukan Alamat"  maxlength="40" required></textarea>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-map-marker"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="rePassword" placeholder="Ulangi password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Registrasi</button>
					</div>

				</div>
			</form>

			<p class="mt-2">
				<a href="<?php echo base_url('index.php/login') ?>" class="text-center">Sudah memiliki akun pengguna</a>
			</p>
		</div>

	</div>
</div>
