<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * APP CONFIGUTATION
 *
 **/

// Default App Title
$config['app_title'] = 'Que comemos';

// Default "From" for Email library
$config['email_from_name'] = 'No responder - Que comemos';
$config['email_from_email'] = 'no_responder@quecomemos';

// Default blocked domains for Email Validation
$config['blocked_domains'] = array(
    'blocked.domain', // always required
    'zoemail.com',
    'emailias.com',
    'spamex.com',
    'spamgourmet.com',
    '2prong.com',
    'e4ward.com',
    'gishpuppy.com',
    'mailinator.com'
);