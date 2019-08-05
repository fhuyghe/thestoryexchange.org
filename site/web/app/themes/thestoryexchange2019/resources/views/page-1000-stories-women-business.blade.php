{{-- =============================================================================
// TEMPLATE NAME: 1000 Stories
// =============================================================================--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
<div class="row">
    <div class="col-lg-8">
        <section class="page-header">
                <h1>{!! the_title() !!}</h1>
                <p>{!! the_field('subtitle') !!}</p>
            
        </section>
        
        <div id="1000Stories-Map" style="padding-top: 35px; clear: both; display: block;">
            <iframe src="https://thestoryexchange.cartodb.com/viz/73667268-8c05-11e5-9224-0e98b61680bf/embed_map" width="100%" height="520" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
        </div>
        
        <section class="articles">
        <h2>{!! the_field('findings_title') !!}</h2>
        <p>{!! the_field('findings_subtitle') !!}</p>

        <div class="row">
        
        <article class="col-md-4">
            <a class="entry-thumb" href="http://thestoryexchange.org/1000-own-words/">
                <img src="http://thestoryexchange.org/wp-content/uploads/2015/11/TSE_1000Stories_Image1_Thumbnail-011.jpg" />
            </a>
            <h3><a title="Permalink to: &quot;Women's Stories Reveal the Richness of Female Entrepreneurship&quot;" href="http://thestoryexchange.org/1000-own-words/">Women's Stories Reveal the Richness of Female Entrepreneurship</a></h3>
            <p>We collected and analyzed the stories of 1,000 women business owners. Our key findings paint a picture of female entrepreneurship that's far bigger and far richer than the prevailing business culture would suggest.</p>
        </article>
        
        <article class="col-md-4">
            <a class="entry-thumb" href="http://thestoryexchange.org/1000-why-start/">
                <img src="http://thestoryexchange.org/wp-content/uploads/2015/11/TSE_1000Stories_WhyStart_Thumbnail-011.jpg" />
            </a>
            <h3><a title="Permalink to: &quot;Getting Started: The Origins of Female Inspiration&quot;" href="http://thestoryexchange.org/1000-why-start/">Getting Started: The Origins of Female Inspiration</a></h3>
            <p>Over 1,000 women business owners told us why they chose entrepreneurship. We examined their stories to better understand what drives them.</p>
        </article>

        <article class="col-md-4">
            <a class="entry-thumb" href="http://thestoryexchange.org/1000-success/">
                <img src="http://thestoryexchange.org/wp-content/uploads/2015/11/TSE_1000Stories_WhatisSuccess_Thumbnail-011.jpg" />
            </a>
            <h3><a title="Permalink to: &quot;Our Definitions of Success: Meaning Over Money&quot;" href="http://thestoryexchange.org/1000-success/">Our Definitions of Success: Meaning Over Money</a></h3>
            <p>Women are debunking the myth that entrepreneurship is about building the next big thing and making millions. Their goals are more lofty — and arguably more difficult.</p>
        </article>

        <article class="col-md-4">
            <a class="entry-thumb" href="http://thestoryexchange.org/1000-challenges/">
                <img src="http://thestoryexchange.org/wp-content/uploads/2015/11/04_Challenges-THUMB.jpg"/>
            </a>
            <h3><a title="Permalink to: &quot;Top Challenges: Getting More Strategic, Sooner&quot;" href="http://thestoryexchange.org/1000-challenges/">Top Challenges: Getting More Strategic, Sooner</a></h3>
            <p>The nuts-and-bolts work of running a business preoccupies many women entrepreneurs. Are they thinking strategically enough soon enough to build the strongest, best companies they can?</p>
        </article>

        <article class="col-md-4">
            <a class="entry-thumb" href="http://thestoryexchange.org/1000-role-models/">
                <img src="http://thestoryexchange.org/wp-content/uploads/2015/11/05_Role-Models-THUMB.jpg"/>
            </a>
            <h3><a title="Permalink to: &quot;Role Models: Who They See When They Look Up&quot;" href="http://thestoryexchange.org/1000-role-models/">Role Models: Who They See When They Look Up</a></h3>
            <p>When it comes to role models, the women entrepreneurs who took part in our 1,000 Stories campaign revere one key family member over all other influencers.</p>
        </article>
        
        <article class="col-md-4">
            <a class="entry-thumb" href="http://thestoryexchange.org/1000-closures/">
                <img src="http://i1.wp.com/thestoryexchange.org/wp-content/uploads/2015/11/Closures.jpg"/>
            </a>
            <h3><a title="Permalink to: &quot;When It's Closing Time&quot;" href="http://thestoryexchange.org/1000-closures/">When It's Closing Time</a></h3>
            <p>Businesses shut their doors for a variety of reasons, as some women in our 1,000 Stories project learned — the hard way.</p>
        </article>

        </div>
        </section>
    </div>

    <div class="col-lg-4">
            <?php the_content(); ?>
    </div> 
    </div> 
    @endwhile    
@endsection