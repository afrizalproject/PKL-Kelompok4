<div>
    <h3 class="judul-chat">Mulai Chat!</h3>

    <div class="card-chat">
        <div class="row">
            <div class="col-8">
                <h5 class="text-left text-white" id="judul-berkas">Admin</h5>
            </div>
            <div class="col-4 mt-3">
                <?php
                $session    = $this->session->userdata('user');
                $select     = $this->db->query("SELECT * FROM tb_siswa WHERE user = '$session' ");
                $pecah      = $select->row();
                $id         = $pecah->id_siswa;
                ?>
                <a href="<?= base_url('siswa/pesanAdmin/') . $id  ?>" class="btn-down"><i class="ni ni-bold-right"></i></a>
            </div>
        </div>
    </div>


</div>

<!-- Jquery Script -->
<script>
    $(document).ready(function() {
        $(window).load(function() {
            $(".card-berkas").animate({
                left: '250px'
            });
        });
    });
</script>