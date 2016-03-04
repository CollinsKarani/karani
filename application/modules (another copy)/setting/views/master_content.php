
<?php

$title = getField('master_category','namaCategory',array('kodeCategory' => end($this->uri->segments)));
$parent = getField('master_category','namaCategory',array('kodeCategory' => $kodeInduk));

?>

<div class="container">

	<div class="row">
		<div class="col-sm-12">
			<h4 class="pull-left page-title"><?= ucfirst(getModule()) ?></h4>
			<ol class="breadcrumb pull-right">
				<li><?= ucfirst(getModule()) ?></li>
				<li><a href="<?= base_url(getModule()."/".getController()."/".getFunction()) ?>"><?= ucfirst(getController()) ?></a></li>
				<li class="active"><?= $title ?></li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Master Data <?= $title ?></h3>
				</div>
				<div class="panel-body">

					<div class="row">
						<div class="col-md-6 text-left">					
							<button onclick="window.location.href='<?= base_url(getModule()."/".getController()."/".getFunction()) ?>'" class="btn btn-md btn-default waves-effect waves-light"><i class="fa fa-chevron-left"></i> Back</button>
						</div>
						<div class="col-md-6 text-right">					
							<button class="btn btn-md btn-primary waves-effect waves-light" data-toggle="modal" data-target="#new-data"><i class="fa fa-plus"></i> New Data</button>
						</div>
					</div>

					<div class="row" style="margin-top:20px;">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<table id="datatable" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Data</th>
										<th class="text-center">Keterangan</th>
										<th class="text-center">Order</th>
										<th class="text-center">Status</th>
										<th class="text-center">Kontrol</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($getData as $row) {

										$status = '';

										switch($row['statusData']){
											case "y":
											$status = "<img src='".base_url('assets/images/icons/y.png')."' class='tip-right' title='Active'>";
											break;
											case "n":
											$status = "<img src='".base_url('assets/images/icons/n.png')."' class='tip-right' title='Not Active'>";
											break;
										}
										?>

										<tr>
											<td style="vertical-align:middle;" class="text-center"><?= $no++ ?></td>
											<td style="vertical-align:middle;"><?= $row['namaData'] ?></td>
											<td style="vertical-align:middle;"><?= $row['keteranganData'] ?></td>
											<td style="vertical-align:middle;" class="text-center"><?= $row['orderData'] ?></td>
											<td style="vertical-align:middle;" class="text-center"><?= $status ?></td>
											<td style="vertical-align:middle;" class="text-center">																							
												<button class="btn btn-icon waves-effect wanves-light btn-primary btn-xs m-b-5" data-toggle="modal" data-target="#modal-edit_<?= $row['idData'] ?>"><i class="fa fa-pencil"></i></button>
												<button class="btn btn-icon waves-effect waves-light btn-danger btn-xs m-b-5" data-toggle="modal" data-target="#delete-data_<?= $row['idData'] ?>"><i class="fa fa-trash"></i></button>
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

	<div id="new-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="<?= base_url().getModule()."/".getController()."/add/data/".end($this->uri->segments) ?>">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title"><?= $title ?></h4>
					</div>

					<div class="modal-body">

						<?php if (!empty($kodeInduk)) { ?>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label"><?= $parent ?></label>
									<?php echo select_join('namaData','idData,namaData','master_data','idData','kodeInduk',array('statusData'=>'y','kodeCategory' => $kodeInduk),'','','Pilih '.$parent) ?>
								</div>
							</div>
						</div>

						<?php } ?>


						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Name</label>
									<input type="text" name="namaData" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group no-margin">
									<label class="control-label">Description</label>
									<textarea name="keteranganData" class="form-control autogrow" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Order</label>
									<input type="text" id="orderData" name="orderData" class="form-control" onkeyup="number(this)" value="<?= $orderData ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field-2" class="control-label">Status</label>
									<br>
									<div class="radio radio-inline radio-primary">
										<input value="y" name="statusData" type="radio" checked>
										<label>Active</label>
									</div>
									<div class="radio radio-inline radio-danger">
										<input value="n" name="statusData" type="radio">
										<label>Not Active</label>
									</div>
								</div>
							</div>
						</div>

					</div>	

					<div class="modal-footer">				
						<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
						<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
					</div>

				</form>
			</div>
		</div>
	</div>

<!-- <div id="modal_edit" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
</div> -->

<?php
if(isset($getData)){
	foreach ($getData as $row) {
		$y = $row['statusData'] == 'y' ? "checked" : "";
		$n = $row['statusData'] == 'n' ? "checked" : "";
		?>

		<div id="modal-edit_<?= $row['idData'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" action="<?= base_url().getModule()."/".getController()."/save/data/".end($this->uri->segments) ?>">
						<input type="hidden" name="idData" value="<?= $row['idData'] ?>">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title"><?= $title ?></h4>
						</div>

						<div class="modal-body">

							<?php if (!empty($kodeInduk)) { ?>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label"><?= $parent ?></label>
										<?php echo select_join('namaData','idData,namaData','master_data','idData','kodeInduk',array('statusData'=>'y','kodeCategory' => $kodeInduk),($row['kodeInduk']) ? $row['kodeInduk'] : "",'','Pilih '.$parent) ?>
									</div>
								</div>
							</div>

							<?php } ?>


							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Name</label>
										<input type="text" name="namaData" value="<?= $row['namaData'] ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group no-margin">
										<label class="control-label">Description</label>
										<textarea name="keteranganData" class="form-control autogrow" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px"><?= $row['keteranganData'] ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Order</label>
										<input type="text" id="orderData" name="orderData" class="form-control" onkeyup="number(this)" value="<?= $row['orderData'] ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="field-2" class="control-label">Status</label>
										<br>
										<div class="radio radio-inline radio-primary">
											<input value="y" name="statusData" type="radio" <?= $y ?>>
											<label>Active</label>
										</div>
										<div class="radio radio-inline radio-danger">
											<input value="n" name="statusData" type="radio" <?= $n ?>>
											<label>Not Active</label>
										</div>
									</div>
								</div>
							</div>

						</div>	

						<div class="modal-footer">				
							<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
							<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
						</div>

					</form>
				</div>
			</div>
		</div>

		<div id="delete-data_<?= $row['idData']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
			<div class="modal-dialog">
				<div class="modal-content">

					<form method="POST" action="<?= base_url().getModule()."/".getController()."/delete/data/".end($this->uri->segments) ?>">
						<input type="hidden" name="idData" value="<?= $row['idData'] ?>">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Delete Data</h4>
						</div>

						<div class="modal-body">
							<div class="alert alert-danger">							
								Are you sure to delete <b><?= $row['namaData'] ?></b> ?
							</div>
						</div>

						<div class="modal-footer">				
							<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
							<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
						</div>

					</form>

				</div>
			</div>
		</div>

		<?php
	}
}
?>

</div>