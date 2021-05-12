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

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
  @if($block['related_post'])
    <div class="section-title">
      <h4>Related</h4>
    </div>
    @php 
      $post = $block['related_post'];
      setup_postdata($post) 
    @endphp

    <div class="post-wrap">
      @if ( has_post_thumbnail() )
        <div class="thumbnail">
          <a href="{!! the_permalink() !!}" class="post-image-link">
            {!! the_post_thumbnail('thumbnail') !!}
          </a>
        </div>
      @endif
      <div class="entry-text">
          <h3 class="post-title">
            <a href="{!! the_permalink() !!}">
              {!! the_title() !!}
            </a>
          </h3>
      </div>
    </div>

    @php wp_reset_postdata() @endphp
    @endif
</div>