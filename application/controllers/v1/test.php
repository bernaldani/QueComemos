<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('test/index');
    }
}