<h2 class="pageTitle"><?php echo $this->page_title;?></h2>
<?php echo form_open_multipart($this->uri->uri_string(), 'class="well form-horizontal"'); ?>
	<fieldset>
		<?php if ($settings->num_rows() > 0): ?>
			<?php foreach($settings->result() as $setting):?>
				<div class="form-group">
					<label for="<?php echo $setting->slug; ?>" class="col-md-3 col-sm-3 control-label"><?php echo $setting->title; ?></label>
					<div class="col-md-9 col-sm-9">
						<?php if($setting->slug == 'ga_password'):?>
							<?php echo form_password($setting->slug, set_value($setting->slug, ($setting->value != '') ? $setting->value :  $setting->default), 'class="form-control" id="'.$setting->slug.'" placeholder="Enter value"'); ?>
						<?php else:?>
							<?php echo form_input($setting->slug, set_value($setting->slug, ($setting->value != '') ? $setting->value :  $setting->default), 'class="form-control" id="'.$setting->slug.'" placeholder="Enter value"'); ?>
						<?php endif;?>
						<?php echo form_error($setting->slug) ?>
						<span class="help-block"><?php $setting->description;?></span>
					</div>
				</div>
			<?php endforeach;?>
			<div class="text-right">
				<a href="<?php site_url('admin') ;?>" class="btn btn-danger">Cancel</a>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		<?php else: ?>
			<div class="control-group">
				There are no results.
			</div>
		<?php endif ?>
	</fieldset>
<?php echo form_close(); ?>