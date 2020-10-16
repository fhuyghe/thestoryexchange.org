<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Single extends Controller
{
    // Get View Count
    function set_post_views() {
        $postID = get_the_ID();
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }

}