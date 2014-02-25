	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo site_url('admin');?>">Worthy.at Admin</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li <?php echo ($current == 'dashboard') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li <?php echo ($current == 'feeds') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/feeds');?>"><i class="fa fa-tags"></i> City Feeds</a></li>

			<li class="dropdown <?php echo ($current == 'manage_feeds') ? 'active' : ''; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Manage Feeds <b class="caret"></b></a>
              <ul class="dropdown-menu">
					<li><a href="<?php echo site_url('admin/manage_feeds/eat');?>"><i class="fa fa-coffee"></i> Eat</a></li>
					<li><a href="<?php echo site_url('admin/manage_feeds/get');?>"><i class="fa fa-shopping-cart"></i> Get</a></li>
					<li><a href="<?php echo site_url('admin/manage_feeds/out');?>"><i class="fa fa-suitcase"></i> Out</a></li>
              </ul>
            </li>
			<li <?php echo ($current == 'manage_users') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/manage_users');?>"><i class="fa fa-users"></i> Manage Users</a></li>
			<li <?php echo ($current == 'manage_roles') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/manage_roles');?>"><i class="fa fa-book "></i> Manage Roles</a></li>
			<li <?php echo ($current == 'manage_permissions') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/manage_permissions');?>"><i class="fa fa-unlock-alt"></i> Manage Permissions</a></li>
			<li <?php echo ($current == 'setting') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/setting');?>"><i class="fa fa-wrench"></i> Settings</a></li>
		</ul>




		<ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown">
				<?php if ($this->authentication->is_signed_in()) : ?>
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo showPhoto($account_details->picture,array('height'=>'25','width'=>'25')); ?><?php echo ' '.$account->email; ?><b class="caret"></b></a>
				<?php else : ?>
					<?php echo anchor('login', lang('website_sign_in')); ?>
				<?php endif; ?>
				<ul class="dropdown-menu">
					<?php if ($this->authentication->is_signed_in()) : ?>
						<li class="dropdown-header">Account Info</li>
						<li><?php echo anchor('account/account_settings', lang('website_account')); ?></li>
						<?php if ($account->password) : ?>
							<li><?php echo anchor('account/account_password', lang('website_password')); ?></li>
						<?php endif; ?>
						<li><?php echo anchor('account/account_linked', lang('website_linked')); ?></li>
						<li class="divider"></li>
						<li><?php echo anchor('account/sign_out', lang('website_sign_out')); ?></li>
					<?php endif; ?>
				</ul>
			</li>
			<?php if ( ! $this->authentication->is_signed_in()) : ?>
			<li>
				<?php echo anchor('account/sign_up', lang('website_sign_up')); ?>
			</li>
			<?php endif ?>
		</ul>
	</div><!-- /.navbar-collapse -->
