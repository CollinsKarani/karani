<div class="container">

	<?= getBread() ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Approval Member</h3>
				</div>
				<div class="panel-body">

					<form method="POST" action="<?= base_url(getModule()."/".getController()."/submit") ?>">

						<div class="row">
							<div class="col-md-12 text-right">
								<i>With Selected : </i>
								<button type="submit" name="btnSetuju" class="btn btn-md btn-primary waves-effect waves-light"><i class="fa fa-check"></i> Setujui</button>
								<button type="submit" name="btnTolak" class="btn btn-md btn-danger waves-effect waves-light"><i class="fa fa-close"></i> Tolak</button>
							</div>
						</div>

						<div class="row" style="margin-top:20px;">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<table id="datatable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Nama</th>
											<th class="text-center">TTL</th>
											<th class="text-center">Angkatan</th>
											<th class="text-center">HP</th>
											<th class="text-right">
												<input id="chkAll" type="checkbox">
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($getApproval as $row) {
											?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td><?= $row['nameUser'] ?></td>
												<td class="text-center"><?= $row['tempatLahir'].", ".getTanggal($row['tglLahir']) ?></td>
												<td class="text-center"><?= $row['angkatanUser'] ?></td>
												<td><?= $row['phone'] ?></td>
												<td class="text-center">
													<input id="chkOne" type="checkbox" name="confirmation[]" value="<?= $row['usernameUser'] ?>">
												</td>
											</tr>

											<?php
										}
										?>

									</tbody>
								</table>						
							</div>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
</div>