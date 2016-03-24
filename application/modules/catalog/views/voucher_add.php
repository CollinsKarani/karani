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
								<input type="hidden" name="idCVoucher" class="form-control" value="<?php echo (@$getVoucher[0]['idCVoucher']) ? @$getVoucher[0]['idCVoucher'] : "" ?>">
								<?php echo select_join_group('namaCatalog','idCatalog,namaCatalog','catalog','idCatalog','idCatalog','Produk','',(@$getVoucher[0]['idCatalog']) ? @$getVoucher[0]['idCatalog'] : set_value('idCatalog'),'','Pilih Data','Jika voucher berlaku untuk semua produk, tidak perlu diisi') ?>
								<?php echo input_text_group('kodeCVoucher','Kode',(@$getVoucher[0]['kodeCVoucher']) ? @$getVoucher[0]['kodeCVoucher'] : set_value('kodeCVoucher'),'Kode Voucher','required') ?>								
								<?php echo input_text_group('judulCVoucher','Judul',(@$getVoucher[0]['judulCVoucher']) ? @$getVoucher[0]['judulCVoucher'] : set_value('judulCVoucher'),'Judul Voucher','required') ?>								
								<?php echo input_price_group('nominalCVoucher','Nominal',(@$getVoucher[0]['nominalCVoucher']) ? @$getVoucher[0]['nominalCVoucher'] : set_value('nominalCVoucher'),'Nominal Voucher','required') ?>								
								<?php echo input_price_group('minimumOrder','Min Order',(@$getVoucher[0]['minimumOrder']) ? @$getVoucher[0]['minimumOrder'] : set_value('minimumOrder'),'Minimum Order','required') ?>								
								<div class="form-group">
									<label for='Label' class='col-lg-2 col-sm-2 control-label'>Masa Aktif</label>
									<div class="form-inline col-sm-6">
										<div class="input-group">
											<div class="input-group-addon"><span><i class="fa fa-calendar"></i></span></div>
											<?php echo input_daterange('startDate',set_value('startDate',!empty($getVoucher[0]['startDate']) ? date('d-m-Y',strtotime($getVoucher[0]['startDate'])) : ""),'Tanggal Mulai','required') ?>
										</div>
										s/d
										<div class="input-group">
											<div class="input-group-addon"><span><i class="fa fa-calendar"></i></span></div>
											<?php echo input_daterange('expiredDate',set_value('expiredDate',!empty($getVoucher[0]['expiredDate']) ? date('d-m-Y',strtotime($getVoucher[0]['expiredDate'])) : ""),'Tanggal Selesai','required') ?>
										</div>
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