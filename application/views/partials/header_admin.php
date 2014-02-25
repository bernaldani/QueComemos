<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Que Comemos</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php echo ($current == 'dashboard') ? 'class="active"' : ''; ?>><a href="#">Dashboard</a></li>

					<li <?php echo ($current == 'manage_users') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/manage_users');?>">Manage Users</a></li>
					<li <?php echo ($current == 'manage_roles') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/manage_roles');?>">Manage Roles</a></li>
					<li <?php echo ($current == 'manage_permissions') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/manage_permissions');?>">Manage Permissions</a></li>
					<li <?php echo ($current == 'producto') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('admin/producto');?>">La Carta</a></li>

			</ul>
		  	<!--ul class="nav navbar-nav navbar-right">
				<li><a href="../navbar/">Default</a></li>
				<li><a href="../navbar-static-top/">Static top</a></li>
				<li class="active"><a href="./">Fixed top</a></li>
			</ul-->
		</div><!--/.nav-collapse -->
	</div>
</div>