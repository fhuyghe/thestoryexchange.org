<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
<div class="author-meta">
    <div class="author_thumbnail">
      @if(function_exists('userphoto_the_author_thumbnail'))
        {!! userphoto_the_author_thumbnail($post->post_author) !!}
      @endif
    </div>
    {!! _e( 'By ', 'continuum' ) !!}
    {!! the_author_link() !!}
</div>
