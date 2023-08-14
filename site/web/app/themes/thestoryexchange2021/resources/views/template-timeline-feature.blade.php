{{--
Template Name: Timeline Feature
Template Post Type: post
--}}

@extends('layouts.app')

@php global $post @endphp

@section('content')
  @while(have_posts()) @php the_post() @endphp
    {{-- Header --}}
    <div class="page-header timeline-header">
      <div class="timeline-header-wrap">
        <div class="timeline-header-text">
          <h1>{!! App::title() !!}</h1>
          {{ get_field('subheading') }}
        </div>
        {!! the_post_thumbnail('full', ['class' => 'timeline-header-background']) !!}
      </div>
      <div class="timeline-header-caption caption">
        {{ get_the_post_thumbnail_caption($post) }}
      </div>
    </div>
    {{-- Content --}}
    @include('partials.content-page')
  @endwhile
@endsection
