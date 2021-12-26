<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Icons -->
  <link href="<?php echo base_url('assets/js/plugins/nucleo/css/nucleo.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/argon-dashboard.css?v=1.1.0') ?>" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/siswa.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/rekomendasi.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/notif.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/absensi.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>">
  <link href="<?php echo base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/css/chat.css') ?>">
  <link href="<?php echo base_url('assets/css/argon-dashboard.css?v=1.1.0') ?>" rel="stylesheet" />
  <!-- JS -->
  <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/sweetalert.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>


  <title>Halaman Siswa</title>
</head>

<body class="profile" style="background-color: #e9ecef;">
  <?php if ($this->session->flashdata('login_siswa') == TRUE) : ?>
    <script>
      Swal.fire({
        type: "success",
        title: "Login berhasil!",
        text: <?php echo $this->session->flashdata('login_siswa') ?>
      });
    </script>
  <?php endif; ?>