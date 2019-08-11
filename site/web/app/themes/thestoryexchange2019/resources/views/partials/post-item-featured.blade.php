@if ( $post_object )
  @php
    global $post;
    $post = $post_object;
    setup_postdata( $post );
  @endphp
<article id="post-{!! the_ID() !!}" {!! post_class('post-item') !!}>
  <div class="post-wrap">
      <div class="entry-thumbnail">
      @if( $picture )
          @include('partials/post-tags')
          <div class="thumbnail">
            <div class="fill">
              <img src="{!! $picture !!}" width="100%">
            </div>
          </div>
    @else
      @if ( has_post_thumbnail() )
          @include('partials/post-thumbnail')
      @endif
    @endif
    </div>
    <a href="{!! the_permalink() !!}">
    <div class="entry-text">
        <h3 class="post-title">
            {!! the_title() !!}
        </h3>
        <div class="entry-content excerpt">
          {!! the_excerpt() !!}
        </div>
    </div>
    </a>
  </div>
</article>

@php
  wp_reset_postdata();
@endphp

@endif
