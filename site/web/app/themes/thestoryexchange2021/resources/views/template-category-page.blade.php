{{--
  Template Name: Category Page
--}}

@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-header">
        @while(have_posts()) @php the_post() @endphp
            <h1>{!! the_title() !!}</h1>
            {!! the_content() !!}
        @endwhile
    </section>

    <section id="video-posts">
        @php 
        global $post;
        $pinnedPost = get_field('pinned_post');
        $post = $pinnedPost;
        $post_classes = 'col-md-3';
        $showExcerpt = false;
         @endphp
        @if($post)
            @php setup_postdata( $post ) @endphp
            <div class="post-group format-vertical feature-first">
                @include('partials/post-item')
            </div>
            @php wp_reset_postdata() @endphp
        @endif

        @php 
            $main_cat = get_field('category');
            if (get_field('pinned_post')){
                $featured = false;
            } else {
                $featured = true;
            }
        @endphp

        @component('partials/post-group', [
            'posts_per_page' => -1,
            'cat' => array($main_cat),
            'additional_args' => [
                'post__not_in' => array($pinnedPost->ID)
            ],
            'format' => 'vertical', 
            'featured_post' => $featured,
            'showExcerpt' => false,
            'post_classes' => null
        ])@endcomponent
        {{-- <a class="btn" href="{{ get_category_link($main_cat) }}">More Stories</a> --}}
    </section>
          
    <section class="posts threecolumns">
        @php 
            $extraCat = get_field('extra_category');
        @endphp
        <h2 class="section-title">{{ get_cat_name($extraCat) }}</h2>
        @component('partials/post-group', [
            'posts_per_page' => 3,
            'cat' => array($extraCat, '-' . $main_cat),
            'format' => 'vertical', 
            'featured_post' => false,
            'showExcerpt' => false,
            'post_classes' => null
        ])@endcomponent   
        <a class="btn" href="{{ get_category_link($extraCat) }}">More Stories</a>
    </section>
</div>
@endsection