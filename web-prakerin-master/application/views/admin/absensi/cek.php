<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/inputAbsensi') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Absensi Siswa</h5>

                </div>

                <div class="modal-body">
                    <?php foreach ($cek as $d) : ?>
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
                    <?php endforeach; ?>
                    <hr>
                    <?php foreach ($absen as $ab) : ?>
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
                            <?= $ab->tahun; ?>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                Bulan
                            </div>
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3 text-uppercase">
                            <b><?= $ab->bulan; ?></b>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Masuk Pkl
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <?= $ab->masuk; ?>
                        </div>
                        <div class="col-md-2">
                            Ijin
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <?= $ab->ijin; ?>
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <div class="col-md-2">
                            Sakit
                        </div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-3">
                            <?= $ab->sakit; ?>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/editManual/') . $ab->id_siswa . '?bulan=' . $ab->bulan ?>" class="btn-sm btn-warning">Ubah data absensi</a>
                        </div>
                    </div>
                    <hr>

                    <?php endforeach; ?>
                </div>




                <div class="modal-footer">
                    <a href="<?= base_url('admin/absensi') ?>" class="btn btn-secondary">Kembali</a>
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