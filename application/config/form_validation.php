<?php
/**
 * Validation Rules
 *
 */

$config = array(
  'account_create_personal' => array(
    array(
      'field' => 'email_address',
      'label' => 'Email address',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]|valid_emailaddress'
      ),
    array(
      'field' => 'sign_up_password',
      'label' => 'lang:sign_up_password',
      'rules' => 'trim|required|min_length[6]'
      ),
    array(
      'field' => 'firstname',
      'label' => 'First Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'lastname',
      'label' => 'Last Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'language',
      'label' => 'Language',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'ethnicity',
      'label' => 'Ethnicity',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'currency',
      'label' => 'Default Currency',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'group',
      'label' => 'Income Group',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'city',
      'label' => 'Home City',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'country',
      'label' => 'Home Country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_city',
      'label' => 'Current city',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_country',
      'label' => 'Current country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'type',
      'label' => 'Profile type',
      'rules' => 'trim|required|xss_clean'
      )
  ),
  'account_create_company' => array(
    array(
      'field' => 'email_address',
      'label' => 'Email address',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]|valid_emailaddress'
      ),
    array(
      'field' => 'sign_up_password',
      'label' => 'lang:sign_up_password',
      'rules' => 'trim|required|min_length[6]'
      ),
    array(
      'field' => 'firstname',
      'label' => 'First Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'lastname',
      'label' => 'Last Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'language',
      'label' => 'Language',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'ethnicity',
      'label' => 'Ethnicity',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'currency',
      'label' => 'Default Currency',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'group',
      'label' => 'Income Group',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'city',
      'label' => 'Home City',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'country',
      'label' => 'Home Country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_city',
      'label' => 'Current city',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_country',
      'label' => 'Current country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'type',
      'label' => 'Profile type',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'name',
      'label' => 'Company name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'address',
      'label' => 'Company address',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'phone',
      'label' => 'Company phone',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'website',
      'label' => 'Website',
      'rules' => 'trim|required|xss_clean'
      )
  ),
  'account_create_personal_social' => array(
    array(
      'field' => 'email_address',
      'label' => 'Email address',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]|valid_emailaddress'
      ),
    array(
      'field' => 'firstname',
      'label' => 'First Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'lastname',
      'label' => 'Last Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'language',
      'label' => 'Language',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'ethnicity',
      'label' => 'Ethnicity',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'currency',
      'label' => 'Default Currency',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'group',
      'label' => 'Income Group',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'city',
      'label' => 'Home City',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'country',
      'label' => 'Home Country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_city',
      'label' => 'Current city',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_country',
      'label' => 'Current country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'type',
      'label' => 'Profile type',
      'rules' => 'trim|required|xss_clean'
      )
  ),
  'account_create_company_social' => array(
    array(
      'field' => 'email_address',
      'label' => 'Email address',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]|valid_emailaddress'
      ),
    array(
      'field' => 'sign_up_password',
      'label' => 'lang:sign_up_password',
      'rules' => 'trim|required|min_length[6]'
      ),
    array(
      'field' => 'firstname',
      'label' => 'First Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'lastname',
      'label' => 'Last Name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'language',
      'label' => 'Language',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'ethnicity',
      'label' => 'Ethnicity',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'currency',
      'label' => 'Default Currency',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'group',
      'label' => 'Income Group',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'city',
      'label' => 'Home City',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'country',
      'label' => 'Home Country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_city',
      'label' => 'Current city',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'current_country',
      'label' => 'Current country',
      'rules' => 'trim|xss_clean'
      ),
    array(
      'field' => 'type',
      'label' => 'Profile type',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'name',
      'label' => 'Company name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'address',
      'label' => 'Company address',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'phone',
      'label' => 'Company phone',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'website',
      'label' => 'Website',
      'rules' => 'trim|required|xss_clean'
      )
  ),
  'worthy_type' => array(
    array(
      'field' => 'worthy_type',
      'label' => 'Worthy',
      'rules' => 'trim|required|xss_clean'
      )
    ),
  'post_eat' => array(
    array(
      'field' => 'worthy_type',
      'label' => 'Worthy',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'food_name',
      'label' => 'Food name',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]'
      ),
    array(
      'field' => 'taste',
      'label' => 'Taste',
      'rules' => 'xss_clean|required'
      ),
    array(
      'field' => 'restaurant_name',
      'label' => 'Restaurant Name',
      'rules' => 'xss_clean|required'
      ),
    array(
      'field' => 'authentic',
      'label' => 'Authentic/Tasty',
      'rules' => 'xss_clean'
      ),
    array(
      'field' => 'eat_price',
      'label' => 'Price',
      'rules' => 'xss_clean'
      )
  ),
  'post_get' => array(
    array(
      'field' => 'worthy_type',
      'label' => 'Worthy',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'item_name',
      'label' => 'Item name',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]'
      ),
    array(
      'field' => 'brand_name',
      'label' => 'Brand name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'get_price',
      'label' => 'Price',
      'rules' => 'trim|xss_clean'
      )
  ),
  'post_out_event' => array(
    array(
      'field' => 'worthy_type',
      'label' => 'Worthy',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'event_location',
      'label' => 'Event / Location',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]'
      ),
    array(
      'field' => 'event_name',
      'label' => 'Event name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'event_date',
      'label' => 'Event date',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'place_name',
      'label' => 'Place name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'city',
      'label' => 'City',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'country',
      'label' => 'Country',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'comment',
      'label' => 'Comment',
      'rules' => 'trim|required|xss_clean'
      )
  ),
  'post_out_location' => array(
    array(
      'field' => 'worthy_type',
      'label' => 'Worthy',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'event_location',
      'label' => 'Event / Location',
      'rules' => 'trim|required|xss_clean|min_length[2]|max_length[65]'
      ),
    array(
      'field' => 'place_name',
      'label' => 'Place name',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'city',
      'label' => 'City',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'country',
      'label' => 'Country',
      'rules' => 'trim|required|xss_clean'
      ),
    array(
      'field' => 'comment',
      'label' => 'Comment',
      'rules' => 'trim|required|xss_clean'
      )
  )
);