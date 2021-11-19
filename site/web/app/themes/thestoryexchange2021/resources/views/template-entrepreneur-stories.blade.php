{{--
Template Name: Entrepreneur Stories
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{!! the_title() !!}</h1>
    <p class="blurb">{!! the_field('blurb') !!}</p>
    
    <section id="latest" class="fourPosts">
        <div class="wrap">
            @component('partials/post-group', [
                'posts_per_page' => 4,
                'cat' => array(74), 
                'format' => 'vertical', 
                'featured_post' => false,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
            ])@endcomponent
        </div>
        <a class="btn" href="{{ home_url() }}/category/role-models/">More Recent Stories</a>
    </section>
    
        {{-- BUSINESSES DOING GOOD --}}
              
        <section id="businesses-doing-good">
            <header class="row">
                <div class="icon col-lg-1 col-2">
                    <img src="{!! the_field('good_on_the_ground_image') !!}" />
                </div>
                <div class="text col-lg-11 col-10">
                    <h2 class="section-title"><a href="{{ home_url() }}/businesses-doing-good/">Businesses Doing Good</a></h2>
                    <p>{!! the_field('good_on_the_ground_description') !!}</p>
                </div>
            </header>
                @component('partials/post-group', [
                    'posts_per_page' => 3,
                    'cat' => array(218),
                    'format' => 'vertical', 
                    'featured_post' => false,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
                ])@endcomponent
            <a class="btn" href="{{ home_url() }}/businesses-doing-good/">More Stories</a>
        </section>
    
        {{-- IMMIGRANT ENTREPRENEURS --}}
    
        <section id="immigrant-entrepreneurs">
            <header class="row">
                <div class="icon col-lg-1 col-2">
                    <img src="<?php the_field('immigrant_entrepreneurs_image'); ?>" />
                </div>
                <div class="text col-lg-11 col-10">
                    <h2 class="section-title"><a href="{{ home_url() }}/category/focus-points/all-in/immigrant-entrepreneurs/">Immigrant Entrepreneurs</a></h2>
                    <p><?php the_field('immigrant_entrepreneurs_description'); ?></p>
                </div>
            </header>
            @component('partials/post-group', [
                'posts_per_page' => 3,
                'cat' => array(107),
                'format' => 'vertical', 
                'featured_post' => false,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
            ])@endcomponent
            <a class="btn" href="{{ home_url() }}/category/focus-points/all-in/immigrant-entrepreneurs/">More Immigrant Stories</a>
        </section>
    
    
        {{-- WOMEN OF COLOR AND LGBT --}}
    
        <section id="women-color-lgbt">
            <div class="row">
            <div class="col-md-6">
                <header class="row">
                    <div class="icon col-2">
                        <img src="<?php the_field('women_of_color_image'); ?>" />
                    </div>
                    <div class="text col-10">
                        <h2 class="section-title"><a href="{{ home_url() }}/category/focus-points/all-in/women-of-color/">Women of Color</a></h2>
                        <p>{!! the_field('women_of_color_description') !!}</p>
                    </div>
                </header>
                @component('partials/post-group', 
                [
                    'posts_per_page' => 1,
                    'cat' => array(142),
                    'featured_post' => false,
                    'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
                ])@endcomponent
                <a class="btn" href="{{ home_url() }}/category/focus-points/all-in/women-of-color/">More WOC Stories</a>
            </div>
    
    
            <div class="col-md-6">
                  <header class="row">
                        <div class="icon col-2">
                            <img src="<?php the_field('lgbt_image'); ?>" />
                        </div>
                        <div class="text col-10">
                            <h2 class="section-title"><a href="{{ home_url() }}/category/focus-points/all-in/lgbt-in-biz/">LGBT+ in Business</a></h2>
                            <p><?php the_field('lgbt_description'); ?></p>
                        </div>
                  </header>
    
            @component('partials/post-group', [
                'posts_per_page' => 1,
                'cat' => array(146),
                'featured_post' => false,
                'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
            ])@endcomponent
            
            <a class="btn" href="{{ home_url() }}/category/focus-points/all-in/lgbt-in-biz/">More LGBT+ Stories</a>
                </div>
            </div>
        </section>
    
    
        {{-- VIDEO BANNER --}}
              
        <section class="video-banner row">
            <div>
                <a href="{!! site_url() !!}/category/the-stories/">
                        @php $image = get_field('video_banner') @endphp
                        @if( !empty($image) )
                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" />
                        @endif
                </a>
            </div>
            <a href="{!! site_url() !!}/category/the-stories/" class="btn">See Our Videos</a>
        </section>
    
    
        {{-- NEW LISTS  --}}
              
        <section id="new-lists">
            <div class="row">
           <div class="col-md-6">
                <article class="post-item">
                    <div class="post-wrap">
                        <div class="entry-thumbnail">
                            <div class="thumbnail">
                            <?php $leftBanner = get_field('largebanner_left'); ?>
                            <a  href="<?php the_field('largebanner_left_link'); ?>">
                                <div class="fill">
                                    <img src="<?php echo $leftBanner['sizes']['medium']; ?>" width="100%">
                                </div>
                            </a>
                        </div>
                        </div>
                        <div class="entry-text">
                            <h3><a href="<?php the_field('largebanner_left_link'); ?>"><?php the_field('largebanner_left_title'); ?></a></h3>
                            <p><?php the_field('largebanner_left_text'); ?></p>
                            <a class="btn" href="<?php the_field('largebanner_left_link'); ?>">Explore</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6">
                <article class="post-item">
                        <div class="post-wrap">
                            <div class="entry-thumbnail">
                                <div class="thumbnail">
                                    <?php $rightBanner = get_field('largebanner_right'); ?>
                                    <a  href="<?php the_field('largebanner_right_link'); ?>">
                                        <div class="fill">
                                            <img src="<?php echo $rightBanner['sizes']['medium']; ?>" width="100%">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="entry-text">
                                <h3><a href="<?php the_field('largebanner_right_link'); ?>"><?php the_field('largebanner_right_title'); ?></a></h3>
                                <p><?php the_field('largebanner_right_text'); ?></p>
                                <a class="btn" href="<?php the_field('largebanner_right_link'); ?>">Explore</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    
    
        {{-- PAST LISTS  --}}
              
        <section id="pastlists">
            <h2 class="blue-title">Our Past Lists</h2>
    
            <div class="row">
                <div class="col-md-2">
                    <img src="<?php the_field('banner_medium3_image'); ?>" />
                </div>
                <div class="col-md-10">
                    <h3><a href="{{ home_url() }}/three-good-women/">Three Good Women</a></h3>
                    <p>Stand-out entrepreneurs who are doing well and doing good (2016)</p>
                </div>
            </div>
    
            <div class="row">
                    <div class="col-md-2">
                    <img src="<?php the_field('banner_medium1_image'); ?>" />
                </div>
                <div class="col-md-10">
                    <h3><a href="{{ home_url() }}/power-list-landing-page/">The Power List</a></h3>
                    <p>10 outstanding experienced entrepreneurs who are leading successful businesses (2015)</p>
                </div>
            </div>
    
            <div class="row">
                    <div class="col-md-2">
                    <img src="<?php the_field('banner_medium2_image'); ?>" />
                </div>
                <div class="col-md-10">
                    <h3><a href="{{ home_url() }}/young-women-watch/">Young Women to Watch</a></h3>
                    <p>10 promising young entrepreneurs who are blowing through barriers (2014)</p>
                </div>
            </div>
            
        </section>
    
        {{-- PARTNERSHIPS --}}
              
        <section id="partnerships">
    
            <h2 class="blue-title">Partnerships</h2>
    
            <div class="row">
                <div class="col-md-2">
                    <img src="<?php the_field('banner_small2_image'); ?>" />
                </div>
                <div class="col-md-10">
                    <h3><a target="_blank" href="http://www.forbes.com/sites/thestoryexchange/#320bb1b8562d">Our Stories on Forbes</a></h3>
                    <p>A selection of entrepreneur profiles we publish as Forbes Entrepreneur contributors.</p>
                </div>
            </div> 
    
            <div class="row">
                    <div class="col-md-2">
                    <img src="<?php the_field('banner_small1_image'); ?>" />
                </div>
                <div class="col-md-10">
                    <h3><a target="_blank" href="http://www.inc.com/author/colleen-debaise">Entrepreneur Tips on Inc.</a></h3>
                    <p>Words of wisdom from select women business owners featured in our podcast.</p>
                </div>
            </div>
    
            <div class="row">
                    <div class="col-md-2">
                    <img src="<?php the_field('banner_small3_image'); ?>" />
                </div>
                <div class="col-md-10">
                    <h3><a target="_blank" href="http://www.nytimes.com/video/the-story-exchange">As Seen in The New York Times</a></h3>
                    <p>A collection of TSE videos and articles featured in The Times' "Who's the Boss" blog.</p>
                </div>
            </div>
        </section>     
    </div>
@endsection