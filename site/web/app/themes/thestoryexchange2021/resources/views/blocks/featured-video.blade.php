{{--
  Title: Featured Video
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php 
global $post;
$post_classes = null;
$format = null;
@endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
  <div class="section-title">
    <h2>Video</h2>
  </div>
  
    @if($block['featured_video'])
    <div class="row">
      @php setup_postdata($block['featured_video']); @endphp
          @include('partials.post-item')
        @php wp_reset_postdata() @endphp
    </div>
    @endif
  </div>