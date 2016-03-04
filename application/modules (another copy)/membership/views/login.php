<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ExporaDev Team">
  <link rel="shortcut icon" href="images/favicon_1.ico">

  <title>Ikasa72 | Login</title>

  <link rel="shortcut icon" href="images/favicon_1.ico">

  <!--Core CSS -->  
  <?php echo load_css('css/bootstrap.min.css') ?>
  <?php echo load_css('css/core.css') ?>
  <?php echo load_css('css/icons.css') ?>
  <?php echo load_css('css/components.css') ?>
  <?php echo load_css('css/pages.css') ?>
  <?php echo load_css('css/menu.css') ?>
  <?php echo load_css('css/responsive.css') ?>
  <?php echo load_css('font-awesome/css/font-awesome.css') ?>
  <?php echo load_css('fontawesome-iconpicker/css/fontawesome-iconpicker.css') ?>

</head>

<body>

  <div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
      <div class="panel-heading bg-img">
        <div class="bg-overlay"></div>
        <h3 class="text-center m-t-10 text-white">Sign In to <strong>Ikasa72</strong></h3>
      </div>
      <form class="form-horizontal m-t-20" action="<?= base_url(''.getModule().'/login/authenticate') ?>" method="POST">

        <div class="panel-body">

          <?php if($this->session->userdata('error_msg')){ ?>

          <div class="form-group">
            <div class="col-xs-12">
              <div class="alert alert-danger">                
                <?= $this->session->userdata('error_msg') ?>
              </div>
            </div>
          </div>

          <?php } ?>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control input-lg" name="uphone" type="text" required="" value="<?= $this->session->userdata('temp_uphone') ?>"  placeholder="Username/Handphone">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control input-lg" type="password" name="password" required="" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" name="remember_me" type="checkbox">
                <label for="checkbox-signup">Remember me</label>
              </div>
            </div>
          </div>
          <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
              <button class="btn btn-primary btn-block btn-lg w-lg waves-effect waves-light" type="submit">LOGIN</button>
            </div>
          </div>
          <div class="form-group m-t-30">
            <div class="col-sm-7">
              <a href="<?= base_url(getModule().'/forgot') ?>"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
            </div>
            <div class="col-sm-5 text-right">
              <a href="<?= base_url(''.getModule().'/register') ?>">Create an account</a>
            </div>
          </div>

        </form>

      </div>

<!--       <div class="panel-footer">
        <p class="text-right" style="margin:0;font-size:12px;color:#767676;">Develop By ExporaDev Team</p>
      </div> -->

    </div>
  </div>


</body>

<!--Core js-->
<?php echo load_js('js/modernizr.min.js') ?>
<?php echo load_js('js/jquery.min.js') ?>
<?php echo load_js('js/bootstrap.min.js') ?>
<?php echo load_js('js/jquery.slimscroll.js') ?>
<?php echo load_js('js/jquery.blockUI.js') ?>
<?php echo load_js('js/waves.js') ?>
<?php echo load_js('js/wow.min.js') ?>
<?php echo load_js('js/jquery.nicescroll.js') ?>
<?php echo load_js('js/jquery.scrollTo.min.js') ?>
<?php echo load_js('js/jquery.app.js') ?>
<?php echo load_js('pages/jquery.dashboard.js') ?>

</html>