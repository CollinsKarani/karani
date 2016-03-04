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
										<th class="text-center">Nama</th>
										<th class="text-center">Email</th>
										<th class="text-center">Phone</th>
										<th class="text-center">Status</th>
										<th class="text-center">Last Login</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data as $key => $value) 
									{
										$status = '';

										switch($value['statusUser']){
											case "y":
											$status = "<img src='".base_url('assets/images/icons/y.png')."' class='tip-right' title='Active'>";
											break;
											case "k":
											$status = "<img src='".base_url('assets/images/icons/n.png')."' class='tip-right' title='Not Active'>";
											break;
										}
										?>
										<tr class="gradeU">
											<td style="vertical-align:middle;" class="text-center"><?php echo $no++ ?></td>
											<td style="vertical-align:middle;" ><?php echo $value['nameUser'] ?></td>
											<td style="vertical-align:middle;" ><?php echo $value['emailUser'] ?></td>
											<td style="vertical-align:middle;" ><?php echo $value['phone'] ?></td>
											<td style="vertical-align:middle;" class="text-center"><?php echo $status ?></td>
											<td style="vertical-align:middle;" class="text-center"><?php echo $value['lastLogin'] ?></td>
											<td style="vertical-align:middle;" class="text-center">
												<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/add/<?php echo $value['idUser'] ?>">
													<button class="btn btn-icon waves-effect waves-light btn-primary btn-xs m-b-5" data-attr="<?= $value['idUser'] ?>"><i class="fa fa-pencil"></i></button>
												</a>
												<button class="btn btn-icon waves-effect waves-light btn-danger btn-xs m-b-5 delete-user" data-id="<?= $value['idUser'] ?>"><i class="fa fa-trash"></i></button>
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