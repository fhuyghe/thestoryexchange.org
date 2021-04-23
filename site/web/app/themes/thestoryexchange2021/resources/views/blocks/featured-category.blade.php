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
$showExcerpt = true;
@endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }} style-{{ $block['style'] }}">
  <div class="section-title">
    <a href="{{ get_category_link($block['cat']) }}">
    <h2>{{ get_cat_name($block['cat']) }}</h2>
    </a>
  </div>
  
  @if($block['articles'])
    <div class="row">
    @if($block['style'] == 3)
    {{-- Style 3 --}}
    <div class="col-md-6 left">
      @php $post = $block['articles'][0] @endphp
      @php setup_postdata($post) @endphp
      @include('partials.post-item')
      @php wp_reset_postdata() @endphp
    </div>
    <div class="col-md-6 right">
      <div class="post-group format-horizontal">
    @foreach ($block['articles'] as $post) @php setup_postdata($post) @endphp
      @if($loop->iteration > 1)
        @include('partials.post-item')
        @php wp_reset_postdata() @endphp
      @endif
    @endforeach
    </div>
    </div>
    

    @elseif($block['style'] == 2)
      {{-- Style 2 --}}
      <div class="col-md-8 left">
        @php $post = $block['articles'][0] @endphp
        @php setup_postdata($post) @endphp
        <div class="post-group format-horizontal">
        @include('partials.post-item')
        </div>
        @php wp_reset_postdata() @endphp
      </div>
      <div class="col-md-4 right">
        <div class="post-group format-horizontal">
          @php $showExcerpt = false @endphp
      @foreach ($block['articles'] as $post) @php setup_postdata($post) @endphp
        @if($loop->iteration > 1)
          @include('partials.post-item')
          @php wp_reset_postdata() @endphp
        @endif
      @endforeach
        </div>
      </div>

      @else
      {{-- Style 1 --}}
      @php $showExcerpt = false @endphp
      @foreach ($block['articles'] as $post) @php setup_postdata($post) @endphp
          @include('partials.post-item')
        @php wp_reset_postdata() @endphp
      @endforeach
      
      @endif
    </div>
  @endif
</div>