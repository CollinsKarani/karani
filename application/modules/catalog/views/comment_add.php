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
								<input type="hidden" name="idCComment" class="form-control" value="<?php echo ($getComment) ? $getComment[0]['idCComment'] : "" ?>">
								<?php echo select_join_group('namaCatalog','idCatalog,namaCatalog','catalog','idCatalog','idCatalog','Nama Produk','',(@$getComment[0]['idCatalog']) ? @$getComment[0]['idCatalog'] : set_value('idCatalog'),'required','Pilih Data') ?>
								<?php echo input_textarea_group('isiCComment','Komentar',(@$getComment[0]['isiCComment']) ? @$getComment[0]['isiCComment'] : set_value('isiCComment'),'Komentar','required') ?>								
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