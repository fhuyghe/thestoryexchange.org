<article id="post-{!! the_ID() !!}" {!! post_class('post-item') !!}>
  <div class="post-wrap">
    @if ( has_post_thumbnail() )
      <div class="entry-thumbnail">
          @include('partials/post-thumbnail')
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
  </div>
</article>