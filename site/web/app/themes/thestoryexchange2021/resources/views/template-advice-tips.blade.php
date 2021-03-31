{{--
  Template Name: Advice & Tips
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

  <?php $categories = array(196, 127, 7964, 198, 7962, 7963, 197, 7965, 195)?>

    <div class="offset row">
        <div class="left-fixed col-lg-4">
          <h1>{{ the_title() }}</h1>
          {!! the_content() !!}

          <div class="cat-menu">
            @foreach ($categories as $id)
              <?php $cat = get_category($id)?>
              {!! '<a href="#' . $cat->slug . '">' . $cat->name . '</a>' !!}
            @endforeach
          </div>

        </div>

        <div class="right-content col-lg-8">
          @foreach ($categories as $id) 
            @include('partials.toolbox-category')
          @endforeach
        </div>

    </div>

  <script>
    jQuery(document).ready(function( $ ) {
    //Change active on manual scroll
    var catMenu = $('.cat-menu'),
    menuPos = catMenu.offset().top,
    height = $(window).height(),
    width = $(window).width(),
    scrollPos = $(document).scrollTop();

    if (width > 600){
      onScroll();
      $(document).on("scroll", onScroll);
    }

    function onScroll(event){
      
      scrollPos = $(document).scrollTop();

      if (scrollPos > menuPos - 100){
        catMenu.addClass('fixed');
      } else {
        catMenu.removeClass('fixed');
      }
      
      $('a', catMenu).each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.offset().top + refElement.height() <= scrollPos + height && refElement.offset().top  < scrollPos + height) {
          $('a', catMenu).removeClass("active");
          currLink.addClass("active");
        }
        else{
          currLink.removeClass("active");
        }
      });
    }
  });
  </script>

  @endwhile
@endsection