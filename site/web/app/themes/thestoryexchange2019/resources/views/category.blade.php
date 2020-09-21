@extends('layouts.app')

@section('content')

  <section class="category-header">
    @php $cat = get_queried_object() @endphp
    <h1>{!! $cat->name !!}</h1>
    <p>{!! $cat->description !!}</p>
  </section>

  <section class="posts">
    <div class="post-group row format-vertical">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.post-item')
      @endwhile

      <div class="page-number">
        @php echo paginate_links() @endphp
      </div>

    </div>
  </section>

@endsection
