{{-- 
	Template Name: Running Women 
--}}

@extends('layouts.app')

@section('content')
<div class="container">
	<section class="page-header text-center">
		<h1>Running Women</h1>
		<p class="subtitle">The Drive to Elect More Women in 2018</p>
		{!! the_field('introduction') !!}
	</section>

	<section id="intro">
		<img src="<?php $image = get_field('main_image'); echo $image['url'] ?>">
		{!! the_field('second_text') !!}
	</section>


	<section id="featured-post" class="">
		@php $post_object = get_field('featured_post') @endphp
		@if( $post_object )
			@php // override $post
                $post = $post_object;
                setup_postdata( $post ); 
			@endphp

			<div class="featured">
				<img src="{{ the_post_thumbnail_url('full') }}" width="100%">
			</div>
			<a href="{{ the_permalink() }}">
				<div class="caption">
					<h2>{{ the_title() }}</h2>
					@if (function_exists('the_subheading')) {{ the_subheading('<p>', '</p>') }} @endif
				</div>
			</a>
			@php wp_reset_postdata() @endphp
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

	<div id="full-grey">

		<div class="background"></div>
			<div class="wrap row">
				<div class="org-menu col-md-3">
					<section>
					@if( have_rows('organizations') ) @while ( have_rows('organizations') ) @php the_row() @endphp

					<a href="#{{ preg_replace("/[^a-zA-Z0-9]+/", "", get_sub_field('name')) }}">
						 {{the_sub_field('name')}}
					</a><br>

					@endwhile @endif
				</section>
				</div>
				<div class="content  col-md-9">
					<section class="intro">
						{!! the_field('bottom_section_text') !!}
					</section>

					@if( have_rows('organizations') ) @while ( have_rows('organizations') ) @php the_row() @endphp
					<div class="organization" id="{{ preg_replace("/[^a-zA-Z0-9]+/", "", get_sub_field('name')) }}">
						<h2>{{ get_sub_field('name') }}</h2>
						<div class="org-description row">
							@php $mainpost = get_sub_field('organization_post') @endphp
							@if ($mainpost)
								<div class="thumbnail col-md-3">
									<img src="<?php echo get_the_post_thumbnail_url($mainpost->ID, 'medium') ?>">
								</div>
								<div class="text col-md-9">
									<a href="<?php echo get_permalink($mainpost->ID); ?>">
										<?php echo get_the_title($mainpost->ID); ?>
									</a>
									<?php echo get_the_excerpt($mainpost->ID); ?>
								</div>
							@else
								{{-- If the GOP article is not ready yet --}}
								@php $temporary = get_field('temporary_content') @endphp
								<div class="thumbnail">
									<img src="<?php echo $temporary['gop_thumbnail']['url'] ?>">
								</div>
								<div class="text">
									<a>{{ $temporary['gop_title'] }}</a>
									{{ $temporary['gop_text'] }}
								</div>
							@endif
						</div>
						<div class="candidate_posts row">
							@php 	
							$candidate1 = get_sub_field('person_1_post');
							$candidate2 = get_sub_field('person_2_post');
							$candidate3 = get_sub_field('person_3_post');
							@endphp
							<div class="candidate_post col-md-4">
								@if ($candidate1)
									<img src="{{ get_the_post_thumbnail_url($candidate1->ID, 'small') }}">
									<div class="text">
										<a href="{{ get_permalink($candidate1->ID) }}">
											{{ get_the_title($candidate1->ID) }}
										</a>
										{{ get_the_excerpt($candidate1->ID) }}
									</div>
								@endif
							</div>
							<div class="candidate_post col-md-4">
								@if ($candidate2)
									<img src="{{ get_the_post_thumbnail_url($candidate2->ID, 'small') }}">
									<div class="text">
										<a href="{{ get_permalink($candidate2->ID) }}">
											{{ get_the_title($candidate2->ID) }}
										</a>
										{{ get_the_excerpt($candidate2->ID) }}
									</div>
								@endif
							</div>
							<div class="candidate_post col-md-4">
								@if ($candidate3)
									<img src="{{ get_the_post_thumbnail_url($candidate3->ID, 'small') }}">
									<div class="text">
										<a href="{{ get_permalink($candidate3->ID) }}">
											{{ get_the_title($candidate3->ID) }}
										</a>
										{{ get_the_excerpt($candidate3->ID) }}
									</div>
								@endif
							</div>
						</div>

					</div>

					@endwhile
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection