{{-- =============================================================================
// TEMPLATE NAME: Timeline Page
// =============================================================================--}}

@extends('layouts.app')

@section('content')
<div class="container">
          <div id="timelinePage">
            <h1>{!! the_title() !!}</h1>
          
          <section id="timeline-top" class="">     
              <?php the_content(); ?>
          </section>


        @if( get_field('house_senate'))
          <section id="timeline-charts" class="clearfix">     
              <div class="house">
                  <h3>Number of women in the House</h3>
                  <div class="barGraph">
                    <div class="dem"></div>
                    <div class="rep"></div>
                  </div>
                  <div class="written">
                    <p><span class="dem"></span> Democrats</p>
                    <p><span class="rep"></span> Republicans</p>
                  </div>
              </div>
              <div class="congress">
                  <h3>Share of Congress</h3>
                  <div class="chart">
                      <canvas id="congressChart"></canvas>
                      <div class="percents"></div>
                  </div>
              </div>
              <div class="senate">
                  <h3>Number of women in Senate</h3>
                  <div class="barGraph">
                    <div class="dem"></div>
                    <div class="rep"></div>
                  </div>
                  <div class="written">
                    <p><span class="dem"></span> Democrats</p>
                    <p><span class="rep"></span> Republicans</p>
                  </div>
              </div>
          </section>
        @endif

          <section id="timeline-content" class="">     
                @if( $data['events'])
                    @php $lastYear = 0 @endphp
                    @while ( have_rows('events') )
                        @php
                        the_row(); 
                        $year = get_sub_field('year'); 
                        $link = get_sub_field('link'); 
                        $image = get_sub_field('image'); 
                        $newYear = $year !== $lastYear; 
                        $lastYear = $year;
                        $numbers = get_sub_field('senate');
                        $numbers = explode(",", $numbers);
                        @endphp

                        <div 
                            class='event'
                            data-housedem="{{ $numbers[0] }}" 
                            data-houserep="{{ $numbers[1] }}" 
                            data-senatedem="{{ $numbers[2] }}" 
                            data-senaterep="{{ $numbers[3] }}">

                    @if($newYear)
                        <div class='year'>{{ $year }}</div>
                    @endif

                        <div class="content-wrap row {{ the_sub_field('type') }}">
                            <div class="image col-md-6">
                            @if ($image)
                                <img src='{{ $image['sizes']['medium'] }}'/>
                                <div class="caption">
                                    {{ $image['caption'] }}
                                </div>
                            @endif
                            </div>
                            <div class="text col-md-6">
                            <div class="text-wrap">
                                {{ the_sub_field('text') }}
                                @if($link) 
                                    <a class='link' target='_blank' href='{{$link}}'>Read More  <i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                    @endwhile
                @endif
              <div class='event cf' data-housedem="{{ $numbers[0] }}" 
                                    data-houserep="{{ $numbers[1] }}" 
                                    data-senatedem="{{ $numbers[2] }}" 
                                    data-senaterep="{{ $numbers[3] }}">
                  <div class="gradient"></div>
                  <div class="content-wrap cf">
                      <div class="image col-md-6"></div>
                      <div class="text col-md-6"></div>
                  </div>
              </div>
          </section>
      </div>
    </div>
@endsection
