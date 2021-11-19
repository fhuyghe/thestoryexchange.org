{{-- =============================================================================
// TEMPLATE NAME: Women in the News
// =============================================================================--}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{!! the_title() !!}</h1>

    <section id="women-news">
        @component('partials/post-group', [
            'posts_per_page' => 4,
            'cat' => array(73, -219, -667), 
            'format' => 'vertical', 
            'featured_post' => true,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
        ])@endcomponent
        <a class="btn" href="{{ home_url() }}/category/happening-now/">More News & Analysis</a>
    </section>


    <?php // POLITICS AND LEADERSHIP #############################?>

    <section id="politics-leadership">
        <header>
            <h2 class="blue-title">Politics and Leadership</h2>
        </header>
        <div class="row content">
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
        </div>
    </section>




    <?php // 5 CROWDFUNDERS TO WATCH #############################?>

    <section id="solo">
        <header>
            <h2 class="blue-title"><?php the_field('crowdfunding_title')?></h2>
            <p class="tagline"><?php the_field('crowdfunding_subtitle')?></p>
        </header>
        @component('partials/post-group', [
            'posts_per_page' => 1,
            'cat' => array(667),
            'format' => 'vertical', 
            'featured_post' => true,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
        ])@endcomponent
        <a class="btn" href="{{ home_url() }}/category/5-crowdfunders-to-watch/">Previous Columns</a>
    </section>

    <?php // THE INDEPENDENT LIFE #####################################?>

    <section id="independent-life">
        <header>
            <h2 class="blue-title">The Independent Life</h2>
            <p class="tagline">Where women share how economic independence through business ownership has changed everything.</p>
        </header>
        @component('partials/post-group', [
            'posts_per_page' => 4,
            'cat' => array(219),
            'format' => 'vertical', 
            'featured_post' => true,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
        ])@endcomponent
        <a class="btn" href="{{ home_url() }}/the-independent-life/">More Stories</a>
    </section>
</div>
@endsection
