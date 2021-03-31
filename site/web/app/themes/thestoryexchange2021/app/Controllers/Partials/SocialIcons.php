<?php

namespace App\Controllers\Partials;

trait SocialIcons
{
  private static $SOCIAL_ICONS = array(
    'facebook' => [
      'url' => 'https://www.facebook.com/pages/The-Story-Exchange/217187838327836',
      'icon_class' => 'facebook-square'
      ],
    'twitter' => [
      'url' => 'https://twitter.com/#!/TheStoryXchange',
      'icon_class' => 'twitter-square'
      ],
    'youtube' => [
      'url' => 'http://www.youtube.com/user/StoryExchange?ob=0&feature=results_main',
      'icon_class' => 'youtube-square'
      ],
    'instagram' => [
      'url' => 'https://instagram.com/thestoryexchange/',
      'icon_class' => 'instagram'
      ],
    'linkedin' => [
      'url' => 'https://www.linkedin.com/company/the-story-exchange',
      'icon_class' => 'linkedin'
      ],
    'rss' => [
      'url' => '/feed/',
      'icon_class' => 'rss-square fas'
      ],
  );

  public static function fetch_social_icons_object()
  {
    return self::$SOCIAL_ICONS;
  }

  public function get_social_icons_object()
  {
    return self::fetch_social_icons_object();
  }
}
