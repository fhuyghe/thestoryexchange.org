{{--
  Title: Footer CTA
  Category: formatting
  Icon: admin-comments
  Keywords: call action footer
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}
@php $backgroundImage = get_field('image') @endphp
  <div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
    @if( !empty( $backgroundImage ) )
        <img class="background-image" src="<?php echo esc_url($backgroundImage['url']); ?>" alt="<?php echo esc_attr($backgroundImage['alt']); ?>" />
    @endif
    <div class="wrap">
      <h2>{{ the_field('title') }}</h2>
      <p>{{ the_field('text') }}</p>
      <a class="button red" href="{{ the_field('link') }}">{{ the_field('button_text') }}</a>
    </div>
  </div>