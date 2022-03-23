<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin APP| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/css/adminlte.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/plugins/toastr/toastr.min.css">
  <script>
      var base_url = "<?php echo base_url()?>";
  </script>
</head>
<body class="hold-transition login-page">
    <button type="button" class="btn btn-danger swalDefaultError" style="display:none ">aa</button>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url()?>" class="h1"><b>Admin</b>APP</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      
      <?php  if(session()->getFlashdata('msg')):?>
                <div class="alert alert-info">
                   <?= session()->getFlashdata('msg') ?> <?php if(get_cookie("loginId")) { echo get_cookie("loginId"); } ?>
                </div> 
            <?php endif;?>

      <form action="#" method="post" id="login_form">
        <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span> 
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php if(get_cookie("loginPass")) { echo get_cookie("loginPass"); } ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember" value="1" <?php if(get_cookie("loginId")) { ?> checked="checked" <?php } ?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo base_url()?>">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url()?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/public/js/adminlte.min.js"></script>
<!-- jQuery Validation JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>/public/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url()?>/public/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url()?>/public/js/custom.js"></script>
</body>
</html>