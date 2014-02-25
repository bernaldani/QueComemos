<?php
/*
 * Manage_Feeds Controller
 */
class Manage_feeds extends Admin_Controller {

	/**
	* Constructor
	*/
	function __construct()
	{
		parent::__construct();

	// Load the necessary stuff...
		$this->load->library(array('Wa_Feeds','pagination','form_validation'));
		$this->load->helper(array('photo','phrase'));
		$this->current = 'manage_feeds';
		$this->is_admin();
	}

	/**
	* Manage Feeds
	*/
	function index($offset = null)
	{
       	$limit = $this->wa_setting->get('per_page');
		$data['feeds'] = $this->wa_feeds->get_feeds($offset);

		$total_rows = $this->wa_feeds->count_all_feeds();

		$config['base_url'] = site_url('admin/manage_feeds');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		// Load manage feeds view
		$this->page_title = 'Manage Feeds';
    	$this->render_page('feeds/index',$data);
	}

	/**
	* Manage Feeds
	*/
	function feed($feed_type, $offset = null)
	{
       	$limit = $this->wa_setting->get('per_page');

		$data['feeds'] = $this->wa_feeds->get_feed_by_where(array('worthy_type'=>$feed_type), $offset);

		$total_rows = $this->wa_feeds->count_by_where(array('worthy_type'=>$feed_type));

		$config['base_url'] = site_url('admin/manage_feeds/'.$feed_type);
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['feed_type'] = $feed_type;

		// Load manage feeds view
		$this->page_title = 'Manage '.$feed_type.' Feeds';
    	$this->render_page('feeds/index',$data);
	}

	function edit($id)
	{
		$this->load->model(array('account/ref_country_model'));
		$this->assets_js[] = 'typeahead.min.js';
		$this->assets_js[] = 'admin.fx.js';

		$data['feed'] = $this->wa_feeds->get_feed_by_id($id);
		$data['food'] = $this->feed_model->get_autocomplete_data('food');
		$data['restaurant'] = $this->feed_model->get_autocomplete_data('restaurant');
		$data['item'] = $this->feed_model->get_autocomplete_data('item');
		$data['brand'] = $this->feed_model->get_autocomplete_data('brand');
		$data['place'] = $this->feed_model->get_autocomplete_data('place');
		$data['countries'] = $this->ref_country_model->get_all();
		$worthy_type = $data['feed']->worthy_type;

		if($worthy_type != 'out')
		{
			// Map
			$this->load->library('googlemaps');
			$config['apiKey'] = 'AIzaSyBlPUnwjO3V5YuT_OPC9ZzevYicNF5Og5k';
			$config['zoom'] = '14';
			$config['center'] = $data['feed']->lat.','.$data['feed']->long;
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['draggable'] = TRUE;
			$marker['position'] = $data['feed']->lat.','.$data['feed']->long;
			$marker['ondragend'] = '$(\'input[name="lat"]\').val(event.latLng.lat()); $(\'input[name="long"]\').val(event.latLng.lng());';
			$this->googlemaps->add_marker($marker);
			$data['map'] = $this->googlemaps->create_map();
		}

		if( $worthy_type == 'eat')
		{
			$category = 'post_eat';
		}

		if( $worthy_type == 'get')
		{
			$category = 'post_get';
		}

		if( $worthy_type == 'out')
		{
			if ($this->input->post('event_location') == 'event')
				$category = 'post_out_event';
			else
				$category = 'post_out_location';
		}

		if ($this->form_validation->run($category))
		{
			$attr['id'] = $id;
			$attr['food_name'] = $this->input->post('food_name', TRUE) ? $this->input->post('food_name', TRUE) : NULL;
			$attr['taste'] = $this->input->post('taste', TRUE) ? $this->input->post('taste', TRUE) : NULL;
			$attr['restaurant_name'] = $this->input->post('restaurant_name', TRUE) ? $this->input->post('restaurant_name', TRUE) : NULL;
			$attr['authentic'] = $this->input->post('authentic', TRUE) ? $this->input->post('authentic', TRUE) : NULL;
			$attr['price'] = $this->input->post('price', TRUE) ? $this->input->post('price', TRUE) : NULL;
			$attr['item_name'] = $this->input->post('item_name', TRUE) ? $this->input->post('item_name', TRUE) : NULL;
			$attr['brand_name'] = $this->input->post('brand_name', TRUE) ? $this->input->post('brand_name', TRUE) : NULL;
			$attr['event_location'] = $this->input->post('event_location', TRUE) ? $this->input->post('event_location', TRUE) : NULL;
			$attr['event_name'] = $this->input->post('event_name', TRUE) ? $this->input->post('event_name', TRUE) : NULL;
			$attr['event_date'] = $this->input->post('event_date', TRUE) ? $this->input->post('event_date', TRUE) : '0000-00-00 00:00:00';
			$attr['place_name'] = $this->input->post('place_name', TRUE) ? $this->input->post('place_name', TRUE) : NULL;
			$attr['city'] = $this->input->post('city', TRUE) ? $this->input->post('city', TRUE) : NULL;
			$attr['country'] = $this->input->post('country', TRUE) ? $this->input->post('country', TRUE) : NULL;
			$attr['comment'] = $this->input->post('comment', TRUE) ? $this->input->post('comment', TRUE) : NULL;
			$attr['lat'] = $this->input->post('lat', TRUE) ? $this->input->post('lat', TRUE) : NULL;
			$attr['long'] = $this->input->post('long', TRUE) ? $this->input->post('long', TRUE) : NULL;

			$config['upload_path'] = IMG_DIR.'/photos';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload())
			{
				$this->session->set_flashdata('app_error', $this->upload->display_errors());
			}
			else
			{
				$file = $this->upload->data();
				// Load Image Resizer library
        		$this->load->library('Wa_Resizer');
        		$this->wa_resizer->resize($file, $this->wa_setting->get('thumbs'), 'absolute');
        		$this->wa_resizer->resize($file, $this->wa_setting->get('modal_thumb'), 'absolute');
        		$this->wa_resizer->resize($file, $this->wa_setting->get('user_thumb'), 'absolute');

				$attr['filename'] = $file['file_name'];

				$post_id = $this->wa_feeds->new_feed($attr);

				if($post_id)
				{
					$this->session->set_flashdata('app_success', "Successfully saved");
					redirect('admin/manage_feeds/'.$worthy_type);
				}
				else
				{
					$this->session->set_flashdata('app_error', "Something went wrong");
				}
			}
		}

		$this->page_title = 'Edit feed';
    	$this->render_page('feeds/edit',$data);
	}

	function remove($id,$feed_type)
	{
		$this->wa_feeds->removefeed($id);
		redirect('admin/manage_feeds/'.$feed_type);
	}

	function promote()
	{

	}

	function cityFeeds()
	{
		$this->page_title = 'City Feeds';
		$this->render_page('feeds/city_feed');
	}
}
  /* End of file manage_permissions.php */
  /* Location: ./application/modules/admin/controllers/manage_feeds.php */
