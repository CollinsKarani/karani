<section class="wrapper">
	<!-- page start-->

	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Tambah/Ubah Role
					<span class="tools pull-right">
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						<a href="javascript:;" class="fa fa-cog"></a>
						<a href="javascript:;" class="fa fa-times"></a>
					</span>
				</header>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
						<input type="hidden" name="idRole" class="form-control" value="<?php echo ($getRole) ? $getRole[0]['idRole'] : "" ?>">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" name="namaRole" class="form-control" id="inputEmail1" placeholder="Nama Role" value="<?php echo ($getRole) ? $getRole[0]['namaRole'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-6">
								<textarea name="descRole" class="form-control" rows="6"><?php echo ($getRole) ? $getRole[0]['descRole'] : "" ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2"></div>
							<div class="col-sm-6">
								<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/privilege/<?php echo $getRole[0]['idRole'] ?>"><button type="button" class="btn btn-info"><i class="fa fa-users"></i> Ubah Hak Akses</button></a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								&nbsp;
								<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>