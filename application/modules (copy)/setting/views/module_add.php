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
								<input type="hidden" name="idModule" class="form-control" value="<?php echo ($getModule) ? $getModule[0]['idModule'] : "" ?>">
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-6">
										<input type="text" name="nameModule" class="form-control" placeholder="Nama Modul" value="<?php echo ($getModule) ? $getModule[0]['nameModule'] : "" ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Keterangan</label>
									<div class="col-sm-6">
										<textarea name="descModule" placeholder="Keterangan Menu" class="form-control" rows="6"><?php echo ($getModule) ? $getModule[0]['descModule'] : "" ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">Icon</label>
									<div class="col-sm-6">
										<input type="text" class="form-control icp icp-auto" placeholder="Klik disini..." id="iconModule" name="iconModule" value="<?php echo ($getModule) ? $getModule[0]['iconModule'] : "" ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">Order</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="orderModule" name="orderModule" placeholder="Urutan Modul" value="<?php echo ($getModule) ? $getModule[0]['orderModule'] : "" ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Status</label>
									<div class="col-sm-6">
										<?php echo input_radio('master_module','statusModule',($getModule) ? $getModule[0]['statusModule'] : "") ?>
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