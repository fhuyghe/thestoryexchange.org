<?php

namespace App\Controllers\Partials;

trait Icon
{
  private static $ICON_FIELDS = array(
    'link',
    'image',
    'title',
    'text',
    'linktext'
  );
  public static function icon_object($number)
  {
    $str = 'icon' . $number . '_';
    $obj = array();

    foreach (self::$ICON_FIELDS as $key => $value) {
      $obj[$value] = get_field( $str . $value );
    }

    return $obj;
  }
}
