{{-- =============================================================================
// TEMPLATE NAME: Women in the News
// =============================================================================--}}

@extends('layouts.app')

@section('content')
    <h1>{!! the_title() !!}</h1>

    <section id="women-news">
        @component('partials/post-group', [
            'posts_per_page' => 4,
            'cat' => array(73, -219, -667), 
            'format' => 'vertical', 
            'featured_post' => true
        ])@endcomponent
        <a class="btn" href="<?php echo site_url(); ?>/category/happening-now/">More News & Analysis</a>
    </section>


                <?php // POLITICS AND LEADERSHIP #############################?>

            <section id="politics">
                <h2 class="blue-title">Politics and Leadership</h2>
                <div class="row">
                <div class="col-md-6 iconBlock">
                    <div class="icon">
                        <a href="<?php the_field('icon1_link'); ?>">
                            <img src="<?php the_field('icon1_image'); ?>" />	
                        </a>
                    </div>
                        <h3><?php the_field('icon1_title'); ?></h3>
                        <p><?php the_field('icon1_text'); ?></p>
                        <a class="btn" href="<?php the_field('icon1_link'); ?>">
                            <?php the_field('icon1_linktext'); ?>
                        </a>
                    </div>
                <div class="col-md-6 iconBlock">
                    <div class="icon">
                        <a href="<?php the_field('icon2_link'); ?>">
                            <img src="<?php the_field('icon2_image'); ?>" />	
                        </a>
                    </div>
                        <h3><?php the_field('icon2_title'); ?></h3>
                        <p><?php the_field('icon2_text'); ?></p>
                        <a class="btn" href="<?php the_field('icon2_link'); ?>"><?php the_field('icon2_linktext'); ?></a>
                </div>
            </section>




    <?php // 5 CROWDFUNDERS TO WATCH #############################?>

    <section id="solo">
        <h2 class="blue-title"><?php the_field('crowdfunding_title')?></h2>
        <h3 class="tagline"><?php the_field('crowdfunding_subtitle')?></h3>
        @component('partials/post-group', [
            'posts_per_page' => 1,
            'cat' => array(667),
            'format' => 'vertical', 
            'featured_post' => true
        ])@endcomponent
        <a class="btn" href="<?php echo site_url(); ?>/category/5-crowdfunders-to-watch/">Previous Columns</a>
    </section>

    <?php // THE INDEPENDENT LIFE #####################################?>

    <section id="independent-life">
        <h2 class="blue-title">The Independent Life</h2>
        <h3 class="tagline">Where women share how economic independence through business ownership has changed everything.</h3>
        @component('partials/post-group', [
            'posts_per_page' => 4,
            'cat' => array(219),
            'format' => 'vertical', 
            'featured_post' => true
        ])@endcomponent
        <a class="btn" href="<?php echo site_url(); ?>/the-independent-life/">More Stories</a>
    </section>

@endsection
