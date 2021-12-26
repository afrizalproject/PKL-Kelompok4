<?php

if ($this->session->flashdata('tamdesk') ==  TRUE) : ?>
<script>
	Swal.fire({
		type: "success",
		title: "Selamat!"

	});
</script>
<?php endif;

$session = $this->session->userdata('user');
$select = $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_jurusan ON tb_siswa.jurusan = tb_jurusan.nama_singkat WHERE user = '$session' ");
$fetch = $select->row();
foreach ($siswa as $o) :

	?>
<section class="tengah">
	<div class="kanan-bag">
		<div class="bungkus-kanan">
			<div id="foto-profile">
				<img src="<?= base_url('assets/uploads/profile-siswa/') . $o->foto; ?>" alt="Foto Profile" class="img-thumbnail rounded-circle">
			</div>

			<div class="judul-nama">
				<h1 class="judul-siswa"><?= $o->nama_siswa ?></h1>
			</div>

			<div class="diskripsi-saya">
				<?php
					if ($o->diskripsi == "") {
						?>
				<p class="diskripsi-oy">Diskripsi tentang diri anda masih kosong, ini adalah bagian untuk menambahkan diskripsi tentang diri anda. Anda dapat menambahkannya dengan mengklik tombol diskripsi di bagian bawah ini.</p>

				<?php } else { ?>
				<p class="diskripsi-oy"><?= $o->diskripsi ?></p>
				<?php } ?>
			</div>

			<div class="tombol-aksi">
				<?php

					if ($o->diskripsi != "") { ?>

				<div class="aksi-kanan">
					<a href="" id="btn-aksi" class="mr--5" data-toggle="modal" data-target="#gagal-dis"><i class="ni ni-badge"></i> Diskripsi</a>
				</div>

				<?php } else { ?>
				<div class="aksi-kanan">
					<a href="" id="btn-aksi" class="mr--5" data-toggle="modal" data-target="#notif-dis-satu"><i class="ni ni-badge"></i> Diskripsi</a>
				</div>
				<?php } ?>
				<?php

					if ($o->diskripsi == "") { ?>
				<div class="aksi-kiri">
					<a href="" id="btn-aksi" data-toggle="modal" data-target="#gagal" class="pl-5 ml--2 pr-5"><i class="ni ni-settings"></i> Ganti</a>
				</div>
				<?php } else { ?>
				<div class="aksi-kiri">
					<a href="" id="btn-aksi" class="pl-5 ml--2 pr-5" data-toggle="modal" data-target="#notif-dis-dua"><i class="ni ni-settings"></i> Ganti</a>
				</div>
				<?php } ?>

			</div>
		</div>
		<div class="clear-left"></div>
	</div>
	<div class="kiri-bag">
		<h1 class="judul-detail">Detail Profile</h1>
		<div class="colo-satu">
			<i class="ni ni-circle-08" id="icon-pro"></i>
		</div>
		<div class="colo-dua">
			<span class="nama-sis mt--3"><?= $o->nama_siswa; ?></span>
		</div>

		<div class="colo-satu">
			<i class="ni ni-shop" id="icon-pro"></i>
		</div>
		<div class="colo-dua">
			<span class="nama-sis mt--3"><?= $o->kelas; ?></span>
		</div>

		<div class="colo-satu">
			<i class="ni ni-hat-3" id="icon-pro"></i>
		</div>
		<div class="colo-dua">
			<span class="nama-sis mt--3"><?= $o->jurusan; ?> ( <?= $fetch->nama_panjang ?> )</span>
		</div>

		<div class="colo-satu">
			<i class="ni ni-satisfied" id="icon-pro"></i>
		</div>
		<div class="colo-dua">
			<span class="nama-sis mt--3">
				<?php
					if ($o->jk = "L") {
						echo "LAKI LAKI";
					} else {
						echo "PEREMPUAN";
					}
					?>
			</span>
		</div>

	</div>

	<div class="claer-left"></div>
</section>

<?php endforeach; ?>




<!-- SECTION NOTIF -->


<div class="col-md-4">
	<div class=" modal fade" id="notif-dis-dua" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
		<form method="POST" action="<?= base_url('siswa/desk') ?>">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ubah Diskripsi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<input type="hidden" value="<?= $fetch->id_siswa; ?>" name="id">
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="diskripsi"><?= $o->diskripsi ?></textarea>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Ubah</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="notif-dis-satu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form action="<?= base_url('siswa/desk') ?>" method="POST">
		<input type="hidden" name="id" value="<?= $o->id_siswa ?>">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Masukan diskripsi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<textarea class="form-control form-control-alternative" rows="3" placeholder="Masukan diskripsi anda di sini..." name="diskripsi"></textarea>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="col-md-4">
	<div class="modal fade" id="gagal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
		<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
			<div class="modal-content bg-gradient-danger">

				<div class="modal-header">
					<h6 class="modal-title" id="modal-title-notification">PEMBERITAHUAN</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="py-3 text-center">
						<i class="ni ni-bell-55 ni-3x"></i>
						<h4 class="heading mt-4">Menu Tidak Dapat di akses</h4>
						<p>Maaf kamu belum memasukan diskripsi tentang kamu</p>
					</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-white" data-dismiss="modal">oke</button>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="modal fade" id="gagal-dis" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
		<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
			<div class="modal-content bg-gradient-danger">

				<div class="modal-header">
					<h6 class="modal-title" id="modal-title-notification">PEMBERITAHUAN</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="py-3 text-center">
						<i class="ni ni-bell-55 ni-3x"></i>
						<h4 class="heading mt-4">Menu Tidak Dapat di akses</h4>
						<p>Maaf kamu sudah menambahkan diskripsi!</p>
					</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-white" data-dismiss="modal">oke</button>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- END SECTION NOTIF -->