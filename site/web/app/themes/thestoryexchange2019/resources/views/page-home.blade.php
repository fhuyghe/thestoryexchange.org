{{-- =============================================================================
// TEMPLATE NAME: Landing Page
// ============================================================================= --}}

@extends('layouts.app')

@section('content')

  {{-- FEATURED POST --}}

  <section id="featured-post">
    <div class="row">
      @component('partials.post-item-featured', [
        'picture' => get_field('featured_image'),
        'post_object' => get_field('featured_post')
      ])@endcomponent
    </div>
  </section>
  
@endsection
