<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
<div class="author-meta">
    <div class="author_thumbnail">
      {!! userphoto_the_author_thumbnail($post_author) !!}
    </div>
    {!! _e( 'By ', 'continuum' ) !!}
    {!! the_author_link() !!}
</div>
