<?php

// Register and load the widget
function wp_load_widget() {
    register_widget( 'widget_video' );
    register_widget( 'widget_podcast' );
}
add_action( 'widgets_init', 'wp_load_widget' );
 
// Creating the Video widget 
class widget_video extends WP_Widget {
 
    function __construct() {
        parent::__construct(
        'widget_video', 
        __('Latest TSE Video Episode', 'widget_video_domain'), 
        array( 'description' => __( 'Displays the latest video and launches a player.', 'widget_video_domain' ), )
        );
    }
 
    // Creating widget front-end
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];

        // $query_args=array(
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => 1,
        //     'category_name' => 'entrepreneur-videos'
        // );
        //$video_query = new WP_Query( $query_args );
        //if ( $video_query -> have_posts() ) : while ( $video_query -> have_posts() ) : $video_query ->the_post(); 

        $featured_video = get_field('featured_video_post', 'widget_' . $this->id);

        setup_postdata( $GLOBALS['post'] =& $featured_video );
        ?>
            <div class="download-box video-post">
                <div class="thumbnail">
                <div class="wrap-out">
                    <div class="fill">
                        <img width="100%" height="auto" src=" <?php the_post_thumbnail_url('medium'); ?>" >
                    </div>
                    <div class="wrap-in">
                        <div class="play-button"><i class="fas fa-play"></i></div>
                    </div>
                </div>
            </div>
            <div class="blurb">
                    <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
                    <?php the_excerpt(); ?>
            </div>
            <div class="video-player">
                <div class="wrap">
                <div class="embed-container">
                <?php
                        $iframe = get_field('video');
                        // use preg_match to find iframe src
                        if ($iframe):
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            preg_match("/src='(.+?)'/", $iframe, $othermatches);
                            $src = $matches[1];
                            if (!$src) {
                            $src = $othermatches[1];
                            }
                            echo "<script>console.log( 'Debug Objects: " . $src . "' );</script>";
                            $cleanedsrc = explode('?', $src);
                            // add extra params to iframe src
                            $new_src = $cleanedsrc[0] . '?autoplay=1';
                            echo "<script>console.log( 'Debug Objects: " . $new_src . "' );</script>";
                            $iframe = str_replace($src, $new_src, $iframe);
                            $iframe = str_replace('src', 'og-src', $iframe);
                            // add extra attributes to iframe html
                            $attributes = 'frameborder="0"';
                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                            // echo $iframe
                            echo $iframe;
                        ?>
                        <?php endif; ?>
                    </div>
                    <div class="close"><i class="far fa-times"></i></div>
                    </div>
                </div>
            </div>
        <?php //endwhile; endif; ?>
        <a class="blue bigbutton" href="<?php home_url(); ?>/category/entrepreneur-videos/">More videos</a>

    <?php
    echo $args['after_widget'];
    }

         
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'widget_video_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class widget_video ends here

// Creating the Video widget 
class widget_podcast extends WP_Widget {
    
    function __construct() {
        parent::__construct(
            'widget_podcast', 
            __('Latest TSE Podcast Episode', 'widget_podcast_domain'), 
            array( 'description' => __( 'Displays the latest video and launches a player.', 'widget_podcast_domain' ), )
        );
    }
 
    // Creating widget front-end
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title']; ?>

           <?php 
        $query_args=array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => 1,
          'category_name' => 'podcast'
        );
        $my_query = new WP_Query( $query_args );
            if ( $my_query -> have_posts() ) : while ( $my_query -> have_posts() ) : $my_query ->the_post(); ?>
                <div class="download-box">
                <div class="thumbnail">
                    <div class="fill">
                        <img width="100%" height="auto" src=" <?php the_post_thumbnail_url('medium'); ?>" >
                    </div>
                </div>

                <div  class="blurb">
                    <?php echo do_shortcode('[spp-player]'); ?>
                    <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
                    <?php the_excerpt(); ?>
                </div>

                <div class="sppbuttons bottom">
                    <a class="button-itunes" target="_blank" style="" href="https://itunes.apple.com/us/podcast/the-story-exchange/id1036000689?mt=2">iTunes</a>
				    <a class="button-stitcher" target="_blank" style="" href="http://www.stitcher.com/s?fid=72717&refid=stpr">Stitcher</a>
               </div>
               </div>
           <?php endwhile; endif; ?>
           <a class="blue bigbutton" href="/podcast">More Episodes</a>
    
    <?php
    echo $args['after_widget'];
    }
         

    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'widget_podcast_domain' );
    }
    // Widget admin form
    ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php 
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class widget_video ends here

?>