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
              <a href="{!! the_permalink() !!}">
                <img src="{!! $picture !!}" width="100%">
              </a>
            </div>
          </div>
    @else
      @if( has_post_thumbnail() )
          @include('partials/post-thumbnail')
      @endif
    @endif
      @if(in_category('entrepreneur-videos'))
        @include('partials.icon-play')
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
