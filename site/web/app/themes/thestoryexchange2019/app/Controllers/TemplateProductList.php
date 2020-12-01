<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateProductList extends Controller
{
    public function data()
    {
        $data = [];
        $data['list_items'] = get_field('list_item');

        return $data;
    }

}