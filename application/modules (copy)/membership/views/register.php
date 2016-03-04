<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ExporaDev Team">
	<link rel="shortcut icon" href="images/favicon_1.ico">

	<title>Ikasa72 | Register</title>

	<link rel="shortcut icon" href="images/favicon_1.ico">

	<!--Core CSS -->	
	<?php
	echo load_css('css/bootstrap.min.css');
	echo load_css('css/core.css');
	echo load_css('css/icons.css');
	echo load_css('css/components.css');
	echo load_css('css/pages.css');
	echo load_css('css/menu.css');
	echo load_css('css/responsive.css');
	echo load_css('font-awesome/css/font-awesome.css');
	echo load_css('fontawesome-iconpicker/css/fontawesome-iconpicker.css');
	echo load_css('plugins/bs-select/select2.css');
	echo load_css('plugins/bs-select/select2-bootstrap.css');	
	?>	

</head>

<body>

	<div class="wrapper-page">
		<div class="panel panel-color panel-primary panel-pages">
			<div class="panel-heading bg-img">
				<div class="bg-overlay"></div>
				<h3 class="text-center m-t-10 text-white">Create a new Account</h3>
			</div>
			<form class="form-horizontal m-t-20" action="<?= base_url(''.getModule().'/register/submit') ?>" method="POST">

				<div class="panel-body">

					<?php if($this->session->userdata('success_register')){ ?>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="alert alert-info">								
								Data registrasi Anda akan di review oleh admin, pemberitahuan akan dikirim ke <b><?= $this->session->userdata('success_register') ?></b>
							</div>
						</div>
					</div>

					<?php }else{ ?>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control input-lg" type="text" name="usernameUser" required="" placeholder="Username" maxlength="10">
							<?php echo form_error('usernameUser'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control input-lg" type="text" name="nameUser" required="" placeholder="Nama Lengkap">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<input type="text" name="tempatLahir" placeholder="Tempat Lahir" class="form-control input-lg" required>
						</div>
						<div class="col-xs-6">
							<input type="text" name="tglLahir" placeholder="Tanggal Lahir" data-mask="99-99-9999" class="form-control input-lg" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<select title="" tabindex="-1" class="form-control search-select select2-offscreen" data-validation="" data-placeholder="Angkatan Ikasa72" name="angkatanUser" id="angkatanUser" style="color:black;width:100%">
								<option></option>
								<?= range_years('1986') ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<?php echo select_join('namaData','idData,namaData','master_data','idData','jurusan',array('statusData'=>'y','kodeCategory' => 'JR01'),'','','Pilih Jurusan') ?>
						</div>
						<div class="col-xs-6">
							<select id="kelas" class="form-control disabled search-select" disabled data-placeholder="Pilih Kelas">
								<option></option>
							</select>
							<select name='kelas' id='kelas2' class='search-select form-control' data-placeholder="Pilih Kelas" data-validation='required' style="display:none;">
								<option></option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control input-lg" type="text" name="phone" required="" onkeyup="number(this)" placeholder="Handphone">
							<?php echo form_error('phone'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control input-lg" type="email" name="emailUser" required="" placeholder="Email">
							<?php echo form_error('emailUser'); ?>
						</div>
					</div>


<!-- 					<div class="form-group">
						<div class="col-xs-12">
							<?php echo select_join('namaData','idData,namaData','master_data','idData','provinsi',array('statusData'=>'y','kodeCategory' => 'M01'),'','','Pilih Provinsi') ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<select id="kota" class="form-control disabled search-select" disabled data-placeholder="Pilih Kota">
								<option></option>
							</select>
							<select name='kota' id='kota2' class='search-select form-control' data-placeholder="Pilih Kota" data-validation='required' style="display:none;">
								<option></option>
							</select>
						</div>
					</div>
				-->
				<div class="form-group text-center m-t-40"><div class="col-xs-12"><button class="btn btn-primary btn-block waves-effect waves-light btn-lg w-lg" type="submit">REGISTER</button></div>

			</div>
			<div class="form-group m-t-30">
				<div class="col-sm-12 text-center">
					<a href="<?= base_url(''.getModule().'/login') ?>">Already have account?</a>
				</div>
			</div>

		</form>

		<?php } ?>

	</div>
</div>
</div>



</body>

<!--Core js-->
<?php
echo load_js('js/modernizr.min.js');
echo load_js('js/jquery.min.js');
echo load_js('js/bootstrap.min.js');
echo load_js('js/jquery.slimscroll.js');
echo load_js('js/jquery.blockUI.js');
echo load_js('js/waves.js');
echo load_js('js/wow.min.js');
echo load_js('js/jquery.nicescroll.js');
echo load_js('js/jquery.scrollTo.min.js');
echo load_js('js/jquery.app.js');
echo load_js('pages/jquery.dashboard.js');

echo load_js('plugins/bs-select/select2.js');
echo load_js('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js');
?>

<script type="text/javascript">
	$(".search-select").select2({
		placeholder : 'Pilih data...',
		minimumResultsForSearch: 10,
		allowClear: true,
		theme: "bootstrap"
	});

	$("#jurusan").change(function(){

		$.ajax({    
			type: "POST",
			url: "<?php echo base_url('membership/register/getOption/" + $(this).val() + "') ?>",             
			dataType: "html",             
			success: function(response){  
				$("#s2id_kelas").attr('select2-container-disabled',true).hide();				
				document.getElementById('s2id_kelas2').style.display = "block";
				$("#kelas2").html(response);				
				$(".search-select").select2({disable_search_threshold: 10,allow_single_deselect: true}); 				
			}
		});
	});

	$("#provinsi").change(function(){

		$.ajax({    
			type: "POST",
			url: "<?php echo base_url('membership/register/getOption/" + $(this).val() + "') ?>",             
			dataType: "html",             
			success: function(response){  
				$("#s2id_kota").attr('select2-container-disabled',true).hide();				
				document.getElementById('s2id_kota2').style.display = "block";
				$("#kota2").html(response);				
				$(".search-select").select2({disable_search_threshold: 10,allow_single_deselect: true}); 				
			}
		});
	});

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
</html>