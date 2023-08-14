{{--
  Title: Timeline
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
    @php $rows = get_field('rows') @endphp
        @if( $rows)
            @php $lastYear = 0 @endphp
            @while ( have_rows('rows') )
                @php
                the_row(); 
                $year = get_sub_field('date'); 
                $link = get_sub_field('link'); 
                $image = get_sub_field('image'); 
                $newYear = $year !== $lastYear; 
                $lastYear = $year;
                @endphp

                <div class='timeline-row'>

            @if($newYear)
                <div class='timeline-year'>
                    <div class='timeline-year-wrap'>{{ $year }}</div>
                </div>
            @endif

                <div class="content-wrap row {{ the_sub_field('type') }}">
                    <div class="timeline-image col-md-6">
                    @if ($image)
                        <img src='{{ $image['sizes']['medium'] }}'/>
                        <div class="timeline-image-caption">
                            {{ $image['caption'] }}
                        </div>
                    @endif
                    </div>
                    <div class="timeline-text col-md-6">
                    <div class="text-wrap">
                        {{ the_sub_field('text') }}
                        @if($link) 
                            <a class='timeline-link' target='_blank' href='{{$link}}'>Read More  <i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
            @endwhile
        @endif
  </section>
</div>