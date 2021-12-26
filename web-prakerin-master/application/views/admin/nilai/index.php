<?php

if ($this->session->flashdata('input_nilai') == TRUE) { ?>
    <script>
        Swal.fire({
            type: "success",
            title: "Sukses!",
            text: "<?= $this->session->flashdata('input_nilai') ?>"
        });
    </script>
<?php $url = $_SERVER['REQUEST_URI'];
    header("Refresh: 1; URL=$url");
} ?>

<?php if ($this->session->flashdata('ubah_nilai') == TRUE) { ?>
    <script>
        Swal.fire({
            type: "success",
            title: "Sukses!",
            text: "<?= $this->session->flashdata('ubah_nilai') ?>"
        });
    </script>
<?php $url = $_SERVER['REQUEST_URI'];
    header("Refresh: 1; URL=$url");
} ?>

<div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-light bg-gradient-info" id="navbar-main">
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
                                    <span class="mb-0 text-white  text-sm  font-weight-bold">Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b></span>
                                <?php } else { ?>
                                    <span class="mb-0 text-white text-sm  font-weight-bold">*Selamat Datang, <b><?php echo $this->session->userdata('nama') ?></b></span>
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

    <div class="row">
        <div class="col-md-4">
            <h1 class="pt-7 ml-3" style="border-bottom: 2px solid #0fb6ef; color: #0fb6ef; text-transform: uppercase;">Nilai Mahasiswa</h1>
        </div>
    </div>
    <form action="<?= base_url('admin/nilaiSiswa') ?>" method="post">
        <div class="row">

            <div class="col-md-6 ml-4">

                <div class="form-group">
                    <div class="input-group input-group-alternative mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                        <input class="form-control form-control-alternative" placeholder="Cari nama mahasiswa yang belum di nilai" type="text" name="key" required>
                    </div>
                </div>

            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary" name="cari">Cari</button>
            </div>


        </div>
    </form>
    <?php

    if (isset($_POST['cari'])) {

    ?>
        <!-- Table -->
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
                                <h3 class="mb-0">Cari </h3>
                            </div>
                            <div class="col text-right">
                                <!-- <a href="<?= base_url('admin/tambahGuru') ?>" class="btn btn-sm btn-info">Tambah</a> -->
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
                                            Nama 
                                        </th>
                                        <th scope="col">
                                            Nama jurusan
                                        </th>
                                        <th scope="col">
                                            Alamat
                                        </th>
                                        <th scope="col">
                                            Kelas
                                        </th>

                                        <th scope="col">
                                            Aksi
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="list">
                                    <?php $no = $offset;
                                    foreach ($nilai as $a) : ?>
                                        <tr>
                                            <td><?= ++$no; ?></td>
                                            <th scope="row" class="name">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm"><?= $a->nama_siswa ?></span>
                                                    </div>
                                                </div>
                                            </th>


                                            <td>
                                                <?= $a->nama_perusahaan; ?>
                                            </td>
                                            <td>
                                                <?= $a->alamat; ?>
                                            </td>
                                            <td>
                                                <?= $a->kelas; ?>
                                            </td>

                                            <td>
                                                <?php
                                                $nilai = $this->db->query("SELECT * FROM tb_nilai WHERE id_siswa = '$a->id_siswa' ");

                                                if ($nilai->num_rows() > 0) {
                                                ?>
                                                    <button class="btn-sm btn-danger">Sudah di Nilai</button>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('admin/inputNilai/') . $a->nis ?>" class="btn-sm btn-success">Input Nilai</a>
                                                <?php } ?>
                                            </td>
                                        </tr>


                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
                <div class="card-footer">

                </div>

            </div>
        </div>
    <?php } else { ?>
        <!-- Table -->
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
                                <h3 class="mb-0">Siswa Sudah di Nilai</h3>
                            </div>
                            <div class="col text-right">
                                <!-- <a href="<?= base_url('admin/tambahGuru') ?>" class="btn btn-sm btn-info">Tambah</a> -->
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
                                            Nama Instansi
                                        </th>
                                        <th scope="col">
                                            Kelas
                                        </th>
                                        <th scope="col">
                                            Nilai Kerajinan
                                        </th>
                                        <th scope="col">
                                            Nilai Prestasi Kerja
                                        </th>
                                        <th scope="col">
                                            Nilai Disiplin
                                        </th>
                                        <th scope="col">
                                            Nilai Kerjasama
                                        </th>
                                        <th scope="col">
                                            Nilai Inisiatif
                                        </th>
                                        <th scope="col">
                                            Nilai Tanggung Jawab
                                        </th>
                                        <th scope="col">
                                            Nilai Ujian Prakerin
                                        </th>

                                        <th scope="col">
                                            Aksi
                                        </th>

                                    </tr>
                                </thead>
                                <?php if (empty($terpilih)) : ?>
                                    <div class="alert alert-danger" role="alert" style="width: 165px; height: 40px; text-align:center; padding: 7px; margin-left: 25px;">
                                        Data Kosong
                                    </div>
                                <?php endif; ?>
                                <tbody class="list">
                                    <?php $no = $offset;
                                    foreach ($terpilih as $a) : ?>
                                        <tr>
                                            <td><?= ++$no; ?></td>
                                            <th scope="row" class="name">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm"><?= $a->nama_siswa ?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <?= $a->nama_perusahaan; ?>
                                            </td>
                                            <td>
                                                <?= $a->kelas; ?>
                                            </td>
                                            <td>
                                                <?= $a->kerajinan; ?>
                                            </td>
                                            <td>
                                                <?= $a->prestasi; ?>
                                            </td>
                                            <td>
                                                <?= $a->disiplin; ?>
                                            </td>
                                            <td>
                                                <?= $a->kerjasama; ?>
                                            </td>
                                            <td>
                                                <?= $a->inisiatif; ?>
                                            </td>
                                            <td>
                                                <?= $a->tanggung_jawab; ?>
                                            </td>
                                            <td>
                                                <?= $a->ujian_prakerin; ?>
                                            </td>

                                            <td>
                                                <a href="<?= base_url('admin/editNilai/') . $a->id_nilai ?>" class="btn-sm btn-success">Edit Nilai</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="border-bottom: 2px solid #0fb6ef; text-transform: uppercase; color: #0fb6ef;">Note</h4>
                                </div>
                            </div>
                            <div class="row ml-2 ">
                                <p><b>Disiplin</b> Meliputi Presensi & Tata Tertib </p>
                            </div>
                            <div class="row ml-2 mt--3">
                                <p><b>Kerajinan</b> Meliputi ketelitian & kebersihan</p>
                            </div>
                            <div class="row ml-2 mt--3">
                                <p><b>Prestasi Kerja</b> Meliputi keterampilan, Kecepatan & Ketepatan Kerja </p>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>

                    </div>
                    <?= $halaman; ?>
                </div>
            </div>
        <?php } ?>

        </div>