<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_ethnicity_model extends CI_Model {

	/**
	 * Get all ref language
	 *
	 * @access public
	 * @return object
	 */
	function get_all()
	{
		$this->db->select('description');
		$this->db->order_by('description', 'asc');
		return $this->db->get('ref_ethnic')->result_array();
	}

	public function get_autocomplete_data()
    {

    	$data = array();
   		$this->db->select('description');
		$query = $this->db->get('ref_ethnic');

		if($query->num_rows > 0)
		{
			foreach ($query->result() as $value) {
				$data[] = $value->description;
			}
		}

   		return $data;
   }
}


/* End of file ref_language_model.php */
/* Location: ./application/account/models/ref_language_model.php */