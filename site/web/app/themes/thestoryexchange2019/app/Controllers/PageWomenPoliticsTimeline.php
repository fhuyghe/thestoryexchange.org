<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageWomenPoliticsTimeline extends Controller
{
    public function data()
    {
        $data = [];
        $data['events'] = get_field('events');

        return $data;
    }

}