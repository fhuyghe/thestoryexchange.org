{{--
Template Name: Brilliant Businesses
--}}
@php global $post; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{!! the_title() !!}</h1>
    {!! the_content() !!}
    
        <section id="businesses" class="">
            <div class="wrap">
                @foreach ($data['sections'] as $section)
                    <div class="business-section">
                        <h2>{{ $section['title'] }}</h2>
                        <div class="row">
                            @foreach ($section['stories'] as $item)
                                <div class="col-md-4">
                                    @php $post=$item['story'] @endphp
                                    @php setup_postdata($post) @endphp
                                    @include('partials.post-item', [
                                        'post_classes' => '',
                                        'format' => '',
                                        'showExcerpt' => false,
                                    ])
                                @php wp_reset_postdata() @endphp
                                </div>
                                @endforeach
                            </div>
                        </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection