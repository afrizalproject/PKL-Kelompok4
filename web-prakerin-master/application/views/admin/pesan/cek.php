<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg mt--1" role="document">
        <div class="modal-content">
            <?php

            $id     = $_GET['id'];
            $query  = $this->db->query("SELECT * FROM tb_siswa WHERE id_siswa = '$id' ")->row();

            ?>
            <div class="modal-header" style="border-bottom: 1px solid #bbb; width: 95%; margin: auto;">
                <div class="row">
                    <div class="col-3 mr-3">
                        <img src="<?= base_url('assets/uploads/profile-siswa/') . $query->foto ?>" width="50" height="50" class="rounded-circle ml--3">
                    </div>
                    <div class="col-7">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $query->nama_siswa; ?></h5>
                        <p class="mt-2"><?= $query->kelas ?></p>

                    </div>
                </div>
                <a href="<?= base_url('admin/chat') ?>" class="btn-sm btn-success float-right"><i class="ni ni-bold-left"></i> Kembali</a>

            </div>
            <form action="<?= base_url('admin/balesChat') ?>" method="POST">
                <div class="bungkus">
                    <?php
                    foreach ($cek as $c) :
                        ?>
                    <!-- Data Hidden -->
                    <input type="hidden" value="<?= $c->id_siswa; ?>" name="id">
                    <input type="hidden" value="siswa" name="kepada">
                    <div class="modal-body">
                        <?php if ($c->kepada === "admin") { ?>
                        <div class="row mt--2 mb--9">
                            <div class="col">
                                <p class="pesan-siswa"><?= $c->pesan; ?></p>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="row mt--2 mb--9">
                            <div class="col">
                                <p class="pesan-admin"><?= $c->pesan; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <?php endforeach; ?>
                </div>

                <div class="row mt-4 ml-2">
                    <div class="col-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="pesan" placeholder="Masukan pesan anda" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-info"><i class="ni ni-send"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#exampleModal').modal('show');
    });
</script>