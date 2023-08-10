{{--
Template Name: Afghan Women
Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="page-header afghan-header">
        <div class="row">
          <div class="col-md-6 afghan-header-image">
            Image
          </div>
          <div class="col-md-6 afghan-header-text">
            <h1>{!! App::title() !!}</h1>
            {{ get_field('subheading') }}
            <hr/>
            Some text
            <button>Button</button>
          </div>
        </div>
      </div>
  
    @include('partials.content-page')
  @endwhile
@endsection
