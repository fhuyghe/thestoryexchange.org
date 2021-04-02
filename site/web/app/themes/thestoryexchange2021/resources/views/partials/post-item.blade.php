<article id="post-{!! the_ID() !!}" {!! post_class('post-item ' . $post_classes) !!}>
  <div class="post-wrap">
    @if ( has_post_thumbnail() && $format !== 'minimal' )
      <div class="entry-thumbnail">
          @include('partials/post-tags')
          @include('partials/post-thumbnail')
      </div>
    @endif
    <div class="entry-text">
        <h3 class="post-title">
          <a href="{!! the_permalink() !!}">
            {!! the_title() !!}
          </a>
        </h3>
        @if($showExcerpt)
          <div class="entry-content excerpt">
            {!! the_excerpt() !!}
          </div>
        @endif
    </div>
  </div>
</article>