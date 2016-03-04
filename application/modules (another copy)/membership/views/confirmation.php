<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ExporaDev Team">
  <link rel="shortcut icon" href="images/favicon_1.ico">

  <title>Ikasa72 | Confirmation</title>

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
        <h3 class="text-center m-t-10 text-white">Membership Confirmation</h3>
      </div>
      <form action="<?= base_url(''.getModule().'/'.getController().'/submit') ?>" method="POST">

        <div class="panel-body">

          <div class="alert alert-info">
            Masukkan <b>4 digit</b> Kode Aktivasi pendaftaran anda
          </div>

          <div class="form-group m-b-0">
            <div class="input-group">
            <input class="form-control input-lg" name="kodeAct" type="text" required="" value="<?= $this->session->userdata('temp_kodeAct') ?>"  placeholder="Kode Aktivasi" maxlength="4">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">Submit</button>
              </span>                 
            </div>
            <?php echo $this->session->userdata('error_not_found') ? "<p class=\"text-danger\">".$this->session->userdata('error_not_found')."</p>" : ""; ?>
          </div>

        </form>

      </div>

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