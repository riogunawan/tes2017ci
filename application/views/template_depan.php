<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Berita | <?php echo @$MASTER['DATA']['TITLE'] ?> - <?php echo @$MASTER['DATA']['SUBTITLE'] ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Berita" />
        <meta name="keywords" content="berita" />
        <meta name="author" content="ThemeTheFlash" />

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
        <?php
            echo @$MASTER['CSS'];
        ?>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">

    </head>
    <body class="hold-transition skin-purple layout-top-nav">
        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-fixed-top">
                    <!-- MENU -->
                  <?= $this->load->view('menu_depan'); ?>
                </nav>
            </header>
              <!-- Full Width Column -->
            <div class="content-wrapper navigasi-batas">
                <div class="container">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <h1>
                      <?php echo @$MASTER['DATA']['SUBTITLE'] ?>
                      <small><?php echo @$MASTER['DATA']['detail'] ?></small>
                    </h1>
                    <ol class="breadcrumb">
                      <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active"><?php echo @$MASTER['DATA']['SUBTITLE'] ?></li>
                    </ol>
                  </section>

                  <!-- Main content -->
                  <section class="content">
                    <!-- TAMPILAN DINAMIS -->
                    <?php $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?>
                  </section>
                  <!-- /.content -->
                </div>
                <!-- /.container -->
            </div>
              <!-- /.content-wrapper -->
            <footer class="main-footer ">
                <div class="container">
                  <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.8
                  </div>
                  <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
                  reserved.
                </div>
                <!-- /.container -->
            </footer>

        </div>

        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
        <?php
            echo $MASTER['JS'];
        ?>
    </body>
</html>