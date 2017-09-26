<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel Berita | <?php echo @$MASTER['DATA']['TITLE'] ?> - <?php echo @$MASTER['DATA']['SUBTITLE'] ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Berita" />
        <meta name="keywords" content="berita" />
        <meta name="author" content="ThemeTheFlash" />

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
        <?php
            echo @$MASTER['CSS'];
        ?>

    </head>
    <body class="hold-transition skin-blue login-page bg-black">
        <!-- TEMPAT HALAMAN -->
        <?= $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?>

        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <?php
            echo $MASTER['JS'];
        ?>
    </body>
</html>