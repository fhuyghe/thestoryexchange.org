<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
<div class="author-meta">
    <div class="author_thumbnail">
      <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>" />
    </div>
    <?php _e( 'By ', 'continuum' ); ?>
    <?php the_author_link(); ?>
</div>
