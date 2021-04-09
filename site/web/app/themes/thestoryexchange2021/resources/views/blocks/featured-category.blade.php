{{--
  Title: Related Post
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

@if($block['article'])
  <div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
    <div class="section-title">
      <h3>Related</h3>
    </div>

    @foreach ($block['article'] as $post) @php setup_postdata($post) @endphp
        @include('partials.post-item')
      @php wp_reset_postdata() @endphp
    @endforeach
  </div>
@endif