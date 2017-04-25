<?php
namespace Roots\Sage\Acf;

function acf_options_page()
{
  if( function_exists('acf_add_options_page') ) {

  	acf_add_options_page(array(
  		'page_title' 	=> 'Theme Settings',
  		'menu_title'	=> 'Theme Settings',
  		'menu_slug' 	=> 'theme-settings',
  		'capability'	=> 'manage_options',
  		'redirect'		=> false
  	));

  }
}
add_action('acf/init', __NAMESPACE__ . '\\acf_options_page');
