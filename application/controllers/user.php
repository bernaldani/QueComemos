<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends REST_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->config('account/account');
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->language(array('general', 'account/sign_up', 'account/connect_third_party', 'account/account_settings'));
		$this->load->helper(array('language', 'account/ssl', 'url'));
		$this->load->model(array('account/account_model', 'account/account_details_model', 'account/account_facebook_model'));

        $this->methods['fblogin_post']['key'] = false;
        $this->methods['twlogin_post']['key'] = false;
        $this->methods['login_post']['key'] = false;
    }

    function fblogin_post()
	{
		$facebook_id = $this->post('facebook_id');

		$user = $this->account_facebook_model->get_by_facebook_id($facebook_id);
		// Run sign in routine

		if($user)
		{
			$this->authentication->sign_in($user->account_id);

			$this->response(array('status' => 'success', 'message' => 'Inicio de sesion exitoso'), 200);
		}
		else
		{
			$email = $this->post('email');

			$attributes = array(
					'firstname' => $this->post('firstname'),
					'lastname' 	=> $this->post('lastname')
				);

			$account_id = $this->account_model->create(null,$email,null);
			$this->account_details_model->update($account_id, $attributes);
			$this->account_facebook_model->insert($account_id, $facebook_id);

			$this->authentication->sign_in($account_id);

			$this->response(array('status' => 'success', 'message' => 'Cuenta creada con exito'), 200);
		}

	}

	function twlogin_post()
	{

	}

	function login_post()
	{
		// Check if email already exist
		if ($this->email_check($this->post('email')) === TRUE)
		{
			$user = $this->account_model->get_by_email($this->post('email'));

			// Check password
			if (!$user || ! $this->authentication->check_password($user->password, $this->post('password')))
			{
				$this->response(array('status' => 'error', 'message' => 'Usuario o contraseña no valida'), 401);
			}
			else
			{
				// Run sign in routine
				$this->authentication->sign_in($user->id);

				$this->response(array('status' => 'success', 'message' => 'Sesion iniciada con exito'), 200);
			}

		}
		else
		{
			$this->response(array('status' => 'error', 'message' => 'La cuenta no existe'), 102);
		}
	}

	function signup_post()
	{
			$attr['firstname'] = $this->input->post('firstname',TRUE);
			$attr['lastname'] = $this->input->post('lastname',TRUE);
			$attr['phone'] = $this->input->post('phone',TRUE);
			$attr['cel'] = $this->input->post('cel',TRUE);
			$attr['address'] = $this->input->post('address',TRUE);
			$attr['city'] = $this->input->post('city',TRUE);
			$attr['country'] = $this->input->post('country',TRUE);

			// Create user
			$user_id = $this->account_model->create(NULL, $this->input->post('email', TRUE), $this->input->post('password', TRUE));

			// Add user details (auto detected country, language, timezone)
			$this->account_details_model->update($user_id,$attr);

			$this->authentication->sign_in($user_id);
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