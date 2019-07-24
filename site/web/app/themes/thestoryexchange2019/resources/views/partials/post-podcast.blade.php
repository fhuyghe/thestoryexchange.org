<article id="post-<?php the_ID(); ?>" class="podcast col-12">
    <div class="row">
        <div class="image col-md-4">
            @include('partials/post-thumbnail')
        </div>
        <div class="text col-md-8">
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <h6><?php echo get_the_date( 'F Y' ); ?></h6>
            <?php the_excerpt(); ?>
            <?php echo do_shortcode('[spp-player]'); ?>
        </div>
    </div>
</article>