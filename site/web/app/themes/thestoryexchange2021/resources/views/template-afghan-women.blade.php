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
            {{ get_field('subheading') }}
            {!! the_post_thumbnail() !!}
            <p>A Paragraph</p>
            {!! do_shortcode('[spp-player ctabuttons="off"]')!!}
            <p>The player</p>
          </div>
            <div class="read-more">
              Continue Reading
              <div class="arrow-down"><i class="fa-light fa-arrow-down"></i></div>
            </div>
      </div>
  
    @include('partials.content-page')
  @endwhile
@endsection
