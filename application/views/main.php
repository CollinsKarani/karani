<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ExporaDev Team">
	<link rel="shortcut icon" href="images/favicon_1.ico">

	<title>Ikasa72 Management System</title>

	<!--Core CSS -->		
	<?php

	
	$multiple_css = array(
		'css/bootstrap.min.css', 
		'css/core.css',
		'css/icons.css',
		'css/components.css',
		'css/pages.css',
		'css/menu.css',
		'css/responsive.css',
		'plugins/sweetalert/dist/sweetalert.css'
		);
	echo load_css($multiple_css); 

	echo load_css('css/custom.css');
	echo load_css('plugins/datatables/jquery.dataTables.min.css');
	echo load_css('font-awesome/css/font-awesome.css');
	echo load_css('fontawesome-iconpicker/css/fontawesome-iconpicker.css');
	echo load_js('js/modernizr.min.js');

	echo load_css('plugins/bs-select/select2.css');
	echo load_css('plugins/bs-select/select2.bootstrap.css');
	echo load_css('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css');
	echo load_css('plugins/modal-effect/css/component.css');
	if (isset($other_css)) {
		echo load_css($other_css); 
	}

	?>

</head>

<body class="fixed-left">
	
	<div id="wrapper"><!-- Top Bar Start -->		

		<?= $this->load->view('header','',TRUE) ?>

		<?= $this->load->view('sidebar','',TRUE) ?>
		<div class="content-page">
			<div class="content">				

				<?php echo $this->load->view($content,'',TRUE) ?>

			</div>
		</div>
		
	</div>


	<!--Core js-->
	<?php

	echo load_js('js/jquery.min.js');
	echo load_js('js/jquery.ajax-cross-origin.min.js');
	echo load_js('js/bootstrap.min.js');
	echo load_js('js/fastclick.js');
	echo load_js('js/detect.js');
	echo load_js('js/jquery.slimscroll.js');
	echo load_js('js/jquery.blockUI.js');
	echo load_js('js/waves.js');
	echo load_js('js/wow.min.js');
	echo load_js('js/jquery.nicescroll.js');
	echo load_js('js/jquery.scrollTo.min.js');
	echo load_js('js/jquery.app.js') ;
	echo load_js('pages/jquery.dashboard.js');
	echo load_js('plugins/datatables/jquery.dataTables.min.js');
	echo load_js('plugins/datatables/dataTables.bootstrap.js');

	echo load_js('plugins/bs-select/select2.js');
	
	echo load_js('js/custom.js');

	echo load_js('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js');
	echo load_js('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js');
	
	echo load_js('plugins/modal-effect/js/classie.js');
	echo load_js('plugins/modal-effect/js/modalEffects.js');
	echo load_js('fontawesome-iconpicker/js/fontawesome-iconpicker.js');
	echo load_js('plugins/sweetalert/dist/sweetalert.min.js');
	echo load_js('plugins/sweetalert/dist/sweet-alert.init.js');
	echo load_js('plugins/mixitup-master/src/jquery.mixitup.js');
	if (isset($other_js)) {
		echo load_js($other_js); 
	}

	?>

	<footer class="footer" style="text-align:right !important;">2016 © ExporaDev Team</footer>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>

</body>
</html>
