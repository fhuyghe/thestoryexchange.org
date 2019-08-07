<div class="thumbnail">
    <div class="fill">
        <a href="{!! the_permalink() !!}" style="background-image: url('{!! get_the_post_thumbnail_url(null, 'medium') !!}')" class="post-image-link">
            {!! the_post_thumbnail('medium') !!}
        </a>
    </div>
</div>
