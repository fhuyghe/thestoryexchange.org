{{--
Template Name: Afghan Women
Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="page-header afghan-header">
        <div class="container">
            <h1>{!! App::title() !!}</h1>
            <p class="afghan-header-subheading">{{ get_field('subheading') }}</p>
            <div class="afghan-header-thumbnail">
              {!! the_post_thumbnail() !!}
            </div>
            {!! get_field('intro') !!}
            {!! do_shortcode('[spp-player ctabuttons="off"]')!!}
          </div>
            <div class="read-more" onclick="window.scrollTo({top: window.innerHeight, left: 0, behavior: 'smooth'})">
              {{ __('Continue Reading', 'sage')}}
              <div class="arrow-down"><i class="fa-light fa-arrow-down"></i></div>
            </div>
      </div>
  
    @include('partials.content-page')
  @endwhile
@endsection
