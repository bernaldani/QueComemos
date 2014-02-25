<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Setting Controller
 *
 * @author      Daniel Bernal <bernaldani@gmail.com>
 * @version     $Id$
 */

class Setting extends Admin_Controller
{
	/**
	 * Validation array
	 *
	 * @var array
	 */
	private $validation_rules = array();

	/**
	 * Constructor method
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('settings_m');
		$this->load->library(array('form_validation','pagination'));
		$this->page_title = 'Manage Settings';
		$this->current = 'setting';
		$this->is_admin();
	}

	/**
	 * Index method, lists all generic settings
	 *
	 * @return void
	 */
	public function index()
	{
		$setting = array();

		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			foreach($_POST as $slug => $value)
			{
				$setting[$slug] = $this->input->post($slug, TRUE);
			}

			$result = $this->wa_setting->update($setting);

			if($result)
			{
				$this->session->set_flashdata('app_success', 'Changes have been saved successfully!');
			}
		}

		$data['settings'] = $this->wa_setting->get_many_by();

		$this->render_page('admin/setting/index', isset($data) ? $data : NULL);
	}


	/**
	 * Sort settings items
	 *
	 * @return void
	 */
	public function ajax_update_order()
	{
		$slugs = explode(',', $this->input->post('order'));

		$i = 1000;
		foreach ($slugs as $slug)
		{
			$this->settings_m->update($slug, array(
				'order' => $i--,
				));
		}
	}

}

/* End of file admin.php */