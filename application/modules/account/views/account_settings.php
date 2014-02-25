	<?php if (isset($settings_info))
	{
	 ?>
	 <div class="alert alert-success fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $settings_info; ?>
	</div>
	<?php } ?>

	<h2><?php echo lang('settings_page_name'); ?></h2>

	<?php echo form_open(uri_string(), 'class="form-horizontal"'); ?>

			<div class="control-group <?php echo (form_error('settings_email') || isset($settings_email_error)) ? 'error' : ''; ?>">
					<label class="control-label" for="settings_email"><?php echo lang('settings_email'); ?></label>

					<div class="controls">
						<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $account->email ;?>" disabled>

						<?php //echo $account->email ; ?>
					</div>
			</div>

			<div class="control-group <?php echo (form_error('firstname')) ? 'error' : ''; ?>">
				<?php echo form_label('Firstname','firstname');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'firstname',
					'type'=>'text',
					'value'=> set_value('firstname',$account_details->firstname),
					'placeholder'=>'First Name *',
					'title'=>'First Name'
					)); ?>
				<?php echo form_error('firstname');?>
			</div>

		<div class="control-group <?php echo (form_error('lastname')) ? 'error' : ''; ?>">
			<?php echo form_label('Lastname','lastname');?>
			<?php echo form_input(array(
				'class'=>'span4',
				'name'=>'lastname',
				'type'=>'text',
				'value'=> set_value('lastname',$account_details->lastname),
				'placeholder'=>'Last Name *',
				'title'=>'Last Name'
				));?>
			<?php echo form_error('lastname');?>
		</div>

		<div class="control-group <?php echo (form_error('language')) ? 'error' : ''; ?>">
			<?php echo form_label('Mother Tongue','language');?>
			<?php echo form_input('language', set_value('language',$account_details->language),'id="language" placeholder="Mother tongue" class="span4"');?>
		</div>

		<div class="control-group <?php echo (form_error('ethnicity')) ? 'error' : ''; ?>">
			<?php echo form_label('Ethnicity','ethnicity');?>
			<?php echo form_input('ethnicity', set_value('ethnicity',$account_details->ethnicity),'id="ethnicity" placeholder="Ethnicity" class="span4"');?>
		</div>

		<div class="control-group <?php echo (form_error('currency')) ? 'error' : ''; ?>">
			<?php echo form_label('Default Currency','currency');?>
			<select id="currency" name="currency" class="select">
					<option value=""><?php echo lang('settings_select'); ?></option>
					<?php foreach ($currencies as $currency) : ?>
							<option value="<?php echo $currency->alpha; ?>"<?php if ($account_details->currency == $currency->alpha) echo ' selected="selected"'; ?>>
									<?php echo $currency->currency.' - ('.$currency->alpha.')'; ?>
							</option>
					<?php endforeach; ?>
			</select>
			<?php echo form_error('country');?>
		</div>

		<div class="control-group <?php echo (form_error('group')) ? 'error' : ''; ?>">
			<?php echo form_label('Income Group','group');?>
			<?php echo form_input(array(
				'class'=>'span4',
				'name'=>'group',
				'type'=>'text',
				'value'=> set_value('group',$account_details->group),
				'placeholder'=>'Income Group',
				'title'=>'Income Group'
				)); ?>
			<?php echo form_error('group');?>
		</div>

		<div class="control-group <?php echo (form_error('city')) ? 'error' : ''; ?>">
			<?php echo form_label('Home City','city');?>
			<?php echo form_input(array(
				'class'=>'span4',
				'name'=>'city',
				'type'=>'text',
				'value'=> set_value('city',$account_details->city),
				'placeholder'=>'Home City',
				'title'=>'Home City'
				)); ?>
			<?php echo form_error('city');?>
		</div>

		<div class="control-group <?php echo (form_error('country')) ? 'error' : ''; ?>">
			<?php echo form_label('Home Country','country');?>
			<select id="country" name="country" class="select">
					<option value=""><?php echo lang('settings_select'); ?></option>
					<?php foreach ($countries as $country) : ?>
							<option value="<?php echo $country->alpha2; ?>"<?php if ($account_details->country == $country->alpha2) echo ' selected="selected"'; ?>>
									<?php echo $country->country; ?>
							</option>
					<?php endforeach; ?>
			</select>
			<?php echo form_error('country');?>
		</div>

		<div class="control-group <?php echo (form_error('current_city')) ? 'error' : ''; ?>">
			<?php echo form_label('Current City','current_city');?>
			<?php echo form_input(array(
				'class'=>'span4',
				'name'=>'current_city',
				'type'=>'text',
				'value'=> set_value('city',$account_details->current_city),
				'placeholder'=>'Current City',
				'title'=>'Current City'
				)); ?>
			<?php echo form_error('current_city');?>
		</div>

		<div class="control-group <?php echo (form_error('current_country')) ? 'error' : ''; ?>">
			<?php echo form_label('Current Country','current_country');?>
			<select id="current_country" name="current_country" class="select">
					<option value=""><?php echo lang('settings_select'); ?></option>
					<?php foreach ($countries as $country) : ?>
							<option value="<?php echo $country->alpha2; ?>"<?php if ($account_details->current_country == $country->alpha2) echo ' selected="selected"'; ?>>
									<?php echo $country->country; ?>
							</option>
					<?php endforeach; ?>
			</select>
			<?php echo form_error('current_country');?>
		</div>

		<div class="control-group <?php echo (form_error('type')) ? 'error' : ''; ?>">
			<?php echo form_label('Profile Type','type');?>
			<?php $options = array(
				'' => '- Select Profile Type - ',
				'city' => 'City User',
				'event' => 'Event Account',
				'restaurant' => 'Restaurant Account',
				'retail' => 'Retail Account',
				'hotel' => 'Hotel Account'
				);
			?>
			<div class="controls">
					<select id="type" name="profile_type" class="select" onchange="show_extra_fields();">
							<?php foreach ($options as $key => $value) : ?>
									<option value="<?php echo $key; ?>"<?php if ($account_details->profile_type == $key) echo ' selected="selected"'; ?>>
											<?php echo $value; ?>
									</option>
							<?php endforeach; ?>
					</select>
			</div>
		</div>

		<div id="company_info" <?php echo $account_details->profile_type == 'city' ? 'style="display:none;"' : '' ?>>
			<div class="control-group <?php echo (form_error('company_name')) ? 'error' : ''; ?>">
				<?php echo form_label('Company Name','company_name');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'company_name',
					'type'=>'text',
					'value'=> set_value('company_name',$account_details->company_name),
					'placeholder'=>'Company Name',
					'title'=>'Company Name'
					)); ?>
				<?php echo form_error('company_name');?>
			</div>

			<div class="control-group <?php echo (form_error('company_address')) ? 'error' : ''; ?>">
				<?php echo form_label('Company Address','company_address');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'company_address',
					'type'=>'text',
					'value'=> set_value('company_address',$account_details->company_address),
					'placeholder'=>'Company Address',
					'title'=>'Company Address'
					)); ?>
				<?php echo form_error('company_address');?>
			</div>

			<div class="control-group <?php echo (form_error('company_phone')) ? 'error' : ''; ?>">
				<?php echo form_label('Company Phone','company_phone');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'company_phone',
					'type'=>'text',
					'value'=> set_value('company_phone',$account_details->company_phone),
					'placeholder'=>'Company phone',
					'title'=>'Company phone'
					)); ?>
				<?php echo form_error('company_phone');?>
			</div>

			<div class="control-group <?php echo (form_error('company_website')) ? 'error' : ''; ?>">
				<?php echo form_label('Website','company_website');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'company_website',
					'type'=>'text',
					'value'=> set_value('company_website',$account_details->company_website),
					'placeholder'=>'Website',
					'title'=>'Website'
					)); ?>
				<?php echo form_error('company_website');?>
			</div>
		</div>

			<div class="form-actions">
					<button type="submit" class="btn btn-primary"><?php echo lang('settings_save'); ?></button>
			</div>

	<?php echo form_close(); ?>

<script type="text/javascript">
		var ethnicity = <?php echo json_encode($ethnicity) ?>;
		var language = <?php echo json_encode($languages) ?>;
</script>