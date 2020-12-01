{{-- 
  TEMPLATE NAME: Product List
  Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials/post-header')

    <div class="entry-content">
      @php the_content() @endphp
    </div>

    <section id="productList">
      <div class="container">
        <div class="row">
          @foreach ($data['list_items'] as $list_item)
              
          <div class="product col-md-6">
            <div class="product-wrap">
            <div class="thumbnail">
              <img src="{{ $list_item['image']['url'] }}" alt="{{ $list_item['image']['alt'] }}" />
            </div>
            <div class="text">
            <h4>{{ $list_item['title'] }}</h4>
            {!! $list_item['blurb'] !!}

            @php $price = '' @endphp
            @if($list_item['price'])
              @php $price = '$' . $list_item['price'] . '  -  ' @endphp
            @endif

            <a class="btn" target="_blank" href="{{ $list_item['link'] }}">{{ $price }}Available here</a>
            </div>
            </div>
          </div>

          @endforeach
        </div>
      </div>
    </section>
  @endwhile
@endsection
