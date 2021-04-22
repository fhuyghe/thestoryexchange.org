@extends('layouts.app')

@section('content')

  <section class="category-header">
    @php $cat = get_queried_object() @endphp
    <h1>{!! $cat->name !!}</h1>
    <p>{!! $cat->description !!}</p>
  </section>

  <section class="posts" id="content">
    <div class="post-group format-vertical feature-first">
      @while(have_posts()) @php the_post() @endphp

        @include('partials.post-item', [
          'post_classes' => 'col-md-4',
          'format' => '',
          'showExcerpt' => false,
        ])
      @endwhile
    </div>
    <div class="page-number">
      @php echo paginate_links() @endphp
    </div>
  </section>

@endsection
