<div class="container">
	<?= getBread() ?>	

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Template</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
								<input type="hidden" name="idMTemplate" class="form-control" value="<?php echo (@$getMTemplate[0]['idMTemplate']) ? @$getMTemplate[0]['idMTemplate'] : "" ?>">
								<?php echo input_text_group('nameMTemplate','Nama',(@$getMTemplate[0]['nameMTemplate']) ? @$getMTemplate[0]['nameMTemplate'] : set_value('nameMTemplate'),'Tipe Template','required') ?>
								<?php echo input_textarea_group('descMTemplate','Keterangan',(@$getMTemplate[0]['descMTemplate']) ? @$getMTemplate[0]['descMTemplate'] : set_value('descMTemplate'),'Keterangan Template','required') ?>
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