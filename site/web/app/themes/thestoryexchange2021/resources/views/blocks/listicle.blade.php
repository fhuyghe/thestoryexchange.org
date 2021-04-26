{{--
  Title: Listicle
  Category: formatting
  Icon: admin-comments
  Keywords: listicle article
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

@if($block['list'])
  <div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
    {{$block['test']}}
    @foreach ($block['list'] as $item)
        <div class="row">
        <div class="col-md-6 photo">
          <div class="number">{{ $loop->iteration }}</div>
          <img src="{{ $item['photo']['sizes']['medium'] }}"/>
        </div>
        <div class="col-md-6 text">
          <h2>{{ $item['title'] }}</h2>
          {!! $item['text'] !!}
        </div>
        </div>
    @endforeach
  </div>
@endif