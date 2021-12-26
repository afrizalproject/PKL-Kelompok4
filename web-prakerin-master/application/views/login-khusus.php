<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login-admin.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css') ?>">
    <!-- JS -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.js') ?>"></script>
</head>

<body>
    <?php

    if ($this->session->flashdata('login_gagal') == TRUE) { ?>
    <script>
        Swal.fire({
            type: 'error',
            title: 'Login Gagal!',
            text: '<?php echo $this->session->flashdata('login_gagal'); ?>'
        });
    </script>
    <?php }

    ?>

    <div class="miring-satu">
        <div class="logo-smk">
            <!-- <img src="img/logo smk.png"> -->
        </div>
    </div>
    <form action="<?= base_url('login/cekSpesial') ?>" method="POST">
        <div class="kotak-login">
            <h1 class="judul-log">Silahkan Login!</h1>
            <input type="text" name="user" class="input" placeholder="Masukan username anda" autocomplete="off">
            <input type="text" name="pass" class="input" placeholder="Masukan password anda" autocomplete="off">
            <button type="submit" class="btn-login">Login</button>
        </div>
    </form>

    <div class="bola-satu"></div>
</body>

</html>