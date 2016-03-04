<div class="container">
	<?= getBread() ?>	

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah/Ubah Atribut</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save_combination">
						<input type="hidden" name="idStock" class="form-control" value="<?php echo ($getProductDetail) ? $getProductDetail[0]['idStock'] : '' ?>">
						<input type="hidden" name="idCatalog" class="form-control" value="<?php echo ($getProductDetail) ? $getProductDetail[0]['idCatalog'] : $idCatalog ?>">
						<div class="form-group">
							<label class="col-sm-2 control-label">Ukuran</label>
							<div class="col-sm-6">
								<?php echo select_join('nameCAttributeDetail','idCAttributesDetail,nameCAttributeDetail','catalog_attributes_detail','idCAttributesDetail','idSize',array('idCAttribute'=>4),($getProductDetail) ? $getProductDetail[0]['idSize'] : ""); ?>
							</div>
							<button type="button" class="btn btn-danger" id="sizeClear"><i class="fa fa-times"></i> Reset</button>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Panjang</label>
							<div class="col-sm-6">
								<input type="text" name="lengthStock" class="form-control" placeholder="Panjang barang..." value="<?php echo ($getProductDetail) ? $getProductDetail[0]['lengthStock'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Lebar</label>
							<div class="col-sm-6">
								<input type="text" name="widthStock" class="form-control" placeholder="Lebar barang..." value="<?php echo ($getProductDetail) ? $getProductDetail[0]['widthStock'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Warna</label>
							<div class="col-sm-6">
								<?php 
								if (@$getProductDetail[0]['idStock']>0) {
									echo select_join('nameCAttributeDetail','idCAttributesDetail,nameCAttributeDetail,valueCAttributeDetail','catalog_attributes_detail','idCAttributesDetail','idWarna',array('idCAttribute'=>6),($getProductDetail) ? $getProductDetail[0]['idWarna'] : ""); 
								}
								else{
									echo select_join_multiple('nameCAttributeDetail','idCAttributesDetail,nameCAttributeDetail,valueCAttributeDetail','catalog_attributes_detail','idCAttributesDetail','idWarna[]',array('idCAttribute'=>6),($getProductDetail) ? $getProductDetail[0]['idWarna'] : ""); 
								}
								?>
							</div>
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