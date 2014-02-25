<?php if (! ($this->config->item("sign_up_enabled"))): ?>
	<div class="span12">
		<h3><?php echo lang('sign_up_heading'); ?></h3>

		<div class="alert">
			<strong><?php echo lang('sign_up_notice'); ?> </strong> <?php echo lang('sign_up_registration_disabled'); ?>
		</div>
	</div>
<?php endif;?>

<?php if ($this->config->item("sign_up_enabled")): ?>
	<div class="span6">
		<?php if ($this->config->item('third_party_auth_providers')) : ?>
			<h3><?php echo sprintf(lang('sign_up_third_party_heading')); ?></h3>
			<ul>
				<?php foreach ($this->config->item('third_party_auth_providers') as $provider) : ?>
				<li class="third_party <?php echo $provider; ?>"><?php echo anchor('account/connect_'.$provider, lang('connect_'.$provider), array('title' => sprintf(lang('sign_up_with'), lang('connect_'.$provider)))); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div><!-- /span6 -->

	<div class="clearfix"></div>

	<div class="span6">
		<h3><?php echo lang('sign_up_heading'); ?></h3>

        <?php echo form_open(current_url(),'class="form-horizontal"');?>
        	<?php echo form_fieldset(); ?>
            	<?php echo $this->load->view('_form',array('sign_up' => TRUE)); ?>
        	<?php echo form_fieldset_close(); ?>
        <?php echo form_close();?>
	</div>
<?php endif;?>
