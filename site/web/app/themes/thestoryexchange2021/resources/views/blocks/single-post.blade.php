{{--
  Title: Single Post
  Category: formatting
  Icon: admin-comments
  Keywords: post feature
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
  @php $posts = get_field('post') @endphp
    @php setup_postdata($post) @endphp
      @include('partials/post-item',[
      'post_classes' => '',
      'format' => '',
      'showExcerpt' => true,
      ]) 
    @php wp_reset_postdata() @endphp
</div>