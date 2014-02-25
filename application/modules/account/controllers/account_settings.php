<?php
/*
 * Account_settings Controller
 */
class Account_settings extends My_Controller {

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('date', 'language', 'account/ssl', 'url'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'account/account_details_model' ));
		$this->load->language(array('general', 'account/account_settings'));
		$this->current = 'account_settings';
		$this->page_title = 'Account Settings';
	}

	/**
	 * Account settings
	 */
	function index()
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));
		// Redirect unauthenticated users to signin page
		if ( ! $this->authentication->is_signed_in())
		{
			redirect('account/sign_in/?continue='.urlencode(base_url().'account/account_settings'));
		}

		// Retrieve sign in user
		//$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));

		// Setup form validation
		$this->form_validation->set_error_delimiters('<div class="field_error">', '</div>');
		$this->form_validation->set_rules(array(array('field' => 'settings_fullname', 'label' => 'lang:settings_fullname', 'rules' => 'trim|max_length[160]'), array('field' => 'settings_firstname', 'label' => 'lang:settings_firstname', 'rules' => 'trim|max_length[80]'), array('field' => 'settings_lastname', 'label' => 'lang:settings_lastname', 'rules' => 'trim|max_length[80]'), array('field' => 'settings_postalcode', 'label' => 'lang:settings_postalcode', 'rules' => 'trim|max_length[40]')));


		// Run form validation
		if ($this->form_validation->run())
		{
			$attributes['firstname'] = $this->input->post('firstname', TRUE) ? $this->input->post('firstname', TRUE) : NULL;
			$attributes['lastname'] = $this->input->post('lastname', TRUE) ? $this->input->post('lastname', TRUE) : NULL;
			$attributes['fullname'] = $attributes['firstname'].' '.$attributes['lastname'];
			$attributes['city'] = $this->input->post('city', TRUE) ? $this->input->post('city', TRUE) : NULL;
			$attributes['country'] = $this->input->post('country', TRUE) ? $this->input->post('country', TRUE) : NULL;
			$attributes['language'] = $this->input->post('language', TRUE) ? $this->input->post('language', TRUE) : NULL;
			$attributes['timezone'] = NULL;
			$attributes['ethnicity'] = $this->input->post('ethnicity', TRUE) ? $this->input->post('ethnicity', TRUE) : NULL;
			$attributes['currency'] = $this->input->post('currency', TRUE) ? $this->input->post('currency', TRUE) : NULL;
			$attributes['group'] = $this->input->post('group', TRUE) ? $this->input->post('group', TRUE) : NULL;
			$attributes['profile_type'] = $this->input->post('profile_type', TRUE) ? $this->input->post('profile_type', TRUE) : NULL;
			$attributes['company_name'] = $this->input->post('company_name', TRUE) ? $this->input->post('company_name', TRUE) : NULL;
			$attributes['company_address'] = $this->input->post('company_address', TRUE) ? $this->input->post('company_address', TRUE) : NULL;
			$attributes['company_phone'] = $this->input->post('company_phone', TRUE) ? $this->input->post('company_phone', TRUE) : NULL;
			$attributes['company_website'] = $this->input->post('company_website', TRUE) ? $this->input->post('company_website', TRUE) : NULL;

			if($this->input->post('profile_type', TRUE) == 'city')
			{
				$attributes['company_name'] = NULL;
				$attributes['company_address'] = NULL;
				$attributes['company_phone'] = NULL;
				$attributes['company_website'] = NULL;
			}

			$this->account_details_model->update($this->session->userdata('account_id'), $attributes);

			$data['settings_info'] = lang('settings_details_updated');

			$this->session->set_flashdata('app_success', lang('settings_details_updated'));

			redirect('account');

		}

		$this->render_page('account/account_settings', $data);
	}

	/**
	 * Check if an email exist
	 *
	 * @access public
	 * @param string
	 * @return bool
	 */
	function email_check($email)
	{
		return $this->account_model->get_by_email($email) ? TRUE : FALSE;
	}

}


/* End of file account_settings.php */
/* Location: ./application/account/controllers/account_settings.php */