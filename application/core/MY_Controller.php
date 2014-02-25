<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Base Controller
 *
 */
class My_Controller extends CI_Controller
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
    public $account = '';
    public $account_details = '';

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
            'less/custom.css',
            'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=latin,latin-ext',
            'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace',
            'less/jquery.maximage.css',
            );

        $this->assets_js = array(
            'jquery.pikaday.js',
            'jquery.djax.js',
            'jquery.ba-throttle-debounce.min.js',
            'transition.js',
            'carousel.js',
            'transit.js',
            'jquery.cycle.all.js',
            'jquery.maximage.js',
            'jquery.colorbox-min.js',
            'owl.carousel.js',
            'sly.min.js',
            'main.js',
            );

        //$this->template->set('is_frontend', true);

        //$this->output->enable_profiler(TRUE);
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
                    $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/frontend/' . $asset . '" media="screen" />');
                else
                    $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . $asset . '" media="screen" />');
        }

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
                    $this->template->append_fmetadata('<script type="text/javascript" src="' . $this->config->item('base_url') . 'assets/frontend/js/' . $asset . '"></script>');
                else
                    $this->template->append_fmetadata('<script type="text/javascript" src="' . $asset . '"></script>');
        }

        $this->template->append_metadata('<script type="text/javascript" src="' . $this->config->item('base_url') . 'assets/frontend/js/jquery-2.0.3.min.js"></script>');
        $this->template->append_metadata('<script type="text/javascript" src="' . $this->config->item('base_url') . 'assets/frontend/js/modernizr-2.6.2.min.js"></script>');
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
     * Renders page
     */
    public function render_page($page, $data = array())
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
            ->set('body_class', implode(' ', $this->body_class))
            ->set('page_title', $this->page_title);

        $this->template
            ->set_partial('flash_messages', 'partials/flash_messages')
            ->set_partial('header', 'partials/header')
            ->set_partial('footer', 'partials/footer');

        // Renders the main layout
        $this->template->build($page, $data);
    }
}
