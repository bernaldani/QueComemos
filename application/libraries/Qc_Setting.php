<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Setting library
 *
 * @author      Daniel Bernal <bernaldani@gmail.com>
 * @version     $Id$
 */
class Qc_Setting {

  /**
	* CodeIgniter global
	*
	* @var string
	* */
   protected $ci;

   /**
	* __construct
	*
	* @return void
	* */
   public function __construct() {
	  $this->ci = &get_instance();

	  // Load required stuff
	  $this->ci->load->model('settings_m');

   }

   public function get_many_by() {
	  return $this->ci->settings_m->get_many_by();
   }

   public function update($setting) {
	  return $this->ci->settings_m->update($setting);
   }

   /**
	* Getter
	*
	* Gets the setting value requested
	*
	* @param	string	$name
	*/
   public static function get($name) {
	 $ci = &get_instance();
	 $var = $ci->settings_m->get_by(array('slug' => $name));

	 return $var;
   }
}

/* End of file Settings.php */