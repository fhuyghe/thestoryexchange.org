{{--
  Title: Featured Posts
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
    <h2>{{ $block['title'] }}</h2>
    {!! $block['text'] !!}
  </div>
  
  @if($block['posts'])
    <div class="row">
    @if($block['style'] == 1)
    {{-- Style 3 --}}
    <div class="col-md-4 left">
      @php $post = $block['posts'][0] @endphp
      @php setup_postdata($post) @endphp
      @include('partials.post-item')
      @php wp_reset_postdata() @endphp
    </div>
    <div class="col-md-8 right">
      <div class="post-group format-horizontal">
    @foreach ($block['posts'] as $post) @php setup_postdata($post) @endphp
      @if($loop->iteration > 1)
        <div class="col-md-6">
        @include('partials.post-item')
        </div>
        @php wp_reset_postdata() @endphp
      @endif
    @endforeach
    </div>
    </div>
  

      @else
      {{-- Default --}}
      
      @endif
    </div>
  @endif
</div>