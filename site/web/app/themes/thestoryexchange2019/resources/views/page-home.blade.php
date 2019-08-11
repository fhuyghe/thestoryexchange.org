{{-- =============================================================================
// TEMPLATE NAME: Landing Page
// ============================================================================= --}}

@extends('layouts.app')

@section('content')

  {{-- FEATURED POST --}}

  <section id="featured-post">
    <div class="post-group format-featured">
      @php
        $featured = get_field('featured_post')
      @endphp
      @component('partials.post-item-featured', [
        'picture' => get_field('featured_image'),
        'post_object' => $featured
      ])@endcomponent
    </div>
  </section>

  {{-- LATEST POSTS --}}

  <section id="latest-posts">
    @component('partials.post-group', [
      'posts_per_page' => 5,
      'cat' => '41, 187, 35',
      'additional_args' => [
        'post__not_in' => array($featured->ID)
      ],
      'format' => 'horizontal'
    ])@endcomponent
    @component('partials.category-link', [
      'name' => 'Entrepreneur Stories',
      'link_class' => 'more-link'
    ])
      More Stories
    @endcomponent
  </section>

  {{-- ICONS --}}

  <section id="three-icons">
    <div class="row">
      @for ($i = 1; $i <= 3; $i++)
        @component('partials.icon', [
          'number' => $i
          ])@endcomponent
        @endfor
    </div>
  </section>

  {{-- WOMEN IN THE NEWS/HAPPENING NOW --}}

  <section id="happening-now">
    <h2 class="section-heading">
      Women in the News
    </h2>
    @component('partials.post-group', [
      'posts_per_page' => 3,
      'cat' => ['73'],
      'format' => 'vertical'
    ])@endcomponent
    @component('partials.btn-link', [
      'url' => get_page_link( get_post( 32841 ) ),
    ])
      More News
    @endcomponent
  </section>

  {{-- BANNERS --}}

  <section id="banners">
    @for ($i = 3; $i <= 4; $i++)
      @component('partials.banner', [
        'number' => $i
      ])@endcomponent
    @endfor
  </section>

@endsection
