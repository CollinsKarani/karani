<?php

$title = getField('master_category','namaCategory',array('kodeCategory' => $this->uri->segment(4)));
$parent = getField('master_category','namaCategory',array('kodeCategory' => $kodeInduk));

?>


<form method="POST" action="<?= base_url().getModule()."/".getController()."/save/data/".end($this->uri->segments) ?>">

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
						<input value="y" name="statusData" type="radio">
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