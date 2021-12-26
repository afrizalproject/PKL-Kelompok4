<?php


?>
<div style="overflow-x: hidden;">
    <div class="bubble"></div>
    <div class="bubble2"></div>
    <div class="bubble3"></div>
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
            <h3 class="text-left mt--7 mr-3 text-uppercase" style="color: #f56e61; border-bottom: 2px solid #f56e61; font-family: 'exo' "><strong>Notifikasi</strong></h3>
        </div>
    </div>

    <?php
    $sos    = $this->session->userdata('user');
    $cekA   = $this->db->query("SELECT * FROM tb_siswa WHERE user = '$sos' ");
    $paluA  = $cekA->row();
    $idb    = $paluA->id_siswa;
    $kue    = $this->db->query("SELECT * FROM tb_notif WHERE id_siswa = '$idb' ");
    $paluB  = $kue->row();

    if ($kue->num_rows() > 0) {

        ?>
    <div class="row mt--2">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="alert alert-default" role="alert" id="nof">
                <div class="col-12">
                    <strong>Hallo, <span class="tag"><?= $this->session->userdata('user') ?>!</span></strong> <?= $paluB->pesan ?>
                </div>
                <?php
                    if ($paluB->pesan = 'kamu memiliki pesan baru') {
                        ?>
                <div class="col-2 mt-1">
                    <a href="<?= base_url('siswa/pesanAdmin/') . $idb ?>" class="btn-sm btn-info">Cek</a>
                </div>
                <?php } else { ?>
                <a href="<?php echo base_url('siswa/oke/') . $paluB->id_siswa; ?>" class="btn-sm btn-info ">Oke</a>
                <?php } ?>

            </div>
        </div>
    </div>
    <?php  } else { ?>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="alert alert-default" role="alert" id="nof">
                Hallo, <span class="tag"><?= $this->session->userdata('user') ?>!</span> Saat ini belum ada pemberitahuan buat kamu hehe
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="fixed-bottom">

        <div class="bubble4"></div>
        <div class="bubble5"></div>
        <div class="bubble6"></div>


    </div>

</div>