<div class="container">
	<?= getBread() ?>	

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Modul</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
								<input type="hidden" name="idCategory" class="form-control" value="<?php echo ($getCategory) ? $getCategory[0]['idCategory'] : "" ?>">
								<?php echo select_join_group('namaCategory','idCategory,namaCategory,kodeInduk','catalog_category','idCategory','kodeInduk','Kode Induk',array('kodeInduk'=>0,'idCategory !=' => @$getCategory[0]['idCategory']),(@$getCategory[0]['kodeInduk']) ? @$getCategory[0]['kodeInduk'] : set_value('kodeInduk'),'','Pilih Data') ?>
								<?php echo input_text_group('namaCategory','Nama',(@$getCategory[0]['namaCategory']) ? @$getCategory[0]['namaCategory'] : set_value('namaCategory'),'Nama Kategori','required') ?>								
								<?php echo input_textarea_group('ketCategory','Keterangan',(@$getCategory[0]['ketCategory']) ? @$getCategory[0]['ketCategory'] : set_value('ketCategory'),'Keterangan Kategori','required') ?>								
								<?php echo input_text_group('orderCategory','Order',(@$getCategory[0]['orderCategory']) ? @$getCategory[0]['orderCategory'] : set_value('orderCategory'),'0','required') ?>								
								<?php echo input_radio_group('statusCategory','Status',array('1'=>'Aktif','2'=>'Tidak Aktif'),(@$getCategory[0]['statusCategory']) ? @$getCategory[0]['statusCategory'] : set_value('statusCategory'),'required') ?>
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
										&nbsp;
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>