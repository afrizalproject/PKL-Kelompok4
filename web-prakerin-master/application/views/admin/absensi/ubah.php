<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/ubahManual') ?>" method="post">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Absensi </h5>

                </div>

                <div class="modal-body">
                    <?php foreach ($diri as $d) : ?>
                    <!-- Hidden data -->
                    <input type="hidden" value="<?= $d->id_siswa ?>" name="id">
                    <div class="row">
                        <div class="col-3">Nama</div>
                        <div class="col-2">:</div>
                        <div class="col-7 text-uppercase"><b><?= $d->nama_siswa;  ?></b></div>
                    </div>
                    <div class="row">
                        <div class="col-3">Nama Instansi</div>
                        <div class="col-2">:</div>
                        <div class="col-7 text-uppercase"><b><?= $d->nama_perusahaan;  ?></b></div>
                    </div>
                    <div class="row">
                        <div class="col-3">Alamat Instansi</div>
                        <div class="col-2">:</div>
                        <div class="col-7"><?= $d->alamat;  ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3">Kelas</div>
                        <div class="col-2">:</div>
                        <div class="col-7"><?= $d->kelas;  ?></div>
                    </div><br>

                    <hr>
                    <?php
                        $gut        = $_GET['bulan'];
                        $bulan      = $this->db->query("SELECT * FROM tb_absensi_manual WHERE id_siswa = '$d->id_siswa' AND bulan = '$gut' ")->row();
                        ?>
                    <input type="hidden" value="<?= $gut ?>" name="bulane">
                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                Bulan
                            </div>
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="bulan">
                                    <option value="<?= $bulan->bulan ?>">--(Terpilih)<?= $bulan->bulan ?>--</option>
                                    <option value="januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Masuk Pkl
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <select name="masuk">
                                <option value="<?= $bulan->masuk ?>">--(Terpilih)<?= $bulan->masuk ?>--</option>
                                <?php for ($i = 1; $i < 32; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            Ijin
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <select name="ijin">
                                <option value="<?= $bulan->ijin ?>">--(Terpilih)<?= $bulan->ijin ?>--</option>
                                <?php for ($i = 0; $i < 32; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-2">
                            Sakit
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <select name="sakit">
                                <option value="<?= $bulan->sakit ?>">--(Terpilih)<?= $bulan->sakit ?>--</option>
                                <?php for ($i = 0; $i < 32; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-2">Tahun</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <?php

                                $tahun = getdate();

                                ?>
                            <select name="tahun">
                                <option value="<?= $bulan->tahun ?>">--(Terpilih)<?= $bulan->tahun ?>--</option>
                                <option value="<?= $tahun['year'] ?>"><?= $tahun['year'] ?></option>
                            </select>
                        </div>
                    </div>

                </div>

                <?php endforeach; ?>


                <div class="modal-footer">
                    <a href="<?= base_url('admin/absensi') ?>" class="btn btn-secondary">Kembali</a>
                    <input type="submit" class="btn btn-info" value="Ubah">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#exampleModal").modal("show");
    });
</script>