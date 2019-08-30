{{-- 
  TEMPLATE NAME: About Us 
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <section class="content">
    @php the_content() @endphp
    </section>

    <section class="featured">
        <h3>Featured in</h3>
        <div class="features row">
          @if( have_rows('as_featured_in') )
          @while ( have_rows('as_featured_in') ) @php the_row() @endphp
          <div class="feature col-md-3 col-6">
            <a href="{{ the_sub_field('link') }}">
                @php $image = get_sub_field('logo') @endphp
                <img src="{{ $image['url'] }}" alt="{!! $image['alt'] !!}" />
              </a>
            </div>
            @endwhile
          </div>
      @endif
    </section>

    <section class="who">
      <h3>Who We Are</h3>
      @if( have_rows('who_we_are') )
        @while ( have_rows('who_we_are') ) @php the_row() @endphp
          <div class="about-person">
            <div class="about-photo">
                @php $image = get_sub_field('photo') @endphp
                <img src="{{ $image['url'] }}" alt="{!! $image['alt'] !!}" />
            </div>
            <div class="about-text">
              {!! the_sub_field('bio') !!}
            </div>
          </div>
        @endwhile
      @endif
    </section>
  @endwhile
@endsection
