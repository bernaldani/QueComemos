<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Base Controller
 *
 */
class Admin_Controller extends CI_Controller
{

    public $assets_css;
    /**
     * Site Title
     *
     * @var string
     */
    public $site_title = '';

    /**
     * Page Title
     *
     * @var string
     */
    public $page_title = '';

    /**
     * Page Meta Keywords
     *
     * @var string
     */
    public $page_meta_keywords = '';

    /**
     * Page Meta Description
     *
     * @var string
     */
    public $page_meta_description = '';

    /**
     * JS Calls on DOM Ready
     *
     * @var array
     */
    public $js_domready = array();

    /**
     * JS Calls on window load
     *
     * @var array
     */
    public $js_windowload = array();

    /**
     * Body classes
     *
     * @var array
     */
    public $body_class = array();

    /**
     * Current section
     *
     * @var string
     */
    public $current = '';

    /**
     * Class Constructor
     */
    public function __construct()
    {
        // Call Parent Constructor
        parent::__construct();

        // Site Page Title
        $this->site_title = $this->config->item('app_title');

        // Initialize array with assets we use site wide
        $this->assets_css = array(
            'admin/css/bootstrap.min.css',
            'admin/css/navbar-static-top.css'
            //'admin/fonts/css/font-awesome.min.css',
            );
        $this->assets_js = array(
            'admin/js/jquery.min.js',
            'admin/js/bootstrap.min.js'
            );

    }

    /**
     * Prepare BASE Javascript
     */
    private function prepare_base_javascript()
    {
        $str = "<script type=\"text/javascript\">\n";

        if (count($this->js_domready) > 0)
        {
            $str.= "$(document).ready(function() {\n";
            $str.= implode("\n", $this->js_domready) . "\n";
            $str.= "});\n";
        }

        if (count($this->js_windowload) > 0)
        {
            $str.= "$(window).load(function() {\n";
            $str.= implode("\n", $this->js_windowload) . "\n";
            $str.= "});\n";
        }

        $str.= "</script>\n";
        $this->template->append_metadata($str);
    }

    /**
     * Set CSS Meta
     */
    private function set_styles()
    {
        if (count($this->assets_css) > 0)
        {
            foreach($this->assets_css as $asset)
                if (stristr($asset, 'http') === FALSE)
                    $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/' . $asset . '" media="screen" />');
                else
                    $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . $asset . '" media="screen" />');
        }
    }

     /**
     * Check current user is admin
     */
    function is_admin()
    {
        $this->load->library(array('account/authentication', 'account/authorization'));

        if(! $this->authentication->is_signed_in() )
        {
            $this->session->set_flashdata('app_alert', 'Inicia sesion primero.');
            redirect('login');
        }
        else
        {
            if ( ! $this->authorization->is_admin())
            {
                $this->session->set_flashdata('app_alert', 'No tienes los permisos suficientes para acceder aqui.');
                redirect('home');
            }
        }
    }

    /**
     * Check current user is admin or resto
     */
    function is_resto()
    {
        $this->load->library(array('account/authentication', 'account/authorization'));

        if(! $this->authentication->is_signed_in() )
        {
            $this->session->set_flashdata('app_alert', 'Inicia sesion primero.');
            redirect('login');
        }
        else
        {
            if ( ! ($this->authorization->is_admin() || $this->authorization->is_resto()))
            {
                $this->session->set_flashdata('app_alert', 'No tienes los permisos suficientes para acceder aqui.');
                redirect('home');
            }
        }
    }

    private function is_loged_in()
    {
        $this->load->library(array('account/authentication', 'account/authorization'));

        if ($this->authentication->is_signed_in())
        {
            $this->load->model(array('account/account_model','account/account_details_model'));
            $this->account = $this->account_model->get_by_id($this->session->userdata('account_id'));
            $this->account_details = $this->account_details_model->get_by_account_id($this->session->userdata('account_id'));

            return true;
        }
        return false;
    }

    /**
     * Set Javascript Meta
     */
    private function set_javascript()
    {
        if (count($this->assets_js) > 0)
        {
            foreach($this->assets_js as $asset)
                if (stristr($asset, 'http') === FALSE)
                    $this->template->append_fmetadata('<script type="text/javascript" src="' . $this->config->item('base_url') . 'assets/' . $asset . '"></script>');
                else
                    $this->template->append_fmetadata('<script type="text/javascript" src="' . $asset . '"></script>');
        }

        $this->template->append_fmetadata('<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->');
    }

    /**
     * Renders page
     */
    function render_page($page, $data = array())
    {
        // Renders the whole page
        $this->template
            ->set_metadata('keywords', $this->page_meta_keywords)
            ->set_metadata('description', $this->page_meta_description)
            ->set_metadata('canonical', site_url($this->uri->uri_string()), 'link')
            ->title($this->page_title, $this->site_title);

        $this->set_styles();
        $this->set_javascript();
        $this->prepare_base_javascript();

        if($this->is_loged_in())
        {
            $this->template
                ->set('account', $this->account)
                ->set('account_details', $this->account_details);
        }

        // Set global template vars
        $this->template
            ->set('current', $this->current)
            ->set('body_class', implode(' ', $this->body_class));

        $this->template->set_layout('admin_layout');

        $this->template
            ->set_partial('flash_messages', 'partials/flash_messages')
            ->set_partial('header', 'partials/header_admin')
            ->set_partial('sidebar', 'partials/sidebar_admin')
            ->set_partial('footer', 'partials/footer_admin');

        // Renders the main layout
        $this->template->build($page, $data);
    }
}
