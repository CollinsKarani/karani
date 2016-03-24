<div class="container">
	<?= getBread() ?>	

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Atribut Detail</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save_detail">
								<input type="hidden" name="idOAttributesDetail" class="form-control" value="<?php echo (@$getAttributesDetail[0]['idOAttributesDetail']) ? $getAttributesDetail[0]['idOAttributesDetail'] : "" ?>">
								<input type="hidden" name="idOAttribute" class="form-control" value="<?php echo (@$getAttributesDetail[0]['idOAttribute']) ? $getAttributesDetail[0]['idOAttribute'] : $idOAttribute ?>">
								<?php echo input_text_group('nameOAttributeDetail','Nama',(@$getAttributesDetail[0]['nameOAttributeDetail']) ? @$getAttributesDetail[0]['nameOAttributeDetail'] : set_value('nameOAttributeDetail'),'Nama Atribut','required') ?>
								<?php echo input_text_group('valueOAttributeDetail','Value',(@$getAttributesDetail[0]['valueOAttributeDetail']) ? @$getAttributesDetail[0]['valueOAttributeDetail'] : set_value('valueOAttributeDetail'),'Value Atribut','','','Value merupakan parameter yang mungkin akan digunakan') ?>
								<?php echo input_text_group('orderOAttributeDetail','Order',(@$getAttributesDetail[0]['orderOAttributeDetail']) ? @$getAttributesDetail[0]['orderOAttributeDetail'] : "",'Order Atribut','required') ?>
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