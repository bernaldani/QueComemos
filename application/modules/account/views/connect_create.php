<h2><?php echo lang('connect_create_account'); ?></h2>

<?php echo form_open(current_url(),'class="form-horizontal"');?>
    <?php echo form_fieldset(); ?>
        <?php echo $this->load->view('_form',array('sign_up' => FALSE)); ?>
    <?php echo form_fieldset_close(); ?>
<?php echo form_close();?>
