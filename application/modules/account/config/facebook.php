<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Facebook API
|--------------------------------------------------------------------------
|
| Facebook Applications - http://www.facebook.com/developers/createapp.php
|
*/
if(ENVIRONMENT == 'development')
{
	$config['facebook_app_id'] = "180394395476893";
	$config['facebook_secret'] = "9664a8d17121249b6b3df5b63fd46662";

}
else
{
	$config['facebook_app_id'] = "439470512834432";
	$config['facebook_secret'] = "67ba5ff033e6aece261324a4b45d9173";
}


/* End of file facebook.php */
/* Location: ./application/account/config/facebook.php */