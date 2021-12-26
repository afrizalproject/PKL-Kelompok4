<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/inputAbsensi') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Absensi Siswa</h5>

                </div>

                <div class="modal-body">
                    <?php foreach ($manu as $d) : ?>
                        <!-- Hidden data -->
                        <input type="hidden" value="<?= $d->id_siswa ?>" name="id">
                        <div class="row">
                            <div class="col">Nama</div>
                            <div class="col">:</div>
                            <div class="col"><?= $d->nama_siswa;  ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Nama Instansi</div>
                            <div class="col">:</div>
                            <div class="col text-uppercase"><?= $d->nama_perusahaan;  ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Alamat Instansi</div>
                            <div class="col">:</div>
                            <div class="col"><?= $d->alamat;  ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Kelas</div>
                            <div class="col">:</div>
                            <div class="col"><?= $d->kelas;  ?></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    Tahun
                                </div>
                            </div>
                            <div class="col-md-1">
                                :
                            </div>
                            <div class="col-md-3">
                                <select name="tahun">
                                    <?php
                                    $tahun = getdate();
                                    ?>
                                    <option value="<?= $tahun['year']; ?>"><?= $tahun['year']; ?></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    Bulan
                                </div>
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="bulan">
                                        <option value="">--Pilih Bulan--</option>
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
                            <div class="col-md-6">
                                <select name="sakit">
                                    <?php for ($i = 0; $i < 32; $i++) : ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>


                <div class="modal-footer">
                    <a href="<?= base_url('admin/absensi') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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