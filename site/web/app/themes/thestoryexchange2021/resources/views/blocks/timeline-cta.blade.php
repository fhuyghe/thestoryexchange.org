{{--
  Title: Timeline CTA
  Category: formatting
  Icon: admin-comments
  Keywords: timeline
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php $image = get_field('background_image') @endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
    <div class="timeline-cta-wrap">
        <div class="timeline-cta-text">
        <h1>{{ get_field('title') }}</h1>
        <p>{{ get_field('subtitle') }}</p>
        <a class="button red" href="{{ the_field('link') }}">{{ the_field('button_text') }}</a>
        </div>
        @if($image)
        <img src="{{ $image['sizes']['large'] }}" alt="{{ $image['alt'] }}" class="timeline-cta-background">
        @endif
    </div>
</div>