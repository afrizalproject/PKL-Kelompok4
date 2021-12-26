<div style="overflow-x: hidden;">
    <nav class="navbar fixed-top navbar-light bg-light" style="box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
">
        <div class="row">
            <div class="col-1">
                <a class="navbar-brand" href="<?= base_url('siswa/pesan') ?>" style="color: #f56e61;"><i class="ni ni-bold-left mt-2"></i></a>
            </div>
            <div class="col-3">
                <img src="<?= base_url('assets/img/man.png') ?>" class="img-rounded" width="50" height="50">
            </div>
            <div class="col-6">
                <h4 class="judul-admin mr--4" style="padding-top: 6.5%;">Admin</h4>
            </div>
            <div class="col-1 pt-2">
                <a href="" class="ml-5" data-toggle="modal" data-target="#modal-notification"><i class="fas fa-ellipsis-v mt-1" id="icon-love"></i></a>
            </div>
        </div>

    </nav>

    <?php



    ?>
    <div class="isi-chat mt-7 pb-6">
        <?php foreach ($pesan_admin as $pa) : ?>
        <?php
            $sis    = $this->session->userdata('user');
            $cekTab = $this->db->query("SELECT * FROM tb_siswa WHERE user = '$sis' ");
            $pecah  = $cekTab->row();
            $id     = $pecah->id_siswa;
            $admin  = $this->db->query("SELECT * FROM tb_chat WHERE kepada = 'admin' AND id_siswa = '$id' ");
            $siswa  = $this->db->query("SELECT * FROM tb_chat WHERE kepada = 'siswa' AND id_siswa = '$id' ")->result();

            ?>

        <?php if ($pa->kepada === 'admin') { ?>
        <div class="row">
            <div class="col">
                <p class="pesan-siswa"><?= $pa->pesan; ?></p>
            </div>
        </div>
        <?php } else { ?>
        <div class="row">
            <div class="col">
                <p class="pesan-admin"><?= $pa->pesan; ?></p>
            </div>
        </div>
        <?php } ?>



        <?php endforeach; ?>

    </div>
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">You should read this!</h4>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white">Ok, Got it</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="fixed-bottom pt-3">
        <form action="<?= base_url('siswa/kepadaAdmin') ?>" method="POST">
            <!-- Hidden data -->
            <?php
            $siswa      = $this->session->userdata('user');
            $idSiswa    = $this->db->query("SELECT * FROM tb_siswa WHERE user = '$siswa' ");
            $pecah      = $idSiswa->row();
            ?>
            <input type="hidden" value="<?= $pecah->id_siswa; ?>" name="siswa">
            <input type="hidden" value="admin" name="kepada">
            <div class="row">
                <div class="col-10 pt-2">
                    <input type="text" name="chat" placeholder="Ketikan pesan ..." class="pl-4 ml-2" id="input-chat" autocomplete="off" required>
                </div>
                <div class="col-2 pt-1 mb--2" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                    <button type="submit" id="btn-kirim" class="ml--3"><i class="ni ni-send pt-1"></i></button>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#input-chat').click(function() {
            $('#input-chat').css('outline', 'none');
        });
        $('#icon-love').click(function() {

        });
    });
</script>