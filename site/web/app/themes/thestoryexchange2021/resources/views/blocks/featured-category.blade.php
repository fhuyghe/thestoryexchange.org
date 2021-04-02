{{--
  Title: Featured Category
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
$showExcerpt = false;
@endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
  <div class="section-title">
    <h2>{{ $block['cat']->name }}</h2>
  </div>
  
  @if($block['articles'])
  <div class="row">
    @foreach ($block['articles'] as $post) @php setup_postdata($post) @endphp
      <div class="col-md-3">
        @include('partials.post-item')
      </div>
      @php wp_reset_postdata() @endphp
      @endforeach
    </div>
  @endif
</div>