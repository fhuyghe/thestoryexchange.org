<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateAdviceTips extends Controller
{
    public function data()
    {
        $data = [];
        return $data;
    }

    public function posts(){
        $args = array(
            'post_type' => 'post',
            'showposts' => 16,
            'tax_query'      => [ 
                [
                    'taxonomy' => 'category',
                    'terms'    => [ '193' ],
                    'field'    => 'term_id',
                ],
            ],
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }

}