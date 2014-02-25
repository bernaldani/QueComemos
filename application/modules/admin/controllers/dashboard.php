<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->is_resto();
		$this->page_title = 'Panel de administración';
		$this->current = 'dashboard';

		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->helper(array('language', 'url', 'form', 'account/ssl','photo'));
	}

	public function index()
	{
		$this->render_page('dashboard/index');
	}

}
