<section class="wrapper">
	<!-- page start-->

	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Tambah/Ubah User
					<span class="tools pull-right">
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						<a href="javascript:;" class="fa fa-cog"></a>
						<a href="javascript:;" class="fa fa-times"></a>
					</span>
				</header>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
						<input type="hidden" name="idMember" class="form-control" value="<?php echo ($getMember) ? $getMember[0]['idMember'] : "" ?>">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Username</label>
							<div class="col-sm-6">
								<input type="text" name="usernameMember" class="form-control" placeholder="Username User" value="<?php echo ($getMember) ? $getMember[0]['usernameMember'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" name="namaMember" class="form-control" placeholder="Nama Member" value="<?php echo ($getMember) ? $getMember[0]['namaMember'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
							<div class="col-sm-6">
								<input type="text" name="passwordMember" class="form-control" placeholder="Password Member" value="<?php echo ($getMember) ? $getMember[0]['passwordMember'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" name="emailMember" class="form-control" placeholder="Email Member" value="<?php echo ($getMember) ? $getMember[0]['emailMember'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Role</label>
							<div class="col-sm-6">
								<?php echo select_join('namaRole','idRole,namaRole','master_user_role','idRole','roleMember','',($getMember) ? $getMember[0]['roleMember'] : "") ?>
							</div>
							<button type="button" class="btn btn-danger" id="roleClear"><i class="fa fa-times"></i> Reset</button>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Ponsel</label>
							<div class="col-sm-6">
								<input type="text" name="hpMember" class="form-control" placeholder="No. Telepon" value="<?php echo ($getMember) ? $getMember[0]['hpMember'] : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-6">
								<?php echo input_radio('member','statusMember',($getMember) ? $getMember[0]['statusMember'] : "") ?>
							</div>
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