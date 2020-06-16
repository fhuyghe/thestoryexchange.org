<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateTimeline extends Controller
{
    public function data()
    {
        $data = [];
        $data['events'] = get_field('events');

        return $data;
    }

}