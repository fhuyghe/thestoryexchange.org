{{--
  Template Name: Category Page
--}}

@extends('layouts.app')

@section('content')
          
    <section class="page-header">
        @while(have_posts()) @php the_post() @endphp
            <h1>{!! the_title() !!}</h1>
            {!! the_content() !!}
        @endwhile
    </section>

    <section id="video-posts">
        @php 
        global $post;
        $post = get_field('pinned_post');
         @endphp
        @if($post)
            @php setup_postdata( $post ) @endphp
            <div class="post-group row format-vertical feature-first">
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
            'posts_per_page' => 22,
            'cat' => array($main_cat),
            'format' => 'vertical', 
            'featured_post' => $featured
        ])@endcomponent
        <a class="btn" href="{{ get_category_link($main_cat) }}">More Stories</a>
    </section>
          
    {{-- <section class="posts threecolumns">
        <h2 class="section-title">Articles</h2>
        @component('partials/post-group', [
            'posts_per_page' => 3,
            'cat' => array(218, -220), 
            'tag' => 'video',
            'format' => 'vertical', 
            'featured_post' => false
        ])@endcomponent   
        
    </section> --}}

@endsection