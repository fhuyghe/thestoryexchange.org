<?php

namespace App\Blocks;

class PostsList {

    public static function data()
    {
        $data = [];
        $data['posts'] = get_field('posts');

        return $data;
    }

}