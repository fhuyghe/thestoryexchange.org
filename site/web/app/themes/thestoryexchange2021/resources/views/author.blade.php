@extends('layouts.app')

@section('content')


@php 
$post_classes = null;
$format = null;
$showExcerpt = false;
@endphp

<?php 
$author = get_the_author();
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<div class="container">

  <section class="author-header">
        <div class="thumbnail">
          @if(function_exists('userphoto_the_author_photo'))
            {!! userphoto_the_author_photo() !!}
          @endif
        </div>
        <h1>{{ get_the_author() }}</h1>
        <p>{!! the_author_meta( 'description' ) !!}</p>
  </section>

  <section class="posts">
    <h2>Posts by {{ get_the_author() }}</h2>
    <div class="post-group format-vertical">
      @while(have_posts()) @php the_post() @endphp
      <div class="col-md-4">
        @include('partials.post-item')
      </div>
      @endwhile

      <div class="page-number">
        @php echo paginate_links() @endphp
      </div>

    </div>
  </section>  
</div>
@endsection
