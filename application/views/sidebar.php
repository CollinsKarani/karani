<div class="left side-menu">

	<div class="sidebar-inner slimscrollleft">

		<div class="user-details">
			<div class="pull-left">
				<img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" alt="" class="thumb-md img-circle">
			</div>
			<div class="user-info">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<?= mb_strimwidth(getMember('nameUser'),0,15,'..') ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?= base_url('membership/profile') ?>">
								<i class="md md-face-unlock"></i> Profile
								<div class="ripple-wrapper"></div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="md md-settings"></i> Settings
							</a>
						</li>
					</li>
					<li>
						<a href="<?= base_url('membership/logout') ?>">
							<i class="md md-settings-power"></i> Logout
						</a>
					</li>
				</ul>
			</div>
			<p class="text-muted m-0"><?= getField('master_user_role','namaRole',array('idRole'=>$this->session->userdata('roleUser'))) ?></p>
		</div>
	</div><!--- Divider -->



	<!-- START MENU SIDEBAR -->

	<div id="sidebar-menu">
		<ul>

			<?php
			$load_module = $this->model->get_where('master_module',array('statusModule'=>'Tampil'),'orderModule','asc');
			$plus_sub = "";
			$class_sub = "";
			$icon = "";

			foreach ($load_module as $key1 => $value1)
			{
				$submenu = $this->model->get_where('master_menu',array('idModule'=>$value1['idModule'],'statusMenu'=>'y'),'orderMenu','asc');
				$class_sub = $submenu ? 'class="has_sub"' : '';
				$plus_sub = $submenu ? '<span class="pull-right"><i class="md md-add"></i></span>' : '';
				!(empty($value1['iconModule'])) ? $icon = '<i class="fa '.$value1['iconModule'].'"></i>' : $icon = '';

				?>
				<li <?= $class_sub ?>>
					<a href='<?php echo base_url().strtolower($value1['nameModule']) ?>' class="waves-effect">
						<?= $icon."<span>".$value1['nameModule']."</span>".$plus_sub ?>
					</a>

					<?php if ($submenu) {
						?>
						<ul class="list-unstyled">

							<?php 
							$query = $this->model->get_where('master_menu',array('kodeInduk'=>0,'idModule'=>$value1['idModule'],'statusMenu'=>'y'),'orderMenu','asc');
							$class_sub = "";
							$plus_sub = "";
							foreach ($query as $key2 => $value2) {
								$kodeInduk = $this->model->get_where('master_menu',array('kodeInduk'=>$value2['idMenu'],'idModule'=>$value1['idModule'],'statusMenu'=>'y'),'orderMenu','asc');
								if($kodeInduk AND empty($value2['targetMenu'])) 
									$class_sub = 'class="has_sub"';
								else $class_sub = '';

								$plus_sub = $kodeInduk ? '<span class="pull-right"><i class="md md-add"></i></span>' : '';
								?>

								<li <?= $class_sub ?>>
									<a href="<?php echo base_url().$value2['targetMenu']?>" class="waves-effect subdrop <?php echo (strtolower(getModule())."/".strtolower(getController())==$value2['targetMenu']) ? "active subdrop" : '' ?>">													
										<span><?php echo $value2['namaMenu'] ?></span>
										<?= $plus_sub ?>
									</a>

									<?php if(count($kodeInduk) > 0){
										?>
										<ul style="display:block !important" class="list-unstyled">
											<?php
											foreach ($kodeInduk as $key3 => $value3)
											{
												?>
												<li>
													<a href="<?php echo base_url('').$value3['targetMenu']?>" <?php echo (strtolower(getModule())."/".strtolower(getController())==$value3['targetMenu']) ? "class='active subdrop'" : '' ?>>
														<span><?php echo $value3['namaMenu'] ?></span>	
														<span><?php echo $value3['targetMenu'] ?></span>													
													</a>													
												</li>
												<?php
											} 
											?>
										</ul>
										<?php
									}	?>

								</li>
								<?php
							}
							?>

						</ul>

						<?php } ?>

					</li>
					<?php 
				}
				?>

			</ul>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>

	</div>
</div>