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
								<input type="hidden" name="idCAttributesDetail" class="form-control" value="<?php echo (@$getAttributesDetail[0]['idCAttributesDetail']) ? $getAttributesDetail[0]['idCAttributesDetail'] : "" ?>">
								<input type="hidden" name="idCAttribute" class="form-control" value="<?php echo (@$getAttributesDetail[0]['idCAttribute']) ? $getAttributesDetail[0]['idCAttribute'] : $idCAttribute ?>">
								<?php echo input_text_group('nameCAttributeDetail','Nama',(@$getAttributesDetail[0]['nameCAttributeDetail']) ? @$getAttributesDetail[0]['nameCAttributeDetail'] : set_value('nameCAttributeDetail'),'Nama Atribut','required') ?>
								<?php echo input_text_group('valueCAttributeDetail','Value',(@$getAttributesDetail[0]['valueCAttributeDetail']) ? @$getAttributesDetail[0]['valueCAttributeDetail'] : set_value('valueCAttributeDetail'),'Value Atribut','','','Value merupakan deskripsi dari nama') ?>
								<?php echo input_text_group('orderCAttributeDetail','Order',(@$getAttributesDetail[0]['orderCAttributeDetail']) ? @$getAttributesDetail[0]['orderCAttributeDetail'] : "",'Order Atribut','required') ?>
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