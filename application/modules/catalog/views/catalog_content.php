<div class="container">
	<?= getBread() ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">List User</h3>
				</div>
				<div class="panel-body">
					<?php
					$query = $this->model->join('user','*',array(array('table'=>'privilege_user','parameter'=>'user.roleUser=privilege_user.idRole'),array('table'=>'master_menu','parameter'=>'privilege_user.menuPrivilege=master_menu.idMenu')),"idRole='1' and actionPrivilege='lihat' and namaMenu in('".getController()."','".getFunction()."')");
					?>

					<!--Widget-4 -->
					<div class="row">
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="mini-stat clearfix bx-shadow">
								<span class="mini-stat-icon bg-info"><i class="fa fa-usd"></i></span>
								<div class="mini-stat-info text-right text-muted">
									<span class="counter"><?php echo count($data) ?></span>
									Produk Tersedia
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="mini-stat clearfix bx-shadow">
								<span class="mini-stat-icon bg-warning"><i class="fa fa-shopping-cart"></i></span>
								<div class="mini-stat-info text-right text-muted">
									<span class="counter">SKU</span>
									Produk Terlaris
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="mini-stat clearfix bx-shadow">
								<span class="mini-stat-icon bg-pink"><i class="fa fa-user"></i></span>
								<div class="mini-stat-info text-right text-muted">
									<span class="counter">5210</span>
									Stok Habis
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="mini-stat clearfix bx-shadow">
								<span class="mini-stat-icon bg-success"><i class="fa fa-eye"></i></span>
								<div class="mini-stat-info text-right text-muted">
									<span class="counter">SKU</span>
									Dilihat Terbanyak
								</div>
							</div>
						</div>
					</div> <!-- End row-->

					<div class="row">
						<div class="col-md-6 text-left">
							<a href="<?php echo base_url().getModule().'/'.getController('').'/add' ?>"><button type="button" class="btn btn-default btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
						</div>
					</div>

					<div class="row" style="margin-top:20px;">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<table id="datatable" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">SKU</th>
										<th class="text-center">Nama Produk</th>
										<th class="text-center">Detail Produk</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data as $key => $value) 
									{
										?>
										<tr class="gradeU">
											<td style="vertical-align:middle;" class="text-center"><?php echo $no++ ?></td>
											<td style="vertical-align:middle;" ><?php echo $value['skuCatalog'] ?></td>
											<td style="vertical-align:middle;" ><?php echo $value['namaCatalog'] ?></td>
											<td style="vertical-align:middle;" ><?php echo $value['detailCatalog'] ?></td>
											<td style="vertical-align:middle;" class="text-center">
												<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/add/<?php echo $value['idCatalog'] ?>">
													<button class="btn btn-icon waves-effect waves-light btn-primary btn-xs m-b-5" data-attr="<?= $value['idCatalog'] ?>"><i class="fa fa-pencil"></i></button>
												</a>
												<button class="btn btn-icon waves-effect waves-light btn-danger btn-xs m-b-5 delete-user" data-id="<?= $value['idCatalog'] ?>"><i class="fa fa-trash"></i></button>
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
			</div>
		</div>
	</div>
</div>