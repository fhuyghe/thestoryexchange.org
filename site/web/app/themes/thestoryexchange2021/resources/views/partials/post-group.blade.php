<div class="post-group row format-{{ $format }} @if($featured_post)feature-first @endif">
    @php
      $args=App::group_query_params(
        array(
          'posts_per_page' => $posts_per_page,
          'cat' => $cat
        ),
        isset($additional_args) ? $additional_args : []
      );
      $my_query = new WP_Query( $args );
    @endphp
    @if ( $my_query -> have_posts() )
        @while ( $my_query -> have_posts() ) @php $my_query ->the_post() @endphp
            @if( $format == 'podcast' )
                @include('partials/post-podcast')
            @else
              @include('partials/post-item') 
            @endif
            @php wp_reset_postdata() @endphp
        @endwhile
    @endif
</div>
