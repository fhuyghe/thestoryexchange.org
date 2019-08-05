@if ( $post_object )
  @php
    global $post;
    $post = $post_object;
    setup_postdata( $post );
  @endphp
<article id="post-{!! the_ID() !!}" {!! post_class('post-item') !!}>
  <a href="{!! the_permalink() !!}">
  <div class="post-wrap">
    @if ( $picture )
      <img src="{!! $picture !!}" width="100%">
    @else
      @if ( has_post_thumbnail() )
        <div class="entry-thumbnail">
          @include('partials/post-thumbnail')
        </div>
      @endif
    @endif
    <div class="entry-text">
        <h3 class="post-title">
            {!! the_title() !!}
        </h3>
        <div class="entry-content excerpt">
          {!! the_excerpt() !!}
        </div>
    </div>
  </div>
  </a>
</article>

@php
  wp_reset_postdata();
@endphp

@endif
