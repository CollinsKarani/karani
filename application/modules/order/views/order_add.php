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
								<input type="hidden" name="idOrder" class="form-control" value="<?php echo ($getOrder) ? $getOrder[0]['idOrder'] : "" ?>">
								<?php echo select_join_group('namaCatalog','idCatalog,namaCatalog','catalog','idCatalog','idCatalog','Nama Produk','',(@$getOrder[0]['idCatalog']) ? @$getOrder[0]['idCatalog'] : set_value('idCatalog'),'required','Pilih Data') ?>
								<?php echo input_text_group('kodeOrder','Kode',(@$getOrder[0]['kodeOrder']) ? @$getOrder[0]['kodeOrder'] : set_value('kodeOrder'),'Kode Order','required') ?>													 	
								<?php echo input_textarea_group('alamatOrder','Alamat',(@$getOrder[0]['alamatOrder']) ? @$getOrder[0]['alamatOrder'] : set_value('alamatOrder'),'Alamat Order','required') ?>													
								<div class="form-group">
									<label for='' class='col-lg-2 col-sm-2 control-label'>Provinsi</label>
									<div class="col-md-6">
										<select name='provOrigin' id='prov-origin' required class='form-control search-select'>
											<option></option>
											<?php
											foreach ($getProvince as $key => $value) {
												echo "<option value='".$value['province_id']."'>".$value['province']."</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for='' class='col-lg-2 col-sm-2 control-label'>Kota</label>
									<div class="col-md-6">
										<select name='cityOrigin' id='city-origin' required class='form-control search-select'>
											<option></option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for='' class='col-lg-2 col-sm-2 control-label'>Provinsi</label>
									<div class="col-md-6">
										<select name='provDestination' id='prov-destination' required class='form-control search-select' data-placeholder='Pilih data...'>
											<option></option>
											<?php
											foreach ($getProvince as $key => $value) {
												echo "<option value='".$value['province_id']."'>".$value['province']."</option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for='' class='col-lg-2 col-sm-2 control-label'>Kota</label>
									<div class="col-md-6">
										<select name='cityDestination' id='city-destination' required class='form-control search-select' data-placeholder='Pilih data...'>
											<option></option>

										</select>
									</div>
								</div>

								<div class="form-group">
									<label for='' class='col-lg-2 col-sm-2 control-label'>Kurir</label>
									<div class="col-md-6">
										<select name='courier' class='form-control search-select' data-placeholder='Pilih data...'>
											<option></option>
											<option value="jne">JNE</option>
											<option value="tiki">TIKI</option>
											<option value="pos">POS INDONESIA</option>
										</select>
									</div>
								</div>
								
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