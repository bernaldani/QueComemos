<?php
/*
 * Connect_create Controller
 */
class Connect_create extends My_Controller {

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('language', 'account/ssl', 'url'));
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model(array('account/account_model', 'account/account_details_model', 'account/account_facebook_model', 'account/account_twitter_model', 'account/account_openid_model','account/ref_country_model', 'account/ref_language_model', 'account/ref_ethnicity_model'));
		$this->load->language(array('general', 'account/sign_up','account/connect_third_party', 'account/account_settings'));
		$this->page_title = 'Account create';
    	$this->current = 'account';
	}

	/**
	 * Complete facebook's authentication process
	 *
	 * @access public
	 * @return void
	 */
	function index()
	{
		$category = 'account_create_personal_social';
		$data['type'] = '';
		$this->assets_js[] = 'sign_up.fx.js';
		$this->assets_js[] = 'typeahead.min.js';
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));

		$data['countries'] = $this->ref_country_model->get_all();
		$data['languages'] = $this->ref_language_model->get_autocomplete_data();
		$data['ethnicity'] = $this->ref_ethnicity_model->get_autocomplete_data();

		// Redirect user to home if sign ups are disabled
		if ( ! ($this->config->item("sign_up_enabled"))) redirect('');

		// Redirect user to home if 'connect_create' session data doesn't exist
		if ( ! $this->session->userdata('connect_create')) redirect('');

		$data['connect_create'] = $this->session->userdata('connect_create');

		// Setup form validation
		$this->form_validation->set_error_delimiters('<span class="field_error">', '</span>');

		if($this->input->post('type',TRUE))
		{
			$data['type'] = $this->input->post('type',TRUE);
			if( $data['type'] == 'city')
			{
				$category = 'account_create_personal_social';
			}
			else
			{
				$category = 'account_create_company_social';
			}

		}
		// Run form validation
		if ($this->form_validation->run($category))
		{
			// Check if email already exist
			if ($this->email_check($this->input->post('email_address'), TRUE) === TRUE)
			{
				$data['connect_create_email_error'] = lang('connect_create_email_exist');
			}
			else
			{
				$data['connect_create'][1]['profile_type'] = $data['type'];

				if($data['type'] == 'city')
				{
					$data['connect_create'][1]['firstname'] = $this->input->post('firstname',TRUE);
					$data['connect_create'][1]['lastname'] = $this->input->post('lastname',TRUE);
					$data['connect_create'][1]['city'] = $this->input->post('city',TRUE);
					$data['connect_create'][1]['country'] = $this->input->post('country',TRUE);
					$data['connect_create'][1]['current_city'] = $this->input->post('current_city',TRUE);
					$data['connect_create'][1]['current_country'] = $this->input->post('current_country',TRUE);
					$data['connect_create'][1]['language'] = $this->input->post('language',TRUE);
					$data['connect_create'][1]['ethnicity'] = $this->input->post('ethnicity',TRUE);
					$data['connect_create'][1]['currency'] = $this->input->post('currency',TRUE);
					$data['connect_create'][1]['group'] = $this->input->post('group',TRUE);
				}
				else
				{
					$data['connect_create'][1]['company_name'] = $this->input->post('name',TRUE);
					$data['connect_create'][1]['company_address'] = $this->input->post('address',TRUE);
					$data['connect_create'][1]['company_phone'] = $this->input->post('phone',TRUE);
					$data['connect_create'][1]['company_website'] = $this->input->post('website',TRUE);
				}

				// Destroy 'connect_create' session data
				$this->session->unset_userdata('connect_create');


				// Create user
				$user_id = $this->account_model->create(NULL,$this->input->post('email_address', TRUE));

				// Add user details
				$this->account_details_model->update($user_id, $data['connect_create'][1]);

				// Connect third party account to user
				switch ($data['connect_create'][0]['provider'])
				{
					case 'facebook':
						$this->account_facebook_model->insert($user_id, $data['connect_create'][0]['provider_id']);
						break;
					case 'twitter':
						$this->account_twitter_model->insert($user_id, $data['connect_create'][0]['provider_id'], $data['connect_create'][0]['token'], $data['connect_create'][0]['secret']);
						break;
					case 'openid':
						$this->account_openid_model->insert($data['connect_create'][0]['provider_id'], $user_id);
						break;
				}

				// Run sign in routine
				$this->authentication->sign_in($user_id);
			}
		}

		$this->render_page('account/connect_create', isset($data) ? $data : NULL);
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

/* End of file connect_create.php */
/* Location: ./application/account/controllers/connect_create.php */
