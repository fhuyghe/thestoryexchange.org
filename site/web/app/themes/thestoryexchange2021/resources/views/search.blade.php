@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    <div class="post-group format-horizontal">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
      @endwhile
    </div>

    {!! get_the_posts_navigation() !!}
  </div>
@endsection
