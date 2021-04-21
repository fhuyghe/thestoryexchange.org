@extends('layouts.app')

@section('content')


@php 
$post_classes = null;
$format = null;
$showExcerpt = false;
@endphp

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

  <section class="author-header">
        <div class="thumbnail">
            {!! userphoto_the_author_photo() !!} 
        </div>
        <h1>{{ get_the_author() }}</h1>
        <p>{!! the_author_meta( 'description' ) !!}</p>
  </section>

  <section class="posts">
    <h3>Posts by {{ get_the_author() }}</h3>
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
