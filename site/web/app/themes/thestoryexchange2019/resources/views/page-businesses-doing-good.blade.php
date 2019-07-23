{{-- =============================================================================
// TEMPLATE NAME: Businesses Doing Good
// =============================================================================--}}

@extends('layouts.app')

@section('content')
          
    <section class="page-header">
        <h1>{!! the_title() !!}</h1>
        {!! the_content() !!}
    </section>

    <section id="video-posts">     
        @component('partials/post-group', [
            'posts_per_page' => 22,
            'cat' => array(218), 
            'tag' => 'video',
            'format' => 'vertical', 
            'featured_post' => true
        ])@endcomponent
    </section>
          
    <section class="posts threecolumns">
    <h2 class="section-title">Articles</h2>
    @component('partials/post-group', [
                    'posts_per_page' => 3,
                    'cat' => array(218, -220), 
                    'tag' => 'video',
                    'format' => 'vertical', 
                    'featured_post' => false
                ])@endcomponent   
        <a class="btn" href="{{ home_url() }}/category/focus-points/good-on-the-ground/">More Stories</a>
    </section>


@endsection