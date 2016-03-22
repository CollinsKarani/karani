<div class="container">
	<?= getBread() ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add New Menu</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<ul class="nav nav-tabs navtab-bg"> 

								<li class="active"> 
									<a href="#general" data-toggle="tab" aria-expanded="true"> 
										<span class="visible-xs"><i class="fa fa-home"></i></span> 
										<span class="hidden-xs">Umum</span> 
									</a> 
								</li> 
								<li class=""> 
									<a href="<?php echo ($getProduct) ? '#combination' : "javascript:void(0)" ?>" data-toggle="<?php echo ($getProduct) ? 'tab' : "" ?>" aria-expanded="false" id="tab-combination"> 
										<span class="visible-xs"><i class="fa fa-user"></i></span> 
										<span class="hidden-xs">Kombinasi</span> 
									</a> 
								</li> 
								<li class=""> 
									<a href="<?php echo ($getProduct) ? '#quantity' : "javascript:void(0)" ?>" data-toggle="<?php echo ($getProduct) ? 'tab' : "" ?>" aria-expanded="false" id="tab-quantity"> 
										<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
										<span class="hidden-xs">Kuantitas</span> 
									</a> 
								</li> 
								<li class=""> 
									<a href="<?php echo ($getProduct) ? '#gallery' : "javascript:void(0)" ?>" data-toggle="<?php echo ($getProduct) ? 'tab' : "" ?>" aria-expanded="false" id="tab-gallery"> 
										<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
										<span class="hidden-xs">Galeri</span> 
									</a> 
								</li> 
							</ul> 
							<div class="tab-content"> 
								<div class="tab-pane active" id="general"> 
									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
										<input type="hidden" name="idCatalog" id="idCatalog" class="form-control" value="<?php echo ($getProduct) ? $getProduct[0]['idCatalog'] : "" ?>">
										<?php echo input_text_group('skuCatalog','SKU',(@$getProduct[0]['skuCatalog']) ? @$getProduct[0]['skuCatalog'] : set_value('skuCatalog'),'SKU','required') ?>
										<?php echo input_text_group('namaCatalog','Nama',(@$getProduct[0]['namaCatalog']) ? @$getProduct[0]['namaCatalog'] : set_value('namaCatalog'),'Nama Produk','required') ?>
										<?php echo select_join_group('namaCategory','idCategory,namaCategory,kodeInduk','catalog_category','idCategory','idKategori','Kategori','',(@$getProduct[0]['idKategori']) ? @$getProduct[0]['idKategori'] : set_value('idKategori'),'','Pilih Data') ?>
										<?php echo input_textarea_group('detailCatalog','Keterangan',(@$getProduct[0]['detailCatalog']) ? @$getProduct[0]['detailCatalog'] : set_value('detailCatalog'),'Keterangan Produk','required') ?>
										<?php echo input_text_group('materialCatalog','Bahan',(@$getProduct[0]['materialCatalog']) ? @$getProduct[0]['materialCatalog'] : set_value('materialCatalog'),'Bahan Produk','required') ?>
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Harga</label>
											<div class="col-sm-6">
												<?php echo input_price('hargaCatalog',($getProduct) ? $getProduct[0]['hargaCatalog'] : "",'Harga Produk') ?>
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Harga Diskon</label>
											<div class="col-sm-6">
												<?php echo input_price('discountCatalog',($getProduct) ? $getProduct[0]['discountCatalog'] : "",'Harga setelah diskon') ?>
											</div>
										</div>
										<?php echo select_join_group('nameCAttributeDetail','idCAttributesDetail,nameCAttributeDetail,valueCAttributeDetail','catalog_attributes_detail','idCAttributesDetail','statusCatalog','Status',array('idCAttribute'=>7),(@$getProduct[0]['statusCatalog']) ? @$getProduct[0]['statusCatalog'] : set_value('statusCatalog'),'','Pilih Data') ?>
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
												&nbsp;
												<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="combination"> 
									<div class="row">
										<div class="col-md-6 text-left">			
											<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/combination?u=<?php echo @$getProduct[0]['idCatalog'] ?>"><button type="button" class="btn btn-default btn-primary">Tambah Data</button></a>
										</div>
									</div>							
									<div class="row" style="margin-top:20px;">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table id="datatable" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Ukuran</th>
														<th>Warna</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($getProductDetail as $key => $value) 
													{
														$getSize = $this->model->get_where('catalog_attributes_detail',array('idCAttributesDetail'=>$value['idSize']));
														$getColor = $this->model->get_where('catalog_attributes_detail',array('idCAttributesDetail'=>$value['idWarna']));
														?>
														<tr class="gradeU">
															<td><?php echo $no++ ?></td>
															<td><?php echo $getSize[0]['nameCAttributeDetail'] ?></td>
															<td><?php echo $getColor[0]['nameCAttributeDetail'] ?></td>
															<td align="center">
																<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/combination/<?php echo $value['idStock'] ?>"><button type="button" class="btn btn-info "><i class="fa fa-pencil"></i> </button></a>
																<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/delete/<?php echo $value['idStock'] ?>"><button type="button" class="btn btn-danger "><i class="fa fa-trash-o"></i> </button></a>
															</td>
														</tr>
														<?php 
													}
													?>
												</tbody>
											</table>
										</div>
									</div> 
								</div>
								<div class="tab-pane" id="quantity"> 
									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save_quantity">
										<div class="form-group">
											<div class="col-sm-1"
												<h4>Jumlah</h4>
											</div>
											<div class="col-sm-5">
												<h4>Kombinasi Produk</h4>
											</div>
										</div>
										<?php 
										foreach ($getProductDetail as $key => $value) {
											$getSize = $this->model->get_where('catalog_attributes_detail',array('idCAttributesDetail'=>$value['idSize']));
											$getColor = $this->model->get_where('catalog_attributes_detail',array('idCAttributesDetail'=>$value['idWarna']));
											?>
											<input type="hidden" name="idStock[]" value="<?php echo $value['idStock']  ?>">
											<input type="hidden" name="idCatalog" value="<?php echo $value['idCatalog'] ?>">
											<div class="form-group">
												<div class="col-sm-1">
													<input type="text" name="jumlahStock[]" class="form-control" placeholder="0" value="<?php echo ($value['jumlahStock']!=0) ? $value['jumlahStock'] : "" ?>">
												</div>
												<div class="col-sm-5">
													<p><?php echo $value['namaCatalog']." ".$getSize[0]['nameCAttributeDetail']." ".$getColor[0]['nameCAttributeDetail'] ?></p>
												</div>
											</div>
											<?php 
										} 
										?>
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
												&nbsp;
												<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
											</div>
										</div>
									</form>
								</div> 
								<div class="tab-pane" id="gallery"> 
									<div class="row">
										<div class="col-md-6">
											<button type="button" class="btn btn-default waves-effect m-b-5 filter" data-filter="all">All</button>
											<?php
											foreach ($getProductColor as $key => $value) 
											{
												$getColor = $this->model->get_where('catalog_attributes_detail',array('idCAttributesDetail'=>$value['idWarna']));
												?>
												<button type="button" class="btn btn-default waves-effect m-b-5 filter" data-filter=".<?php echo $getColor[0]['idCAttributesDetail'] ?>"><?php echo $getColor[0]['nameCAttributeDetail'] ?></button>
												<?php
											}
											?>
										</div>
										<div class="col-md-6 text-right">
											<!-- <span class="btn btn btn-primary waves-effect waves-light btn-file">
												<form method="post" action="<?php echo base_url(getModule().'/'.getController().'/upload') ?>">
													Unggah foto.. <input type="file" name="photoProduct">
												</form>
											</span> -->
											<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
												Tambahkan gambar baru..
											</button>
										</div>
									</div>
									<?php
									foreach ($getProductGallery as $key => $value) {
										?>
										<div class="mix <?php echo $value['idCAttributeDetail'] ?>"><img src="<?php echo base_url('assets/uploads/product-'.$value['idCatalog'].'-'.$value['namaCatalog'].'/'.$value['fotoCGaleri']) ?>" width="100"></div>
										<?php
									}
									?>
								</div> 
							</div>  
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="POST" action="<?= base_url(getModule().'/'.getController().'/uploads') ?>" enctype="multipart/form-data">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Change Photo</h4>
				</div>

				<div class="modal-body">
					<input type="hidden" name="idCatalog" id="idCatalog" class="form-control" value="<?php echo ($getProduct) ? $getProduct[0]['idCatalog'] : "" ?>">
					<input type="hidden" name="namaCatalog" id="namaCatalog" class="form-control" value="<?php echo ($getProduct) ? $getProduct[0]['namaCatalog'] : "" ?>">
					<div class="form-group">
					<?php echo select_join('nameCAttributeDetail','idCAttributesDetail,nameCAttributeDetail,valueCAttributeDetail','catalog_attributes_detail','idCAttributesDetail','idCAttributeDetail',array('idCAttribute'=>6),'','required'); ?>
					</div>
					<div class="form-group">
						<?= input_file_image('fotoUser') ?>       
					</div>                                 
					<i><small class="text-danger">* Upload Max Size 1MB</small></i>
				</div>  

				<div class="modal-footer">                              
					<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
				</div>

			</form>
		</div>
	</div>
</div>
