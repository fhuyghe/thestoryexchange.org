{{--
Template Name: 1000 Stories
--}}

@extends('layouts.app')

@php 
global $post;
$post_classes = null;
$format = null;
$showExcerpt = false;
@endphp

@section('content')
@while(have_posts()) @php the_post() @endphp
<div class="container">
        <section class="page-header">
                <h1>{!! the_title() !!}</h1>
                <p>{!! the_field('subtitle') !!}</p>
        </section>
        
        <section id="1000Stories-Map">
            <iframe src="https://thestoryexchange.cartodb.com/viz/73667268-8c05-11e5-9224-0e98b61680bf/embed_map" width="100%" height="600" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
        </section>
        
        <section class="articles">
        <h2>{!! the_field('findings_title') !!}</h2>
        <p>{!! the_field('findings_subtitle') !!}</p>

        <div class="row">

        @if( have_rows('findings') )
            <div class="post-group format-vertical">
            @while ( have_rows('findings') ) 
                @php the_row(); $post_object = get_sub_field('post');@endphp
                @if( $post_object )
                    @php $post = $post_object; setup_postdata( $post ); @endphp 
                    @include('partials.post-item')
                    @php wp_reset_postdata() @endphp
                @endif
            @endwhile     
            </div>   
        @endif

        </div>
        </section>
        <div class="letter">
            <?php the_content(); ?>
        </div> 
    </div> 
    @endwhile    
</div> 
@endsection