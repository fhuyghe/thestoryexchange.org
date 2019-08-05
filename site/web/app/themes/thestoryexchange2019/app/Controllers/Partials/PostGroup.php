<?php

namespace App\Controllers\Partials;

trait PostGroup
{
  private static $DEFAULT_QUERY_PARAMS = array(
    'post_type' => 'post',
    'post_status' => 'publish',
  );

  public static function group_query_params(...$custom_query_params)
  {
    return array_merge(...$custom_query_params) + self::$DEFAULT_QUERY_PARAMS;
  }
}
