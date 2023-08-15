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
  @endif
</div>