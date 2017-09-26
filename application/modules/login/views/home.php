<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?= site_url('') ?>"><b>Berita</b>RIO</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body bg-navy">
    <p class="login-box-msg"><?php echo @$MASTER['DATA']['SUBTITLE'] ?></p>

    <?= form_open('login/masuk'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Masukan Username..." name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Masukan Password..." name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Log-In</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>