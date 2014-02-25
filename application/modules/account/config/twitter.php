<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Twitter API
|--------------------------------------------------------------------------
|
| Twitter Applications - http://dev.twitter.com/apps
|
*/
if(ENVIRONMENT == 'development')
{
	$config['twitter_consumer_key'] 	= "Jx0J4Q7NsGmRqI2hJcWBQ";
	$config['twitter_consumer_secret'] 	= "18mCyNLvHwvk7kDOAapOVife66I1P5GP3XJ1yRfTgEg";
}
else
{
	$config['twitter_consumer_key'] 	= "YlmC9dbEBxgwnjcOgoTLyA";
	$config['twitter_consumer_secret'] 	= "5d5IF4xnIa52u9OiXY0XORLBaJOkVrSyDoxjWoUjEc";
}

/* End of file twitter.php */
/* Location: ./application/account/config/twitter.php */