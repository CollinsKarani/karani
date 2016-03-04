<section class="wrapper">
	<!-- page start-->

	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Master Role
					<span class="tools pull-right">
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						<a href="javascript:;" class="fa fa-cog"></a>
						<a href="javascript:;" class="fa fa-times"></a>
					</span>
				</header>
				<div class="panel-body">
					<?php
					echo site_url();
					?>

					<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/add"><button type="button" class="btn btn-default btn-primary">Tambah Data</button></a>
					<div class="adv-table">
						<table  class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Role</th>
									<th>Keterangan</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($data as $key => $value) 
								{
									?>
									<tr class="gradeU">
										<td><?php echo $no++ ?></td>
										<td><?php echo $value['namaRole'] ?></td>
										<td><?php echo $value['descRole'] ?></td>
										<td align="center">
											<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/add/<?php echo $value['idRole'] ?>"><button type="button" class="btn btn-info "><i class="fa fa-pencil"></i> </button></a>
											<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/delete/<?php echo $value['idRole'] ?>"><button type="button" class="btn btn-danger "><i class="fa fa-trash-o"></i> </button></a>
										</td>
									</tr>
									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- page end-->
</section>