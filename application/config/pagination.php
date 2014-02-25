<?php
/**
 * Pagination Library Configuration File
 *
 * @author      Ever Daniel Barreto Rojas <e.barreto@esenciahq.com>
 * @copyright   2012 EsenciaHQ
 * @version     $Id$
 */
$config['anchor_class'] = 'anchor-class';

// Enclosing markup
$config['full_tag_open'] = '<div><ul class="pagination">';
$config['full_tag_close'] = '</ul></div>';

// First link
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

// Last link
$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

// Next link
$config['next_link'] = 'Next';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

// Previous link
$config['prev_link'] = 'Previous';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';

// Current page link
$config['cur_tag_open'] = '<li class="active"><a>';
$config['cur_tag_close'] = '</a></li>';

// Digit link
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

// Display pages besides next and prev
//$config['display_pages'] = TRUE;
//$config['use_page_numbers'] = FALSE;