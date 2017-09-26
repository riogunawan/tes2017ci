<div class="container">
  <div class="navbar-header">
    <a href="<?= site_url('') ?>" class="navbar-brand"><b>Berita</b>RIO</a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
      <i class="fa fa-bars"></i>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="mn-berita"><a href="<?= site_url('depan_home/berita') ?>">Berita <span class="sr-only">(current)</span></a></li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <?php if ($this->session->userdata('masuk') == 'Sudah Login' ): ?>
        <!-- User Account Menu -->
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
            <li class="user-header">
              <img src="<?= base_url() ?>assets/uploads/<?= $this->session->userdata('foto_user'); ?>" class="img-circle" width="160" height="160" alt="Tidak Ada Foto">

              <p>
                <?= $this->session->userdata('nama_user'); ?> - <?= $this->session->userdata('level_user'); ?>
                <small>Anggota sejak <?php $dibuat = $this->session->userdata('created_user'); ?><?= tgl_indo(substr($dibuat, 0, 8)) ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= site_url('adm_home') ?>" class="btn btn-default btn-flat">Halaman Admin</a>
              </div>
              <div class="pull-right">
                <a href="<?= site_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="<?= site_url('login') ?>"><i class="fa fa-sign-in"></i>&nbsp;Login</a></li>
      <?php endif ?>

    </ul>
  </div>
  <!-- /.navbar-custom-menu -->
</div>