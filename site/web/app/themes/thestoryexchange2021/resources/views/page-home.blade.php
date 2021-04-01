{{-- =============================================================================
// TEMPLATE NAME: Landing Page
// ============================================================================= --}}

@extends('layouts.app')

@section('content')

  {{-- FEATURED POST --}}

  <section id="featured-post">
    <div class="post-group format-featured">
      
      @php $featured = get_field('featured_post') ?: null @endphp
      @if($featured)
        @php $featuredID = $featured->ID @endphp
      @else
        @php $featuredID = '' @endphp
      @endif

      @component('partials.post-item-featured', [
        'picture' => get_field('featured_image'),
        'post_object' => $featured
      ])@endcomponent
    </div>
  </section>

  {{-- LATEST POSTS --}}

  <section id="latest-posts">
    @component('partials.post-group', [
      'posts_per_page' => 10,
      'cat' => '41, 187, 35', //Entrepreneur Stories, Focus Points and "Articles Offering Advice and Tips to Women Entrepreneurs”
      'additional_args' => [
        'post__not_in' => array($featuredID)
      ],
      'format' => 'horizontal',
      'featured_post' => false
    ])@endcomponent
    
    @component('partials.category-link', [
      'name' => 'Entrepreneur Stories'
    ])
      More Stories
    @endcomponent
  </section>

  {!! the_content() !!}


@endsection
