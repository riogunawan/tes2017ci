<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $base = 'http://localhost/tes2017ci/';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>404 Page not found</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= $base ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= $base ?>assets/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p><?php echo $message; ?></p>
          <p>
            Halaman Tidak Ditemukan.
            Kembali ke <a href="<?= $base ?>"> Home</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>

<script src="<?= $base ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?= $base ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>