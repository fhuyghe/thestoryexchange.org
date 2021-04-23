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
      @if($format == 'advice')
      <div class="cats">
        @php $cats = wp_get_post_categories( $post->ID ) @endphp
        @foreach ($cats as $id)
          @if(cat_is_ancestor_of(35, $id)) 
            @php $cat = get_category( $id ) @endphp
            <button class="category" data-cat="{{ $cat->slug }}">{!! $cat->name !!}</button>
          @endif
        @endforeach
            </div>
      @endif
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