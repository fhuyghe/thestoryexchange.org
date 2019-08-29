<?php

if( function_exists('acf_add_options_page') ) {
		
    acf_add_options_page(array(
        'page_title' 	=> 'Theme Options',
        'menu_title'	=> 'Theme Options',
        'menu_slug' 	=> 'options',
        'capability'	=> 'edit_posts',
        'redirect'	=> false
    ));

}