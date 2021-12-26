<?php

$session = $this->session->userdata('user');
$select = $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_jurusan ON tb_siswa.jurusan = tb_jurusan.nama_singkat WHERE user = '$session' ");
$fetch = $select->row();

if ($this->session->flashdata('update_profile') == TRUE) : ?>
<script>
	Swal.fire({
		type: 'success',
		title: 'Update Berhasil!',
		text: '<?php echo $this->session->flashdata('update_profile') ?>'
	});
</script>
<?php endif; ?>
<?php
if ($this->session->flashdata('unggah_bukti') ==  TRUE) { ?>
<script>
	Swal.fire({
		type: 'success',
		title: 'Berhasil di Unggah!',
		text: '<?php echo $this->session->flashdata('unggah_bukti') ?>'
	});
</script>
<?php } ?>
<?php

if ($this->session->flashdata('tambah_daf') == TRUE) { ?>
<script>
	Swal.fire({
		type: 'success',
		text: '<?= $this->session->flashdata('tambah_daf') ?>'
	})
</script>
<?php }

?>
<style>
	.modal-content {
		margin: auto;
		width: 90%;
	}
</style>

<div style="overflow-x:hidden;">
	<div class="haduh"></div>
	<div class="back">

	</div>
	<div class="clear-right"></div>
	<div class="row">
		<div class="col-11" style="margin-left: 4%;  ">
			<div class="oi" style="margin-top: 25%;"></div>
			<div class="card" id="kotak">
				<div class="card-body justify-content-center">
					<img src="<?php echo base_url('assets/uploads/profile-siswa/') . $fetch->foto ?>" alt="Foto Profile siswa" class="img-thumbnail justify-content-center" style="width: 125px; height: 125px; border-radius: 50%;" id="foto-pro">
					<h2 class="text-right float-right pt-2" style="color: #f56e61; text-transform: uppercase;  width: 50%; font-family: 'exo' "><?= substr($fetch->nama_siswa, 0, 8) ?></h2>
					<!-- <p class="text-right" style="color: #f56e61; margin-top: -1.5%; font-family: 'quick';"><i class="ni ni-hat-3"></i> <?= $fetch->nama_panjang  ?></p> -->
					<hr style="background-color: #f56e61;">
					<div class="row text-center mt-4" style="font-family: 'exo';">
						<div class="col-4">
							<a href="<?php echo base_url('siswa/profile/') . $fetch->id_siswa ?>" style="color: #f56e61;">
								<i class="fa fa-user-circle" style="font-size: 50px;"></i>Profile
							</a>
						</div>
						<div class="col-4">
							<?php
							$aku = $fetch->nama_siswa;
							$buy = $fetch->id_siswa;
							$cek = $this->db->query("SELECT tanggal FROM tb_absensi WHERE siswa = '$aku' ");
							@$tgl = $cek->tanggal;
							$now = date('Y-m-d');
							$coy = $this->db->query("SELECT * FROM tb_tempat_siswa WHERE id_siswa = '$buy' ");
							if ($tgl == $now) {
								?>
							<a href="" style="color: #f56e61;" data-toggle="modal" data-target="#modal-notificationtiga">
								<i class="fa fa-calendar-alt" style="font-size: 50px;"></i>Absensi
							</a>
							<div class="modal fade" id="modal-notificationtiga" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
								<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
									<div class="modal-content bg-gradient-danger">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">

											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
												<p style="font-size: 13px;">Maaf kamu sudah absen hari ini </p>
											</div>

										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
										</div>

									</div>
								</div>
							</div>

							<?php } else if ($coy->num_rows() == 0) { ?>
							<a href="" style="color: #f56e61;" data-toggle="modal" data-target="#modal-notificationempat">
								<i class="fa fa-calendar-alt" style="font-size: 50px;"></i>Absensi
							</a>
							<div class="modal fade" id="modal-notificationempat" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
								<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
									<div class="modal-content bg-gradient-danger">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">

											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
												<p style="font-size: 13px;">Maaf tempat prakerin kamu belum terkonfirmasi! </p>
											</div>

										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
										</div>

									</div>
								</div>
							</div>
							<?php } else { ?>
							<a href="<?= base_url('siswa/absensi/') . $fetch->id_siswa; ?>" style="color: #f56e61;">
								<i class="fa fa-calendar-alt" style="font-size: 50px;"></i>Absensi
							</a>
							<?php } ?>
						</div>
						<div class="col-4">
							<?php
							$idR	= $fetch->id_siswa;
							$cekSe 	= $this->db->query("SELECT * FROM tb_tempat_siswa WHERE id_siswa = '$idR' ");
							$cekOy 	= $this->db->query("SELECT * FROM tb_sementara WHERE id_siswa = '$idR' ");
							$bar	= $cekSe->num_rows();
							if ($bar > 0) { ?>
							<a href="" style="color: #f56e61;" data-toggle="modal" data-target="#modal-notificationdua">
								<i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
							</a>
							<div class="modal fade" id="modal-notificationdua" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
								<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
									<div class="modal-content bg-gradient-danger">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">

											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
												<p style="font-size: 13px;">Maaf kamu sudah mendapatkan tempat prakerin </p>
											</div>

										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
										</div>

									</div>
								</div>
							</div>
							<?php } else if ($cekOy->num_rows() > 0) { ?>
							<a href="" style="color: #f56e61;" data-toggle="modal" data-target="#modal-notificationaku">
								<i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
							</a>
							<div class="modal fade" id="modal-notificationaku" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
								<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
									<div class="modal-content bg-gradient-danger">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">

											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
												<p style="font-size: 13px;">Sementara menu ini belum dapat di akses ya, sampai tempat prakerin yang kamu daftarkan terkonfirmasi hehe </p>
											</div>

										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
										</div>

									</div>
								</div>
							</div>
							<?php } else {
								?>

							<a href="<?php echo base_url('siswa/daftarPkl/') . $fetch->id_siswa; ?>" style="color: #f56e61;">
								<i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
							</a>

							<?php } ?>
						</div>
					</div>
					<div class="row text-center mt-4" style="font-family: 'exo';">
						<div class="col-4">
							<?php

							$sess 	= $this->session->userdata('user');
							$cekSes = $this->db->query("SELECT * FROM tb_siswa WHERE user = '$sess' ");
							$pecah 	= $cekSes->row();
							$id		= $pecah->id_siswa;
							$kue	= $this->db->query("SELECT * FROM tb_tempat_siswa WHERE id_siswa = '$id' ");
							$ou 	= $this->db->query("SELECT * FROM tb_sementara WHERE id_siswa = '$idR' ");
							$angka	= $kue->num_rows();

							if ($angka > 0) { ?>
							<a href="" style="color: #f56e61" data-toggle="modal" data-target="#modal-notificationsatu">
								<i class="fa fa-building" style="font-size: 50px;"></i><br>Tempat
							</a>
							<div class="modal fade" id="modal-notificationsatu" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
								<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
									<div class="modal-content bg-gradient-danger">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">

											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
												<p style="font-size: 13px;">Maaf kamu sudah mendapatkan tempat prakerin </p>
											</div>

										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
										</div>

									</div>
								</div>
							</div>
							<?php } else if ($ou->num_rows() > 0) { ?>
							<a href="" style="color: #f56e61;" data-toggle="modal" data-target="#modal-notificationa">
								<i class="fa fa-hospital" style="font-size: 50px;"></i><br>Daftar
							</a>
							<div class="modal fade" id="modal-notificationa" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
								<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
									<div class="modal-content bg-gradient-danger">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">

											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="heading mt-4">Menu tidak dapat di akses!</h4>
												<p style="font-size: 13px;">Sementara menu ini belum dapat di akses ya, sampai tempat prakerin yang kamu daftarkan terkonfirmasi hehe </p>
											</div>

										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, Saya paham</button>
										</div>

									</div>
								</div>
							</div>
							<?php } else { ?>
							<a href="<?php echo base_url('siswa/rekomendasi') ?>" style="color: #f56e61;">
								<i class="fa fa-building" style="font-size: 50px;"></i><br>Tempat
							</a>
							<?php }

							?>

						</div>
						<?php
						$oo 	= $fetch->id_siswa;
						$cek 	= $this->db->query("SELECT * FROM tb_notif WHERE id_siswa = '$oo' ");
						$joo	= $cek->row();

						if ($cek->num_rows() > 0) {
							?>
						<div class="col-4">
							<a href="<?php echo base_url('siswa/notif/') . $fetch->id_siswa ?>" style="color: #f56e61;">
								<i class="fa fa-bell" style="font-size: 50px;"></i>Notifikasi
							</a>
						</div>
						<?php } else { ?>
						<div class="col-4">
							<a href="<?php echo base_url('siswa/notif/') . $fetch->id_siswa ?>" style="color: #f56e61;">
								<i class="fa fa-bell" style="font-size: 50px;"></i>Notifikasi
							</a>
						</div>
						<?php } ?>

						<div class="col-4">
							<a href="<?php echo base_url('siswa/pesan') ?>" style="color: #f56e61;">
								<i class="fa fa-comments" style="font-size: 50px;"></i>Pesan
							</a>
						</div>

					</div>
					<div class="row text-center mt-4" style="font-family: 'exo'">

						<div class="col-4">
							<a href="<?php echo base_url('login/logout') ?>" style="color: #f56e61;">
								<i class="fa fa-sign-out-alt" style="font-size: 50px;"></i>Logout
							</a>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- BERKAS FRONT END -->
	<div class="row">
		<div class="col mb-8">
			<?php
			foreach ($berkas as $b) :
				?>
			<div class="card-berkas">
				<div class="row">
					<div class="col-8">
						<h5 class="text-left text-white" id="judul-berkas"><?= $b->nama_berkas; ?></h5>
					</div>
					<div class="col-4 mt-3">
						<a href="<?= base_url('siswa/downloadBerkas/') . $b->file_berkas; ?>" class="btn-down"><i class="ni ni-cloud-download-95"></i></a>
					</div>
				</div>
			</div>
			<?php
			endforeach;
			echo $halaman;

			?>
		</div>
	</div>