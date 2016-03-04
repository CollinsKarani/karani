<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ExporaDev Team">
  <link rel="shortcut icon" href="images/favicon_1.ico">

  <title>Ikasa72 | Forgot Password</title>

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
        <h3 class="text-center m-t-10 text-white">Forgot Password</h3>
      </div>

      <?php if($this->session->userdata('code_send')){ ?>


      <form action="<?= base_url(''.getModule().'/'.getController().'/submit/code') ?>" method="POST">

        <div class="panel-body">

          <div class="alert alert-info">
            Kode Reset Password telah dikirim ke <?= $this->session->userdata('code_send') ?>
          </div>

          <div class="form-group m-b-0">
            <div class="input-group">
              <input class="form-control input-lg" name="codeForgot" type="text" required="" value="<?= $this->session->userdata('temp_codeForgot') ?>"  placeholder="4-digit Kode Reset Password " maxlength="4">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">Submit</button>
              </span>              
            </div>
            <?php echo $this->session->userdata('not_code') ? "<p class=\"text-danger\">".$this->session->userdata('not_code')."</p>" : ""; ?>
          </div>


        </form>

        <?php }else{ ?>

        <form action="<?= base_url(''.getModule().'/'.getController().'/submit/hp') ?>" method="POST">

          <div class="panel-body">

            <div class="alert alert-info">
              Kode Reset Password akan dikirim ke no HP anda.
            </div>

            <div class="form-group m-b-0">
              <div class="input-group">
                <input class="form-control input-lg" name="phone" type="text" required="" value="<?= $this->session->userdata('temp_phone') ?>"  placeholder="Masukkan no handphone anda.." onkeyup="number(this)">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">Reset</button>
                </span>
              </div>
              <?php echo $this->session->userdata('error_not_found') ? "<p class=\"text-danger\">".$this->session->userdata('error_not_found')."</p>" : ""; ?>
            </div>

          </form>

          <?php } ?>

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

  <script type="text/javascript">
    function number(objek) {
      a = objek.value;
      b = a.replace(/[^\d]/g,"");
      c = "";
      panjang = b.length;
      j = 0;
      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
      objek.value = c;
    }
  </script>