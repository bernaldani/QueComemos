<?php
/*
 * Sign_up Controller
 */
class Sign_up extends My_Controller {

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('language', 'account/ssl', 'url'));
		$this->load->library(array('account/authentication', 'account/authorization', 'account/recaptcha', 'form_validation'));
		$this->load->model(array('account/account_model', 'account/account_details_model','account/ref_country_model', 'account/ref_language_model', 'account/ref_ethnicity_model', 'account/ref_currency_model'));
		$this->load->language(array('general', 'account/sign_up', 'account/connect_third_party', 'account/account_settings'));
		$this->page_title = 'Account create';
    	$this->current = 'account';
	}

	/**
	 * Account sign up
	 *
	 * @access public
	 * @return void
	 */
	function index()
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));

		$this->assets_js[] = 'sign_up.fx.js';
		$this->assets_js[] = 'typeahead.min.js';
		// Redirect signed in users to homepage
		if ($this->authentication->is_signed_in()) redirect('');

		// Check recaptcha
		$recaptcha_result = $this->recaptcha->check();

		// Store recaptcha pass in session so that users only needs to complete captcha once
		if ($recaptcha_result === TRUE) $this->session->set_userdata('sign_up_recaptcha_pass', TRUE);

		$category = 'account_create_personal';
		$data['type'] = '';
		$data['countries'] = $this->ref_country_model->get_all();
		$data['languages'] = $this->ref_language_model->get_autocomplete_data();
		$data['ethnicity'] = $this->ref_ethnicity_model->get_autocomplete_data();
		$data['currencies']  = $this->ref_currency_model->get_all();

		// Setup form validation
		$this->form_validation->set_error_delimiters('<span class="field_error">', '</span>');

		if($this->input->post('type',TRUE))
		{
			$data['type'] = $this->input->post('type',TRUE);
			if( $data['type'] == 'city')
			{
				$category = 'account_create_personal';
			}
			else
			{
				$category = 'account_create_company';
			}

		}

		// Run form validation
		if (($this->form_validation->run($category)) && ($this->config->item("sign_up_enabled")))
		{

			// Check if email already exist
			if ($this->email_check($this->input->post('email_address')) === TRUE)
			{
				$data['connect_create_email_error'] = lang('sign_up_email_exist');
			}
			// Either already pass recaptcha or just passed recaptcha
			elseif ( ! ($this->session->userdata('sign_up_recaptcha_pass') == TRUE || $recaptcha_result === TRUE) && $this->config->item("sign_up_recaptcha_enabled") === TRUE)
			{
				$data['sign_up_recaptcha_error'] = $this->input->post('recaptcha_response_field') ? lang('sign_up_recaptcha_incorrect') : lang('sign_up_recaptcha_required');
			}
			else
			{
				// Remove recaptcha pass
				$this->session->unset_userdata('sign_up_recaptcha_pass');

				$attr['profile_type'] = $data['type'];

				if($data['type'] == 'city')
				{
					$attr['firstname'] = $this->input->post('firstname',TRUE);
					$attr['lastname'] = $this->input->post('lastname',TRUE);
					$attr['city'] = $this->input->post('city',TRUE);
					$attr['country'] = $this->input->post('country',TRUE);
					$attr['current_city'] = $this->input->post('current_city',TRUE);
					$attr['current_country'] = $this->input->post('current_country',TRUE);
					$attr['language'] = $this->input->post('language',TRUE);
					$attr['ethnicity'] = $this->input->post('ethnicity',TRUE);
					$attr['currency'] = $this->input->post('currency',TRUE);
					$attr['group'] = $this->input->post('group',TRUE);
				}
				else
				{
					$attr['company_name'] = $this->input->post('name',TRUE);
					$attr['company_address'] = $this->input->post('address',TRUE);
					$attr['company_phone'] = $this->input->post('phone',TRUE);
					$attr['company_website'] = $this->input->post('website',TRUE);
				}

				// Create user
				$user_id = $this->account_model->create(NULL, $this->input->post('email_address', TRUE), $this->input->post('sign_up_password', TRUE));

				// Add user details (auto detected country, language, timezone)
				$this->account_details_model->update($user_id,$attr);

				// Auto sign in?
				if ($this->config->item("sign_up_auto_sign_in"))
				{
					// Run sign in routine
					$this->authentication->sign_in($user_id);
				}
				redirect('account/sign_in');
			}
		}

		// Load recaptcha code
		if ($this->config->item("sign_up_recaptcha_enabled") === TRUE) if ($this->session->userdata('sign_up_recaptcha_pass') != TRUE) $data['recaptcha'] = $this->recaptcha->load($recaptcha_result, $this->config->item("ssl_enabled"));

		// Load sign up view
		$this->render_page('sign_up', isset($data) ? $data : NULL);
	}

	/**
	 * Check if a username exist
	 *
	 * @access public
	 * @param string
	 * @return bool
	 */
	function username_check($username)
	{
		return $this->account_model->get_by_username($username) ? TRUE : FALSE;
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


/* End of file sign_up.php */
/* Location: ./application/controllers/account/sign_up.php */
