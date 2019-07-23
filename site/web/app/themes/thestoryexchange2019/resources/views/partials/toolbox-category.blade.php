<?php 
$cat = get_category($id); 
$icon = get_field('icon', 'category_' . $id);
$link = home_url() . '/category/' . $cat->slug
?>

<div class="toolbox-category container" id="<?php echo $cat->slug; ?>">
    <div class="row">
    <div class="cat-icon col-lg-3">
        <img src="{{ $icon['sizes']['thumbnail']}}" />
    </div>

    <div class="cat-content col-lg-9">
        <h2><a href="{{$link}}">{{$cat->name}}</a></h2>
        <p>{{$cat->description}}</p>

        <div class="posts">
            <?php 
            $args=array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3, 'cat' => array($id));
            $my_query = new WP_Query( $args );
            if ( $my_query -> have_posts() ) : while ( $my_query -> have_posts() ) : $my_query ->the_post(); ?>

            <div class="post">
                <div class="thumbnail">
                    {!! the_post_thumbnail('toolbox-thumb') !!}
                </div>

                <div class="info">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    {{ the_excerpt() }}
                </div>
            </div>

            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>

        <a class="btn" href="<?php echo $link; ?>">More</a>
    </div>
</div>
</div>