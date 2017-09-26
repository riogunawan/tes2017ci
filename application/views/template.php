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
  	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

		  	<header class="main-header bg-black">
				<a href="<?= site_url('') ?>" class="logo bg-black">
					<span class="logo-mini"><b>R</b>IO</span>
					<span class="logo-lg"><b>Berita</b>RIO</span>
				</a>
				<nav class="navbar navbar-static-top bg-navy">
				  	<a href="#" class="sidebar-toggle bg-navy" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
				  	</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
					          <!-- Menu Toggle Button -->
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					            <!-- The user image in the navbar-->
					            <img src="<?= base_url() ?>assets/uploads/<?= $this->session->userdata('foto_user'); ?>" class="user-image" alt="Tidak Ada Foto">
					            <!-- hidden-xs hides the username on small devices so only the image appears. -->
					            <span class="hidden-xs"><?= $this->session->userdata('nama_user'); ?></span>
					          </a>
					          <ul class="dropdown-menu">
					            <!-- The user image in the menu -->
					            <li class="user-header bg-navy">
					              <img src="<?= base_url() ?>assets/uploads/<?= $this->session->userdata('foto_user'); ?>" class="img-circle" width="160" height="160" alt="Tidak Ada Foto">

					              <p>
					                <?= $this->session->userdata('nama_user'); ?> - <?= $this->session->userdata('level_user'); ?>
					                <small>Anggota sejak <?php $dibuat = $this->session->userdata('created_user'); ?><?= tgl_indo(substr($dibuat, 0, 8)) ?></small>
					              </p>
					                <a href="<?= site_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
					            </li>
					          </ul>
					        </li>
			  			</ul>
					</div>
				</nav>
			</header>

			<?php $this->load->view('menu'); ?>

			<div class="content-wrapper">

				<section class="content-header">
					<h1>
						<?php echo @$MASTER['DATA']['TITLE'] ?>
						<small><?php echo @$MASTER['DATA']['SUBTITLE'] ?></small>
					</h1>
					<ol class="breadcrumb">
					  	<li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  	<li class="active"><?php echo @$MASTER['DATA']['SUBTITLE'] ?></li>
					</ol>
				</section>

				<section class="content"> <?php $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?> </section>

			</div>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.3.5
				</div>
				<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
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