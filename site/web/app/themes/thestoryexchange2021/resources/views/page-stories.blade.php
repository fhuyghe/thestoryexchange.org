@php global $post; @endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <section class="content">
    @php the_content() @endphp
    </section>

    <section class="latest">
      <h2>Latest Stories</h2>
      <div class="post-group">
      @if($posts)
      @foreach ($posts as $post)
      <div class="col-md-4">
        @php setup_postdata($post) @endphp
        @include('partials.post-item', [
            'post_classes' => '',
            'format' => 'advice',
            'showExcerpt' => $loop->iteration == 1 ? true : false,
        ])
      </div>
      @endforeach
      @php wp_reset_postdata() @endphp
      @endif
      </div>
      <a class="btn" href="/category/yse">All Stories</a>
    </section>
  @endwhile
@endsection