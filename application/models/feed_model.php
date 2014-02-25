<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed_Model extends CI_Model {

	public function get($limit = null, $offset = null)
	{
		$this->db->where('worthy_type !=','');
		return $this->db->get('feeds',$limit,$offset)->result();
	}

	public function count_all()
	{
		return $this->db->count_all('feeds');
	}

	public function get_by_user_id($user_id, $limit = null, $offset = null)
	{
		return $this->db->get_where('feeds',array('account_id' => $user_id),$limit,$offset)->result();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('feeds', array('id' => $id))->row();
	}

	public function removefeed($id)
	{
		$this->db->delete('feeds', array('id' => $id));
		return TRUE;
	}

	public function get_by_where($wheres, $limit, $offset)
	{
		foreach($wheres as $key => $value)
		{
			$this->db->where($key,$value);
		}

		return $this->db->get('feeds',$limit,$offset)->result();
	}

	public function count_by_where($wheres)
	{
		foreach($wheres as $key => $value)
		{
			$this->db->where($key,$value);
		}

		return $this->db->count_all_results('feeds');
	}

	public function insert_file($filename)
	{
	  $data = array(
		 'filename'     => $filename,
	  );
	  $this->db->insert('feeds', $data);
	  return $this->db->insert_id();
	}

	public function get_autocomplete_data($type)
	{
		$data='';
		$data2=array();
		switch($type){
			case 'food':
				$data='food_name';
				break;
			case 'restaurant':
				$data='restaurant_name';
				break;
			case 'item':
				$data='item_name';
				break;
			case 'brand':
				$data='brand_name';
				break;
			case 'place':
				$data='place_name';
				break;
		}

		$this->db->select($data);
		$this->db->where($data.' !=','');
		$this->db->distinct();
		$query = $this->db->get('feeds');

		if($query->num_rows > 0)
		{
			foreach ($query->result() as $value) {
				$data2[] = $value->$data;
			}
			//return $data2;
		}

		return $data2;
	}

	public function new_feed($attr)
	{
		if(isset($attr['id']))
		{
			$this->db->where('id', $attr['id']);
			unset($attr['id']);
		}

		$attr['created_at'] = date('Y-m-d H:i:s');
		$this->db->update('feeds', $attr);

		return $this->db->_error_number()==0;
	}
}