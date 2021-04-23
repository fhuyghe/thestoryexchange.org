{{--
  Template Name: Advice & Tips
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.content-advice-tips')
  @endwhile
@endsection