<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/*******************************************
* TinyMCE EDITOR "Biographical Info" USER PROFILE
*******************************************/

add_action('admin_head', function() {
    if ( basename($_SERVER['PHP_SELF']) == 'profile.php' || basename($_SERVER['PHP_SELF']) == 'user-edit.php' && function_exists('wp_tiny_mce') ) {
        echo "<script>jQuery(document).ready(function($){ $('#description').remove();});</script>";
        $settings = array(
            'tinymce' => array(
                'toolbar1' => 'bold,italic,bullist,numlist,link,unlink',
                'toolbar2' => '',
                'toolbar3' => '',
                'toolbar4' => '',
            ),
            'wpautop' => true,
            'media_buttons' => false,
            'quicktags' => false,
        );
        $description = get_user_meta( $user->ID, 'description', true);
        wp_editor( $description, 'description', $settings );
    }
});
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter( 'pre_user_description', 'wp_filter_post_kses' );
 
/**
 * Add excerpt support to pages
 */
add_action('init', function() {
    add_post_type_support( 'page', 'excerpt' );
});
