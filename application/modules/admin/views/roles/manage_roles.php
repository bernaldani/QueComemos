<h2><?php echo lang('roles_page_name'); ?></h2>

<div class="well">
	<?php echo lang('roles_page_description'); ?>
</div>

<table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th><?php echo lang('roles_column_role'); ?></th>
			<th><?php echo lang('roles_column_users'); ?></th>
			<th><?php echo lang('roles_permission'); ?></th>
			<th>
				<?php if( $this->authorization->is_permitted('create_roles') ): ?>
					<?php echo anchor('admin/manage_roles/save', lang('website_create'), 'class="btn btn-primary btn-small"'); ?>
				<?php endif; ?>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach( $roles as $role ) : ?>
			<tr>
				<td><?php echo $role['id']; ?></td>
				<td>
					<?php echo $role['name']; ?>
					<?php if( $role['is_disabled'] ): ?>
						<span class="label label-danger"><?php echo lang('roles_banned'); ?></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if( $role['user_count'] > 0 ) : ?>
						<?php echo anchor('admin/manage_users/filter/role/'.$role['id'], $role['user_count'], 'class="badge badge-info"'); ?>
					<?php else : ?>
						<span class="badge">0</span>
					<?php endif; ?>
				</td>
				<td>
					<?php if( count($role['perm_list']) == 0 ) : ?>
						<span class="label">No Permissions</span>
					<?php else : ?>
						<ul class="list-inline">
							<?php foreach( $role['perm_list'] as $itm ) : ?>
								<li><?php echo anchor('admin/manage_permissions/save/'.$itm['id'], $itm['key'], 'title="'.$itm['title'].'"'); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</td>
				<td>
					<?php if( $this->authorization->is_permitted('update_roles') ): ?>
						<?php echo anchor('admin/manage_roles/save/'.$role['id'], lang('website_update'), 'class="btn btn-small"'); ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
