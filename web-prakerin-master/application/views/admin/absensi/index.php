<div class="main-content">
    <?php

    if ($this->session->flashdata('input_absen') == TRUE) { ?>
        <script>
            Swal.fire({
                type: 'success',
                title: 'Selamat!',
                text: '<?= $this->session->flashdata('input_absen') ?>'
            });
        </script>
    <?php }

    if ($this->session->flashdata('bulan_sama') == TRUE) { ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Input Gagal!',
                text: '<?= $this->session->flashdata('bulan_sama') ?>'
            });
        </script>
    <?php }

    if ($this->session->flashdata('ubah_manu') == TRUE) { ?>
        <script>
            Swal.fire({
                type: 'success',
                title: 'Selamat!',
                text: '<?= $this->session->flashdata('ubah_manu') ?>'
            });
        </script>
    <?php }
    if ($this->session->flashdata('gagal_ubah') == TRUE) { ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Maaf!',
                text: '<?= $this->session->flashdata('gagal_ubah') ?>'
            });
        </script>
    <?php }

    ?>

    <!-- Modal Notif -->

    <div class="col-md-4">
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">

                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-notification">Pemberitahuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Cek absensi belum dapat di akses!</h4>
                            <p>Maaf kamu belum menginputkan absensi untuk siswa ini </p>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Ok, Saya Paham</button>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End Modal Notif -->
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Dashboard</a>

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">

                            <div class="media-body ml-2 d-none d-lg-block">
                                <?php
                                $cek    = $this->db->get('tb_sementara');
                                $baris  = $cek->num_rows();

                                if ($baris == 0) {
                                ?>
                                    <span class="mb-0 text-sm  font-weight-bold">Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b></span>
                                <?php } else { ?>
                                    <span class="mb-0 text-sm  font-weight-bold">*Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b></span>
                                <?php } ?>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="<?php echo base_url('admin/notif') ?>" class="dropdown-item">
                            <i class="ni ni-notification-70"></i>
                            <span>Notifikasi (<?php echo $baris; ?>)</span>
                        </a>
                        <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-info pt-5 pt-md-8">
        <div class="row">
            <div class="col-md-12 ml-4">
                <form action="<?= base_url('admin/cariAbsen?jurusan=a') ?>" method="POST">
                    <div class="form-group">
                        <h3 style="text-transform: uppercase; border-bottom: 2px solid #fff; width: 50%; color: white; margin-bottom: 5%;">Cari Absensi dengan kamera</h3>
                        <div class="row">
                            <div class="col-3" id="ju">
                                <select name="keyword" class="form-control">
                                    <?php foreach ($jurusan as $j) : ?>
                                        <option value="<?= $j->nama_singkat ?>"><?= $j->nama_singkat ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-3">

                                <select name="siswa" class="form-control">
                                    <?php foreach ($siswa as $c) : ?>
                                        <option value="<?= $c->siswa ?>"><?= $c->siswa ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-info" id="cari" name="cari" value="Cari">
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['cari'])) {

    ?>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <?php
                                error_reporting(0);
                                ?>
                                <?php foreach ($akhir as $b) : ?>

                                <?php endforeach; ?>
                                <h3 class="mb-0">Daftar Absensi <b><?= @$b->jurusan ?></b></h3>
                            </div>
                            <div class="col text-right">
                                <a href="<?= site_url('admin/cetakAbsenKelas') ?>" target="_blank" class="btn btn-sm btn-primary">Cetak PDF</a>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">
                                            No
                                        </th>
                                        <th scope="col">
                                            Tanggal
                                        </th>
                                        <th scope="col">
                                            Jam
                                        </th>
                                        <th>Foto Absen</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">
                                            Nama perusahaan
                                        </th>
                                        <th scope="col">Alamat</th>

                                    </tr>
                                </thead>

                                <tbody class="list">
                                    <?php $no = 1;
                                    foreach ($akhir as $a) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <th scope="row" class="name">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm"><?= $a->tanggal ?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="budget">
                                                <?= $a->jam ?>
                                            </td>
                                            <td class="status">
                                                <a href="<?= base_url('assets/uploads/absensi/') . $a->foto; ?>" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe" data-lightbox="image-1" data-title="Bukti Absensi">
                                                    <img alt="Bukti Absensi" src="<?= base_url('assets/uploads/absensi/') . $a->foto; ?>">
                                                </a>
                                            </td>
                                            <td>
                                                <?= $a->siswa; ?>
                                            </td>
                                            <td>
                                                <?= $a->perusahaan; ?>
                                            </td>
                                            <td>
                                                <?= $a->alamat ?>
                                            </td>

                                        </tr>


                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    <?php } else { ?>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <?php
                                error_reporting(0);
                                ?>
                                <?php foreach ($akhir as $b) : ?>

                                <?php endforeach; ?>
                                <h3 class="mb-0">Absensi Siswa <b><?= @$b->jurusan ?></b></h3>
                            </div>
                            <div class="col text-right">
                                <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">
                                            No
                                        </th>
                                        <th scope="col">
                                            Nama Siswa
                                        </th>
                                        <th scope="col">
                                            Jurusan
                                        </th>
                                        <th>Kelas</th>
                                        <th scope="col">Nama Posisi</th>

                                        <th scope="col">Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="list">
                                    <?php $no = $offset;
                                    foreach ($manual as $a) : ?>
                                        <tr>
                                            <td><?= ++$no; ?></td>
                                            <th scope="row" class="name">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm"><?= $a->nama_siswa ?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="budget">
                                                <?= $a->jurusan ?>
                                            </td>
                                            <td>
                                                <?= $a->kelas ?>
                                            </td>
                                            <td>
                                                <?= $a->nama_perusahaan; ?>
                                            </td>
                                            <td>
                                                <?= $a->alamat; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $cek = $this->db->query("SELECT * FROM tb_absensi_manual WHERE id_siswa = '$a->id_siswa' ");

                                                if ($cek->num_rows() > 0) {
                                                ?>

                                                    <a href="<?= base_url('admin/cekManual/') . $a->nis; ?>" class="btn-sm btn-success">Cek Absensi</a>
                                                <?php } else { ?>
                                            
                                                <?php } ?>
                                                <a href="<?= base_url('admin/absenManual/') . $a->nis; ?>" class="btn-sm btn-info">Input Absensi</a>

                                            </td>

                                        </tr>


                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <?= $halaman; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>

</div>


<script>
    // $(document).ready(function() {
    //     $('#cari').click(function() {
    //         $('#ju').css('display', 'none');
    //     });
    // });
</script>