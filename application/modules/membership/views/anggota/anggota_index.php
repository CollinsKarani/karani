<div class="container">

	<?= getBread() ?>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="<?= base_url(getModule().'/'.getController().'/index') ?>" method="get">
						<div class="input-group">
							<input type="text" name="q" value="<?= $this->session->userdata('q') ?>" class="form-control input-lg" placeholder="Cari berdasarkan nama.."> 
							<span class="input-group-btn">
								<button type="submit" class="btn-lg btn waves-effect waves-light btn-primary w-md">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<?php $this->load->view('anggota/mst_anggota.php') ?>

	</div>

	<div class="row">
		<div class="col-sm-12">

			<?= ($pagination) ? $pagination : ""; ?>

		</div>
	</div>

</div>