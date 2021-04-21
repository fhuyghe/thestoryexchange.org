<article id="post-{!! the_ID() !!}" {!! post_class('post-item ' . $post_classes) !!}>
  <div class="post-wrap">
    @if ( has_post_thumbnail() && $format !== 'minimal' )
      <div class="entry-thumbnail">
          @include('partials/post-thumbnail')
          @if(in_category('entrepreneur-videos'))
          @include('partials.icon-play')
          @endif
      </div>
    @endif
    <div class="entry-text">
        <h3 class="post-title">
          <a href="{!! the_permalink() !!}">
            {!! the_title() !!}
          </a>
        </h3>
        <div class="entry-content excerpt">
          {!! the_excerpt() !!}
        </div>
    </div>
    @if(in_category('podcast'))
      @include('partials.icon-play')
    @endif
  </div>
</article>