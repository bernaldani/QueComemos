<div class="well">
	<div class="span4">

		<?php echo validation_errors() ?>
		<?php if(isset($connect_create) && $connect_create[0]['provider'] != 'twitter') : ?>
			<div class="control-group <?php echo (form_error('email_address') || isset($connect_create_email_error)) ? 'error' : ''; ?>">
				<?php echo form_label('Email address *','email_address');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'email_address',
					'type'=>'text',
					'value'=> set_value('email_address',isset($connect_create[0]['email']) ? $connect_create[0]['email'] : ''),
					'placeholder'=>'Enter your email address',
					'title'=>'Email address'
					)); ?>
				<?php echo form_error('email_address');?>

				<?php echo isset($connect_create_email_error) ? $connect_create_email_error : '';?>
			</div>

			<div class="control-group <?php echo (form_error('firstname')) ? 'error' : ''; ?>">
				<?php echo form_label('First Name *','firstname');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'firstname',
					'type'=>'text',
					'value'=> set_value('firstname',isset($connect_create[1]['firstname']) ? $connect_create[1]['firstname'] : ''),
					'placeholder'=>'Enter your first name',
					'title'=>'First Name'
					)); ?>
				<?php echo form_error('firstname');?>
			</div>

			<div class="control-group <?php echo (form_error('lastname')) ? 'error' : ''; ?>">
				<?php echo form_label('Last Name','lastname');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'lastname',
					'type'=>'text',
					'value'=> set_value('lastname',isset($connect_create[1]['lastname']) ? $connect_create[1]['lastname'] : ''),
					'placeholder'=>'Enter your last name',
					'title'=>'Last Name'
					));?>
				<?php echo form_error('lastname');?>
			</div>
		<?php else:?>
			<div class="control-group <?php echo (form_error('email_address') || isset($connect_create_email_error)) ? 'error' : ''; ?>">
				<?php echo form_label('Email address *','email_address');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'email_address',
					'type'=>'text',
					'value'=> set_value('email_address'),
					'placeholder'=>'Enter your email address',
					'title'=>'Email address'
					)); ?>
				<?php echo form_error('email_address');?>

				<?php echo isset($connect_create_email_error) ? $connect_create_email_error : '';?>
			</div>

			<div class="control-group <?php echo (form_error('firstname')) ? 'error' : ''; ?>">
				<?php echo form_label('First Name *','firstname');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'firstname',
					'type'=>'text',
					'value'=> set_value('firstname'),
					'placeholder'=>'Enter your first name',
					'title'=>'First Name'
					)); ?>
				<?php echo form_error('firstname');?>
			</div>

			<div class="control-group <?php echo (form_error('lastname')) ? 'error' : ''; ?>">
				<?php echo form_label('Last Name *','lastname');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'lastname',
					'type'=>'text',
					'value'=> set_value('lastname'),
					'placeholder'=>'Enter your last name',
					'title'=>'Last Name'
					));?>
				<?php echo form_error('lastname');?>
			</div>
		<?php endif;?>

		<?php if ($sign_up) : ?>
			<div class="control-group <?php echo (form_error('sign_up_password')) ? 'error' : ''; ?>">
				<?php echo form_label('Password *', 'sign_up_password');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'sign_up_password',
					'type'=>'password',
					'value'=> set_value('sign_up_password'),
					'placeholder'=>'Password *',
					'title'=>'Password'
					)); ?>
				<?php echo form_error('sign_up_password');?>
			</div>
		<?php endif; ?>

	    <div class="control-group <?php echo (form_error('language')) ? 'error' : ''; ?>">
	      <?php echo form_label('Mother Tongue','language');?>
	      <?php echo form_input('language', set_value('language'),'id="language" placeholder="Type your mother tongue" class=""');?>
	    </div>

	    <div class="control-group <?php echo (form_error('ethnicity')) ? 'error' : ''; ?>">
	      <?php echo form_label('Ethnicity','ethnicity');?>
	      <?php echo form_input('ethnicity', set_value('ethnicity'),'id="ethnicity" placeholder="Type your ethnicity" class=""');?>
	    </div>

		<div class="control-group <?php echo (form_error('currency')) ? 'error' : ''; ?>">
			<?php echo form_label('Default Currency','currency');?>
			<select id="currency" name="currency" class="select">
                <option value=""><?php echo lang('settings_select'); ?></option>
                <?php foreach ($currencies as $currency) : ?>
                    <option value="<?php echo $currency->alpha; ?>"<?php if (set_value('currency') == $currency->alpha) echo ' selected="selected"'; ?>>
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
				'value'=> set_value('group'),
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
				'value'=> set_value("city"),
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
                    <option value="<?php echo $country->alpha2; ?>"<?php if (set_value('country') == $country->alpha2) echo ' selected="selected"'; ?>>
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
				'value'=> set_value('current_city'),
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
                    <option value="<?php echo $country->alpha2; ?>"<?php if (set_value('current_country') == $country->alpha2) echo ' selected="selected"'; ?>>
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
				echo form_dropdown('type', $options, set_value('type'),'id="type" onChange="show_extra_fields();"');?>
			<?php echo form_error('type');?>
		</div>

		<div id="company_info" style="display:none;">
			<div class="control-group <?php echo (form_error('name')) ? 'error' : ''; ?>">
				<?php echo form_label('Company Name','name');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'name',
					'type'=>'text',
					'value'=> set_value('name'),
					'placeholder'=>'Company Name',
					'title'=>'Company Name'
					)); ?>
				<?php echo form_error('name');?>
			</div>

			<div class="control-group <?php echo (form_error('address')) ? 'error' : ''; ?>">
				<?php echo form_label('Company Address','address');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'address',
					'type'=>'text',
					'value'=> set_value('address'),
					'placeholder'=>'Company Address',
					'title'=>'Company Address'
					)); ?>
				<?php echo form_error('address');?>
			</div>

			<div class="control-group <?php echo (form_error('phone')) ? 'error' : ''; ?>">
				<?php echo form_label('Company Photo','phone');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'phone',
					'type'=>'text',
					'value'=> set_value('phone'),
					'placeholder'=>'Company phone',
					'title'=>'Company phone'
					)); ?>
				<?php echo form_error('phone');?>
			</div>

			<div class="control-group <?php echo (form_error('website')) ? 'error' : ''; ?>">
				<?php echo form_label('Website','website');?>
				<?php echo form_input(array(
					'class'=>'span4',
					'name'=>'website',
					'type'=>'text',
					'value'=> set_value('website'),
					'placeholder'=>'Website',
					'title'=>'Website'
					)); ?>
				<?php echo form_error('website');?>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="form-group" style="padding:21px 18px 0;">
		<?php if (isset($recaptcha)) :
			echo $recaptcha;
			if (isset($sign_up_recaptcha_error)) : ?>
				<span class="field_error"><?php echo $sign_up_recaptcha_error; ?></span>
			<?php endif; ?>
		<?php endif; ?>

		<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-warning btn-lg pull-right', 'content' => '<span class="glyphicon glyphicon-pencil"></span> '.lang('sign_up_create_my_account'))); ?>
		<p class="pull-left"><?php echo lang('sign_up_already_have_account'); ?> <?php echo anchor('account/sign_in', lang('sign_up_sign_in_now')); ?></p>

	</div>
</div>

<script type="text/javascript">
    var ethnicity = <?php echo json_encode($ethnicity) ?>;
    var language = <?php echo json_encode($languages) ?>;
    var currency = <?php echo json_encode($currency) ?>;
</script>
