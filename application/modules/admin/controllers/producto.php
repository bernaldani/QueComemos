<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->is_resto();
		$this->page_title = 'Administrar la Carta';
		$this->current = 'food';

		$this->load->helper(array('language', 'url', 'form', 'account/ssl','photo'));
	}

	public function index()
	{
		$this->render_page('producto/index');
	}

	public function agregar()
	{
		$this->render_page('producto/add');
	}

	public function ver($id)
	{
		$this->render_page('producto/view');
	}

	public function editar($id)
	{
		$this->render_page('producto/edit');
	}

	public function borrar($id)
	{
		//$this->render_page('producto/borrar');
	}

}
