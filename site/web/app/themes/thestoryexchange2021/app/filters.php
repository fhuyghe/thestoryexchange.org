<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);


// Renders a custom search form
add_filter('get_search_form', function () {
    $form = '';
    echo template('partials.searchform');
    return $form;
  });


// Renders the sidebar
add_filter('sage/display_sidebar', function ($display) {
    static $display;

    $display = in_array(true, [
      // The sidebar will be displayed if any of the following return true
      $display,
      is_home(),
      is_front_page()
    ]);

    return $display;
});

//  Featured Category data
add_filter('sage/blocks/featured-category/data', function ($block) { 

    $cat = '';
    $tag = '';

    if(get_field('category_or_tag') == 'category'){
        $cat = get_field('featured_category');
        $query_tax = array('cat' => $cat);
    } else {
        $tag = get_field('featured_tag');
        $query_tax = array('tag_id' => $tag);
    }

    $block['style'] = get_field('style');
    $query_args= array_merge($query_tax, array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $block['style'] == 3 ? 3 : 4,
        'post__not_in' => get_field('posts_to_ignore'),
      ));
    $block['articles'] = get_posts($query_args);
    $block['tax'] = get_field('category_or_tag') == 'category' ? $cat : $tag;
    $block['title'] = get_field('title') ? get_field('title') : get_term($block['tax'])->name;
    $block['text'] = get_field('text');

    return $block;
 });

 //  Featured Posts data
add_filter('sage/blocks/featured-posts/data', function ($block) { 

    $block['style'] = get_field('style');
    $block['posts'] = get_field('posts');
    $block['title'] = get_field('title');
    $block['text'] = get_field('text');

    return $block;
 });

 // Landing Page Top data
add_filter('sage/blocks/landing-page-top/data', function ($block) { 

    $block['secondary_featured'] = get_field('secondary_featured');

    return $block;
 });

 //  Featured Video data
add_filter('sage/blocks/featured-video/data', function ($block) { 

    $block['featured_video'] = get_field('featured_video');

    return $block;
 });

//  Related Post data
add_filter('sage/blocks/related-post/data', function ($block) { 

    $block['related_post'] = get_field('related_post');

    return $block;
 });

 //  Listicle data
add_filter('sage/blocks/listicle/data', function ($block) { 

    $block['list'] = get_field('list');

    return $block;
 });

  //  Newsletter Subscribe
add_filter('sage/blocks/newsletter-subscribe/data', function ($block) { 

    $block['title'] = get_field('title');
    $block['text'] = get_field('text');

    return $block;
 });

 // Defining the category for Tips
 add_filter('alm_filters_tips_category', function(){ 
   
    // Define empty array
    $values = []; 

    // Add All Item
    $values[] = array( 
        'label' => 'All Categories',
        'value' => ''
     );	
    
    $terms = get_terms([
        'taxonomy' => 'category',
        'child_of' => '35'
        ]);
     // Loop terms
       foreach( $terms as $term_id ) { 
           $term = get_category($term_id);
          $values[] = array(
             'label' => $term->name,
             'value' => $term->slug
          );
       }		
       	

    return $values; // Return values	
 });