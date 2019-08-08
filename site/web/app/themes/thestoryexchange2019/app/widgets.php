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
    
    // Base ID of your widget
    'widget_video', 
    
    // Widget name will appear in UI
    __('Latest TSE Video Episode', 'widget_video_domain'), 
    
    // Widget description
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
    
    // This is where you run the code and display the output
    echo __( 'Hello, World!', 'widget_video_domain' );
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
    
    // Base ID of your widget
    'widget_podcast', 
    
    // Widget name will appear in UI
    __('Latest TSE Podcast Episode', 'widget_podcast_domain'), 
    
    // Widget description
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
               <img style="margin-top: 0px !important; margin-bottom:0px !important; " width="100%" height="auto" src=" <?php the_post_thumbnail_url('medium'); ?>" >
         	<div  class="blurb">
                <?php echo do_shortcode('[spp-player]'); ?>
                <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
                <?php the_excerpt(); ?>
		  </div>
          <!-- REPLACE WITH PODCAST IMAGE-->
                <div class="sppbuttons bottom">
               <a class="button-itunes" target="_blank" style="" href="https://itunes.apple.com/us/podcast/the-story-exchange/id1036000689?mt=2">iTunes</a>
				<a class="button-stitcher" target="_blank" style="" href="http://www.stitcher.com/s?fid=72717&refid=stpr">Stitcher</a>
               </div>
           </div>
           <?php endwhile; endif; ?>
           <a class="bluebutton" href="/podcast">More Episodes</a>
    
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