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
  $showExcerpt = true;
@endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
  <div class="section-title">
    <h2>Video</h2>
  </div>

  @if($block['featured_video'])
  <div class="row">
    @php $post = $block['featured_video'] @endphp
    @php setup_postdata($post); @endphp
    @php $format = 'horizontal' @endphp
        @include('partials.post-item')
      @php wp_reset_postdata() @endphp
  </div>
  @endif
</div>