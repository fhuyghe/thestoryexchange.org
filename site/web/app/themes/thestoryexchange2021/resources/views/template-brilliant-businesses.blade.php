{{--
Template Name: Brilliant Businesses
--}}
@php global $post; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="page-header">
            <h1>{!! the_title() !!}</h1>
            @if($data['subheading'])
            <p class="subtitle">{{ $data['subheading'] }}</p>
            @endif
        </section>
        
        <section class="page-content">
            {!! the_content() !!}
        </section>
    
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
                                    <article id="post-{!! the_ID() !!}" class="post-item">
                                        <div class="post-wrap">
                                            <div class="entry-thumbnail">
                                                <img src="{{ $item['thumbnail']['sizes']['medium']}}">
                                            </div>
                                          <div class="entry-text">
                                              <h3 class="post-title">
                                                <a href="{!! the_permalink() !!}">
                                                  {{ $item['title'] }}
                                                </a>
                                              </h3>
                                              <div class="entry-content excerpt">
                                                {{ $item['blurb'] }}
                                              </div>
                                          </div>
                                        </div>
                                      </article>
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