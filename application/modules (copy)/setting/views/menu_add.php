<div class="container">
	<?= getBread() ?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add New Menu</h3>
				</div>
				<div class="panel-body">
					<div class="row"> 
						<div class="col-lg-12"> 
							<ul class="nav nav-tabs navtab-bg"> 
								<li class="active"> 
									<a href="#general" data-toggle="tab" aria-expanded="true"> 
										<span class="visible-xs"><i class="fa fa-home"></i></span> 
										<span class="hidden-xs">Umum</span> 
									</a> 
								</li> 
								<li class=""> 
									<a href="#detail" data-toggle="tab" aria-expanded="false"> 
										<span class="visible-xs"><i class="fa fa-user"></i></span> 
										<span class="hidden-xs">Detail</span> 
									</a> 
								</li> 
								<li class=""> 
									<a href="#attribute" data-toggle="tab" aria-expanded="false"> 
										<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
										<span class="hidden-xs">Atribut</span> 
									</a> 
								</li> 
							</ul> 
							<div class="tab-content"> 
								<div class="tab-pane active" id="general"> 
									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
										<input type="hidden" name="idMenu" class="form-control" value="<?php echo ($getMenu) ? $getMenu[0]['idMenu'] : "" ?>">
										<input type="hidden" name="idModule" class="form-control" value="<?php echo (@$getMenu[0]['idModule']) ? @$getMenu[0]['idModule'] : $this->input->get('key') ?>">
										<div class="form-group">
											<label class="col-sm-2 control-label">Menu Induk</label>
											<div class="col-sm-6">
												<select class='form-control search-select' name="kodeInduk" id="kodeInduk">
													<option></option>
													<?php
													foreach ($getParentMenu as $key => $value) {
														?>
														<option value="<?php echo $value['idMenu'] ?>" <?php echo (@$getMenu[0]['kodeInduk']==$value['idMenu'] ? 'selected' : '' ) ?>><?php echo $value['namaMenu'] ?></option>
														<?php
														$subMenu = $this->model->get_where('master_menu',array('kodeInduk'=>$value['idMenu']),'orderMenu','asc');
														foreach ($subMenu as $subkey => $subvalue) {
															?>
															<option value="<?php echo $subvalue['idMenu'] ?>" <?php echo (@$getMenu[0]['kodeInduk']==$subvalue['idMenu'] ? 'selected' : '' ) ?>><?php echo "-".$subvalue['namaMenu'] ?></option>
															<?php 
															$subMenu = $this->model->get_where('master_menu',array('kodeInduk'=>$subvalue['idMenu']),'orderMenu','asc');
															foreach ($subMenu as $subkey => $subvalue) {
																?>
																<option value="<?php echo $subvalue['idMenu'] ?>" <?php echo (@$getMenu[0]['kodeInduk']==$subvalue['idMenu'] ? 'selected' : '' ) ?>><?php echo "--".$subvalue['namaMenu'] ?></option>
																<?php
															}
														}
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
											<div class="col-sm-6">
												<input type="text" name="namaMenu" class="form-control" placeholder="Nama Menu" value="<?php echo ($getMenu) ? $getMenu[0]['namaMenu'] : "" ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 col-sm-2 control-label">Icon</label>
											<div class="col-sm-6">
												<input type="text" class="form-control icp icp-auto" id="iconModule" name="iconMenu" placeholder="Klik disini..." value="<?php echo ($getMenu) ? $getMenu[0]['iconMenu'] : "" ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 col-sm-2 control-label">Order</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="orderMenu" name="orderMenu" placeholder="Urutan Menu" value="<?php echo ($getMenu) ? $getMenu[0]['orderMenu'] : "" ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 col-sm-2 control-label">Target</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="targetMenu" name="targetMenu" placeholder="module/controller/function" value="<?php echo ($getMenu) ? $getMenu[0]['targetMenu'] : "" ?>">
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
								<div class="tab-pane" id="detail"> 
									<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/save">
										<input type="hidden" name="idMenu" class="form-control" value="<?php echo ($getMenu) ? $getMenu[0]['idMenu'] : "" ?>">
										<div class="form-group">
											<label class="col-sm-2 control-label">Keterangan</label>
											<div class="col-sm-6">
												<textarea name="keteranganMenu" class="form-control" rows="6" placeholder="Keterangan Menu"><?php echo ($getMenu) ? $getMenu[0]['keteranganMenu'] : "" ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Resume</label>
											<div class="col-sm-6">
												<textarea name="resumeMenu" class="form-control" rows="6" placeholder="Resume Menu"><?php echo ($getMenu) ? $getMenu[0]['resumeMenu'] : "" ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Detail</label>
											<div class="col-sm-6">
												<textarea name="detailMenu" class="form-control" rows="6" placeholder="Detail Menu"><?php echo ($getMenu) ? $getMenu[0]['detailMenu'] : "" ?></textarea>
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
								<div class="tab-pane" id="attribute"> 
									<?php
									$getMenu[0]['idMenu'] = @$this->encrypt->encode($getMenu[0]['idMenu']);
									$getMenu[0]['idMenu'] = str_replace(array('+', '/', '='), array('-', '_', '~'), $getMenu[0]['idMenu']);
									?>
									<div class="row">
										<div class="col-md-6 text-left">			
											<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/attribute?u=<?php echo $getMenu[0]['idMenu'] ?>"><button type="button" class="btn btn-default btn-primary">Tambah Data</button></a>
										</div>
									</div>
									<div class="row" style="margin-top:20px;">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table id="datatable" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Akses Menu</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($getMenuPrivilege as $key => $value) 
													{
														?>
														<tr class="gradeU">
															<td><?php echo $no++ ?></td>
															<td><?php echo $value['namePAttributeDetail'] ?></td>
															<td align="center">
																<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/attribute/<?php echo $value['idMenuPrivilege'] ?>?u=<?php echo $getMenu[0]['idMenu'] ?>"><button type="button" class="btn btn-info "><i class="fa fa-pencil"></i> </button></a>
																<a href="<?php echo base_url() ?>index.php/<?php echo getModule() ?>/<?php echo getController() ?>/delete/<?php echo $value['idMenuPrivilege'] ?>"><button type="button" class="btn btn-danger "><i class="fa fa-trash-o"></i> </button></a>
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
			</div>
		</div>
	</div>
</div>

