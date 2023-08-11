{{--
  Title: Podcast Player
  Category: formatting
  Icon: format-audio
  Keywords: posts feature
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
 global $post;
@endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
  @php $post = get_field('episode_post') @endphp
  @if($post)
    @php setup_postdata($post) @endphp
    {!! do_shortcode("[spp-player ctabuttons='off']") !!}
    @php wp_reset_postdata() @endphp      
  @else
    {!! do_shortcode('[spp-player optin="off" ctabuttons="off" poweredby="off" textabove="Listen to my interview on EOFire" url="https://file-examples.com/storage/fe7bb0e37864d66f29c40ee/2017/11/file_example_MP3_700KB.mp3" image=“https://mysite.com/myguestimage.png" title="My Amazing Guest Hani Mourra"]') !!}
    {!! do_shortcode('[spp-player title="{{ get_field("title") }}" image="{{ get_field("cover_image") }}" url="{{ get_field("mp3_file") }}"]') !!}
  @endif
</div>