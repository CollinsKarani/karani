<div class="container">

	<?= getBread() ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Detail Atribut</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6 text-left">
							<a href="<?php echo base_url().getModule().'/'.getController('').'/add/'.$idOAttribute ?>?u=0"><button type="button" class="btn btn-default btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
						</div>
					</div>
					<div class="row" style="margin-top:20px;">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<table id="" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Value</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data as $key => $value) {
										if(preg_match('/^#[a-f0-9]{6}$/i', $value['valueOAttributeDetail'])) 
										{
											$value['valueOAttributeDetail'] = "<div class='circle-color' style='background:".$value['valueOAttributeDetail']."'></div>";
										}
										?>
										<tr>
											<td style="vertical-align:middle;" class="text-center"><?= $no++ ?></td>
											<td style="vertical-align:middle;" class="text-center"><?= $value['nameOAttributeDetail'] ?></td>
											<td style="vertical-align:middle;" class="text-center" <?php echo ($value['valueOAttributeDetail']) ? "" : "width='5%'" ?>><?php echo ($value['valueOAttributeDetail']) ? $value['valueOAttributeDetail'] : "-" ?></td>
											<td style="vertical-align:middle;" class="text-center">
												<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/add/<?php echo $value['idOAttribute'] ?>?u=<?php echo $value['idOAttributesDetail'] ?>">
													<button class="btn btn-icon waves-effect waves-light btn-primary btn-xs m-b-5" data-attr="<?= $value['idOAttributesDetail'] ?>"><i class="fa fa-pencil"></i></button>
												</a>
												<button class="btn btn-icon waves-effect waves-light btn-danger btn-xs m-b-5 sa-params" data-id="<?= $value['idOAttributesDetail'] ?>"><i class="fa fa-trash"></i></button>
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