<?php
/*
 * Account_profile Controller
 */
class Account_profile extends My_Controller {

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('language', 'account/ssl', 'url', 'photo'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation', 'gravatar'));
		$this->load->model(array('account/account_model', 'account/account_details_model'));
		$this->load->language(array('general', 'account/account_profile'));
		$this->current = 'account_profile';
		$this->page_title = 'Profile Image';
	}

	/**
	 * Account profile
	 */
	function index($action = NULL)
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));
		$data =array();
		// Redirect unauthenticated users to signin page
		if ( ! $this->authentication->is_signed_in())
		{
			redirect('account/sign_in/?continue='.urlencode(base_url().'account/account_profile'));
		}

		// Retrieve sign in user
		$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		// $data['account_details'] = $this->account_details_model->get_by_account_id($this->session->userdata('account_id'));

		// Retrieve user's gravatar if available
		$data['gravatar'] = $this->gravatar->get_gravatar( $data['account']->email );

		// Delete profile picture
		if ($action == 'delete')
		{
			unlink(IMG_DIR.'/user/profile/'.$data['account_details']->picture); // delete previous picture
			$this->account_details_model->update($data['account']->id, array('picture' => NULL));
			redirect('account/account_profile');
		}

		// Setup form validation
		$this->form_validation->set_error_delimiters('<div class="field_error">', '</div>');
		$this->form_validation->set_rules(array());

		// Run form validation
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

			switch( $this->input->post('pic_selection') )
			{
				case "gravatar":

					$this->account_details_model->update($data['account']->id, array('picture' => $data['gravatar']));
					redirect( current_url() );

				break;

				default:

					// If user has uploaded a file
					if (isset($_FILES['account_picture_upload']) && $_FILES['account_picture_upload']['error'] != 4)
					{
						// Load file uploading library - http://codeigniter.com/user_guide/libraries/file_uploading.html
						$this->load->library('upload', array('overwrite' => TRUE, 'upload_path' => IMG_DIR.'/user/profile', 'allowed_types' => 'jpg|png|gif', 'max_size' => '800' // kilobytes
						));

						/// Try to upload the file
						if ( ! $this->upload->do_upload('account_picture_upload'))
						{
							$data['profile_picture_error'] = $this->upload->display_errors('', '');
							$error = TRUE;
						}
						else
						{
							// Get uploaded picture data
							$picture = $this->upload->data();

							// Create picture thumbnail - http://codeigniter.com/user_guide/libraries/image_lib.html
							$this->load->library('image_lib');
							$this->image_lib->clear();
							$this->image_lib->initialize(array('image_library' => 'gd2', 'source_image' => IMG_DIR.'/user/profile/'.$picture['file_name'], 'new_image' => IMG_DIR.'/user/profile/pic_'.md5($data['account']->id).$picture['file_ext'], 'maintain_ratio' => FALSE, 'quality' => '100%', 'width' => 100, 'height' => 100));

							// Try resizing the picture
							if ( ! $this->image_lib->resize())
							{
								$data['profile_picture_error'] = $this->image_lib->display_errors();
								$error = TRUE;
							}
							else
							{
								$data['account_details']->picture = 'pic_'.md5($data['account']->id).$picture['file_ext'];
								$this->account_details_model->update($data['account']->id, array('picture' => $data['account_details']->picture));
							}

							// Delete original uploaded file
							unlink(IMG_DIR.'/user/profile/'.$picture['file_name']);
							redirect( current_url() );

						}
					}

				break;

			} // end switch

			if ( ! isset($error)) $data['profile_info'] = lang('profile_updated');
		}

		$this->render_page('account/account_profile', $data);
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

}


/* End of file account_profile.php */
/* Location: ./application/account/controllers/account_profile.php */