{{--
  Title: Featured Category
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsMode: false
  SupportsMultiple: true
--}}

@php global $post @endphp

<section id="{{ $block['id'] }}" class="{{ $block['classes'] }}">
  <h2>{{ $block['cat']->name }}</h2>
  @if($block['articles'])
  <div class="row">
    @foreach ($block['articles'] as $post) @php setup_postdata($post) @endphp
      <div class="col-md-3">
        @include('partials.post-item')
      </div>
      @php wp_reset_postdata() @endphp
      @endforeach
    </div>
  @endif
  </section>