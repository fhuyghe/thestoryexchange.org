<?php

namespace App\Controllers\Partials;

trait Banner
{
  private static $BANNER_FIELDS = array(
    'link',
    'image',
    'title',
    'text'
  );
  public static function banner_object($number)
  {
    $str = 'banner' . $number . '_';
    $obj = array();

    foreach (self::$BANNER_FIELDS as $key => $value) {
      $obj[$value] = get_field( $str . $value );
    }

    return $obj;
  }
}
