<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form action="<?= base_url('admin/tambahNilai') ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Nilai Siswa</h5>

            </div>
            
                <div class="modal-body">
                    <?php foreach ($data as $d) : ?>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Kerajinan (Ketelitian & kebersihan) " name="kera" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Prestasi Kerja (Keterampilan, Kecepatan & Ketepatan Kerja) " name="prestasi" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Disiplin (Presensi & Tata Tertib) " name="disiplin" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Kerjasama " name="kerjasama" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Inisiatif " name="inisiatif" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Tanggung Jawab " name="tanggung" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nilai Ujian Prakerin " name="ujian" required>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            
            <div class="modal-footer">
                <a href="<?= base_url('admin/nilaiSiswa') ?>" class="btn btn-secondary">Kembali</a>
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