<div class="container">
	<?= getBread() ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah/Ubah User</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
								<?php echo validation_errors() ?>
								<input type="hidden" name="idUser" class="form-control" value="<?php echo ($getMember) ? $getMember[0]['idMember'] : "" ?>">
								<?php echo input_text_group('usernameUser','Username',(@$getMember[0]['usernameUser']) ? @$getMember[0]['usernameUser'] : set_value('usernameUser'),'Username User','required') ?>
								<?php echo input_text_group('nameUser','Nama',(@$getMember[0]['nameUser']) ? @$getMember[0]['nameUser'] : set_value('nameUser'),'Nama User','required') ?>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
									<div class="col-sm-6">
										<input type="text" name="passwordUser" class="form-control" placeholder="Password Member" value="<?php echo ($getMember) ? $getMember[0]['passwordUser'] : "" ?>">
									</div>
								</div>
								<?php echo input_email_group('emailUser','Email',(@$getMember[0]['emailUser']) ? @$getMember[0]['emailUser'] : "",'Email','required') ?>
								<?php echo select_join_group('namaRole','idRole,namaRole','master_user_role','idRole','roleUser','Role','',($getMember) ? $getMember[0]['roleUser'] : set_value('roleUser'),'required') ?>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Ponsel</label>
									<div class="col-sm-6">
										<input type="text" name="phone" class="form-control" placeholder="No. Telepon" value="<?php echo ($getMember) ? $getMember[0]['phone'] : "" ?>">
									</div>
								</div>
								<?php echo input_radio_group('statusUser','Status',array('y'=>'Aktif','n'=>'Tidak Aktif'),'required') ?>
 						<!-- 	<div class="form-group">
									<label class="col-sm-2 control-label">Status</label>
									<div class="col-sm-6">
										<label class='radio-inline' style='color:#000000;'>
											<input type="radio" name="statusUser" value="y" data-validation="required"> Aktif
										</label>
										<label class='radio-inline' style='color:#000000;'>
											<input type="radio" name="statusUser" value="n" data-validation="required"> Tidak Aktif
										</label>
									</div>
								</div> -->
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
										&nbsp;
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
