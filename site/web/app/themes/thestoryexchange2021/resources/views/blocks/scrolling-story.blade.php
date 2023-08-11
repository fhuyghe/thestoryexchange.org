{{--
  Title: Scrolling Story
  Category: formatting
  Icon: admin-page
  Keywords: animation slideshow slide
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}
@php $slides = get_field('slides')@endphp

<section id="{{ $block['id'] }}" data-scroll-container class="wp-block {{ $block['classes'] }}">
    <div class="scrolling-story-text">
        {{ $slides[0]['text'] }}
    </div>
  @foreach ($slides as $slide)
  <div class="scrolling-story-slide @if(!$slide['images'])no-image @endif"
    data-scroll-section
    data-text="{{ $slide['text'] }}"
    >
        @if ($slide['images'])
            @foreach ($slide['images'] as $image)
                <div class="image" data-scroll data-speed="{{ $loop->index }}">
                    {!! wp_get_attachment_image( $image['id'], 'large' ) !!}
                </div>
            @endforeach
            @endif
        </div>
  @endforeach
</section>