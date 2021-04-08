{{--
  Title: Newsletter Subscribe
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
    <h2>{{ $block['title'] }}</h2>
    {!! $block['text'] !!}
    @include('partials.mailchimp-form')
</div>