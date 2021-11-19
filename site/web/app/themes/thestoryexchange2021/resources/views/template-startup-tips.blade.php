{{--
  Template Name: Advice & Tips
--}}

@extends('layouts.app')

@section('content')
<div class="container">
  @while(have_posts()) @php the_post() @endphp
  @include('partials.content-startup-tips')
  @endwhile
</div>
@endsection