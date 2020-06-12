{{-- 
	Template Name: 100 Years of Power
--}}

@extends('layouts.app')

@section('content')
				
	<section class="page-header text-center">
		<h1>{{ the_title() }}</h1>
		{!! the_field('introduction') !!}
	</section>

	<section id="intro">
		<img src="<?php $image = get_field('main_image'); echo $image['url'] ?>">
		{!! the_field('second_text') !!}
	</section>

	<section id="episodes" class="row">
		@if( have_rows('podcast_episodes') )
    	@while ( have_rows('podcast_episodes') ) @php the_row() @endphp
		<div class="col-md-3 episode">
			<div class="thumbnail">
				@php $image = get_sub_field('thumbnail') @endphp
				<img src="{!! $image['sizes']['medium'] !!}" alt="{!! $image['alt'] !!}" />
			</div>
			<h4>{{ the_sub_field('title') }}</h4>
			<p>{{ the_sub_field('description') }}</p>
		</div>
    	@endwhile
		@endif
	</section>

	<section id="timeline" class="row">
		@php $timeline = get_field('timeline') @endphp
		@if ($timeline)
		<div class="thumbnail col-md-6">
			<img src="{{ $timeline['timeline_image']['sizes'][ 'medium' ] }}">
		</div>
		<div class="text col-md-6">
			<a href="{{ $timeline['timeline_link'] }}">
				<h4>{{ $timeline['timeline_title'] }}</h4>
			</a>
			<p>{!! $timeline['timeline_text'] !!}</p>
			<a class="btn" href="{{ $timeline['timeline_link'] }}">Explore</a>
		</div>
		@endif
	</section>

@endsection