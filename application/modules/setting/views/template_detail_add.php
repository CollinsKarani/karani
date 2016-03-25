<div class="container">
	<?= getBread() ?>	

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Template Detail</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save_detail">
								<input type="hidden" name="idMTemplateDetail" class="form-control" value="<?php echo (@$getMTemplateDetail[0]['idMTemplateDetail']) ? $getMTemplateDetail[0]['idMTemplateDetail'] : "" ?>">
								<input type="hidden" name="idMTemplate" class="form-control" value="<?php echo (@$getMTemplateDetail[0]['idMTemplate']) ? $getMTemplateDetail[0]['idMTemplate'] : $idMTemplate ?>">
								<?php echo input_text_group('nameMTemplateDetail','Nama',(@$getMTemplateDetail[0]['nameMTemplateDetail']) ? @$getMTemplateDetail[0]['nameMTemplateDetail'] : "",'Nama Template','required') ?>
								<?php echo input_textarea_group('contentMTemplateDetail','Konten',(@$getMTemplateDetail[0]['contentMTemplateDetail']) ? @$getMTemplateDetail[0]['contentMTemplateDetail'] : "",'Konten Template','required') ?>
								<?php echo input_textarea_group('descriptionMTemplateDetail','Keterangan',(@$getMTemplateDetail[0]['descriptionMTemplateDetail']) ? @$getMTemplateDetail[0]['descriptionMTemplateDetail'] : "",'Keterangan Template','required') ?>
								<?php echo input_text_group('orderMTemplateDetail','Order',(@$getMTemplateDetail[0]['orderMTemplateDetail']) ? @$getMTemplateDetail[0]['orderMTemplateDetail'] : "",'Order Template','required') ?>
							</div>
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