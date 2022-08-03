{{-- 
  TEMPLATE NAME: Fixing Food
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

  <div class="container">
    <section class="content">
    @php the_content() @endphp
    </section>

    <section class="videos">
      @if( have_rows('videos') )
      <div class="row">
        @while( have_rows('videos') ) @php the_row() @endphp
          <div class="video col-md-6">
            <div class="">
              <h3>{!! the_sub_field('title') !!}</h3>
              {!! the_sub_field('text') !!}
            </div>
          </div>
        @endwhile
      </div>
      @endif
    </section>
  </div>
  @endwhile
@endsection
