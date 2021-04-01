<?php

namespace App\Blocks;

class FeaturedCategory {

    public static function data()
    {
        $data = [];
        $data['cat_id'] = get_field('featured_category');

        return $data;
    }

}