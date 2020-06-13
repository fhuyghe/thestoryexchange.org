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
		@foreach ( get_field('podcast_episodes') as $episode_row ) @php the_row() @endphp
		@php $episode = get_sub_field('episode') @endphp
		<div class="col-md-6 col-lg-3 episode @if($episode) active @endif">
			@php $image = get_sub_field('thumbnail') @endphp
			<a href="{{ the_permalink($episode->ID) }}">
				<div class="thumbnail" style="background-image: url({!! $image['sizes']['medium'] !!})">
				</div>
			</a>
			<a href="{{ the_permalink($episode->ID) }}">
			<h5>@if($loop->index == 0)
				Trailer
				@else
				Episode {{$loop->index}}
				@endif
			</h5>
			<h4>{{ the_sub_field('title') }}</h4>
			</a>
			<p>{{ the_sub_field('description') }}</p>
		</div>
    	@endforeach
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