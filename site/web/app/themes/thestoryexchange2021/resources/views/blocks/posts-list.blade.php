{{--
  Title: Posts List
  Category: formatting
  Icon: admin-comments
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
    <div class="row">
  @php $posts = get_field('posts') @endphp
  @foreach ($posts as $post)
    @php setup_postdata($post) @endphp
      @include('partials/post-item',[
      'post_classes' => 'col-md-4',
      'format' => '',
      'showExcerpt' => true,
      ]) 
    @php wp_reset_postdata() @endphp
  @endforeach
  </div>
</div>