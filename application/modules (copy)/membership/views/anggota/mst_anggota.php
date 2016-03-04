<?php
$offset = (isset($offset) ? $offset : 0);
foreach ($getAllMember as $row) {
	?>

	<div class="col-sm-6 col-lg-4">
		

		<div class="panel">
			<div class="panel-body">
				<div class="media-main">
					<a class="pull-left" href="<?= base_url(getModule().'/'.getController().'/profile/'.$row['idUser']) ?>">
						<img class="thumb-lg img-circle" src="<?= base_url('assets/images/users/avatar-2.jpg') ?>" alt="">
					</a>
					<div class="info">						
						<h4>
							<a id="link" href="<?= base_url(getModule().'/'.getController().'/profile/'.$row['idUser']) ?>">
								<?= $row['nameUser'] ?>
							</a>
						</h4>						
						<p class="text-muted">
							<?= $row['pekerjaan'] ? $row['pekerjaan'] : '-' ?>
							<br>
							<small><i><?= $row['nama_kota'],", ".$row['nama_provinsi'] ?></i></small>
						</p>

					</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<ul class="social-links list-inline">
					<li>
						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook">
							<i class="fa fa-facebook">	
							</i>
						</a>
					</li>
					<li>

						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter">
							<i class="fa fa-twitter">	
							</i>
						</a>
					</li>
					<li>

						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="LinkedIn">
							<i class="fa fa-linkedin">	
							</i>
						</a>
					</li>
					<li>

						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype">
							<i class="fa fa-skype">	
							</i>
						</a>
					</li>
					<li>

						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Message">
							<i class="fa fa-envelope-o">	
							</i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<?php
}
?>