<h2><?php echo lang('permissions_page_name'); ?></h2>

<div class="well">
	<?php echo lang('permissions_page_description'); ?>
</div>

<table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th><?php echo lang('permissions_column_permission'); ?></th>
			<th><?php echo lang('permissions_description'); ?></th>
			<th><?php echo lang('permissions_column_inroles'); ?></th>
			<th>
				<?php if( $this->authorization->is_permitted('create_users') ): ?>
					<a href="/admin/manage_permissions/save" class="btn btn-primary btn-small">Create<a>
				<?php endif; ?>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach( $permissions as $perm ) : ?>
			<tr>
				<td><?php echo $perm['id']; ?></td>
				<td>
					<?php echo $perm['key']; ?>
					<?php if( $perm['is_disabled'] ): ?>
						<span class="label label-danger"><?php echo lang('permissions_banned'); ?></span>
					<?php endif; ?>
				</td>
				<td><?php echo $perm['description']; ?></td>
				<td>
					<?php if( count($perm['role_list']) == 0 ) : ?>
						<span class="label">None</span>
					<?php else : ?>
						<ul class="list-inline">
							<?php foreach( $perm['role_list'] as $itm ) : ?>
								<li><?php echo anchor('admin/manage_roles/save/'.$itm['id'], $itm['name'], 'title="'.$itm['title'].'"'); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</td>
				<td>
					<?php if( $this->authorization->is_permitted('update_permissions') ): ?>
						<?php echo anchor('admin/manage_permissions/save/'.$perm['id'], lang('website_update'), 'class="btn btn-small"'); ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
