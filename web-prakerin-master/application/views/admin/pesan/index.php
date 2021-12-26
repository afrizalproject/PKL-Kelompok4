<div class="main-content">
    <div class="row">
        <div class="col-11 ml-3">
            <h1 class="ml-3 mt-3 mb--3">Chat!</h1>
            <hr>
            <div class="row">
                <?php foreach ($chat_siswa as $c) : ?>
                <?php
                    $ambil = $this->db->query("SELECT * FROM tb_siswa WHERE id_siswa = '$c->id_siswa' ")->row();
                    $beda  = $this->db->query("SELECT DISTINCT nama_siswa FROM tb_siswa ")->row();
                    $query = $this->db->query("SELECT * FROM tb_chat INNER JOIN tb_siswa ON tb_chat.id_siswa = tb_siswa.id_siswa ")->row();
                    ?>
                <div class="col-6">
                    <div class="kotak-chat">
                        <div class="row">
                            <div class="col-2">
                                <img src="<?= base_url('assets/uploads/profile-siswa/') . $ambil->foto ?>" width="60" height="60" class="rounded-circle mt-2 ml-2" id="foto-chat">
                            </div>
                            <div class="col-10">
                                <p class="mb-0 text-uppercase"><b><?= $ambil->nama_siswa; ?></b></p>
                                <?php
                                    $baris = $this->db->query("SELECT * FROM tb_ngungsi WHERE id_siswa = '$c->id_siswa' ");
                                    if ($baris->num_rows() > 0) { ?>
                                <p>Anda memiliki <b><?= $baris->num_rows() ?></b> Pesan Baru </p>
                                <?php } else { ?>
                                <p>Sementara Belum ada pesan terbaru</p>
                                <?php } ?>

                                <p class="mt--4 mr-2 float-right">
                                    <a href="<?= base_url('admin/cekPesan/') . $c->id_siswa . '?id=' . $c->id_siswa ?>" class="btn-sm btn-info">Cek</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
        <!-- Chat -->
        <div class="col-6"></div>
    </div>

</div>