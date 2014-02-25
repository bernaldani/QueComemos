<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Setting Model
 *
 * @author      Daniel Bernal <bernaldani@gmail.com>
 * @version     $Id$
 */

class Settings_m extends CI_Model
{

   public function __construct()
   {
	  parent::__construct();

   }

	/**
	 * Get
	 *
	 * Gets a setting based on the $where param.  $where can be either a string
	 * containing a slug name or an array of WHERE options.
	 *
	 * @access	public
	 * @param	mixed	$where
	 * @return	object
	 */
	public function get_by($where)
	{
		if ( ! is_array($where))
		{
			$where = array('slug' => $where);
		}

		return $this->db
			->select('*, IF(`value` = "", `default`, `value`) as `value`', FALSE)
			->where($where)
			->get('settings')
			->row()->value;
	}

	/**
	 * Get Many By
	 *
	 * Gets all settings based on the $where param.  $where can be either a string
	 * containing a module name or an array of WHERE options.
	 *
	 * @access	public
	 * @param	mixed	$where
	 * @return	object
	 */
	public function get_many_by($where = array())
	{

		   $this->db->select('*')

			   ->where($where)
			   ->order_by('`order`', 'ASC');

		   $query = $this->db->get('settings');

		   return $query;
	}

	/**
	 * Update
	 *
	 * Updates a setting for a given $slug.
	 *
	 * @access	public
	 * @param	string	$slug
	 * @param	array	$params
	 * @return	bool
	 */
	public function update($params = array())
	{
		foreach($params as $slug => $value)
		{
			$this->db->update('settings', array('value' => $value), array('slug' => $slug));
		}
		return true;
	}

}

/* End of file settings_m.php */