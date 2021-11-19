{{-- 
  TEMPLATE NAME: About Us 
--}}

@extends('layouts.app')

@section('content')
<div class="container">
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <section class="content">
    @php the_content() @endphp
    </section>

    <section class="who">
      <h2>Who We Are</h2>
      @if( have_rows('who_we_are') )
      <div class="row">
        @while( have_rows('who_we_are') ) @php the_row() @endphp
          <div class="about-person col-md-6">
            <div class="about-photo">
              @php $image = get_sub_field('photo') @endphp
              @if($image)
                <img src="{{ $image['sizes']['medium'] }}" alt="{!! $image['alt'] !!}" />
              @endif
            </div>
            <div class="about-text">
              <h3>{!! the_sub_field('name') !!}</h3>
              {!! the_sub_field('bio') !!}
            </div>
          </div>
        @endwhile
      </div>
      @endif
    </section>
  @endwhile
</div>
@endsection
