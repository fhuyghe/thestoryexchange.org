@php
// =============================================================================
// TEMPLATE NAME: Video Posts
// =============================================================================
@endphp

@extends('layouts.app')

@section('content')

      <div class="row">

        {{--#################################################--}}
        {{--VIDEO EPISODES ##################################--}}
        {{--#################################################--}}

        <div class="col-lg-8 videos">
          <div class="wrap">
            @while(have_posts()) @php the_post() @endphp
              @include('partials.post-video')
            @endwhile

            <div class="page-number">
              @php echo paginate_links() @endphp
            </div>

          </div>
        </div>

        {{--
        // ##########################################################
         // SIDEBAR ###########################################
         // ##########################################################
        --}}

        <div class="col-lg-4 videos-sidebar">

          <section id="playlists">
          <h2>Featured Playlists</h2>

            {{-- // PLAYLIST ######### --}}
          <div class="playlist">
            <a class="playlist-link">Business Ideas for Animal Lovers</a>
            <p>Love creatures, great and small? We profile entrepreneurs inspired by dogs, bees, horses and more.</p>
            <div class="video-player">
              <div class="wrap">
                <div class="embed-container">
                  <iframe width="640" height="360" og-src="https://www.youtube.com/embed?listType=playlist&list=PLaK2UyNCu2g2gL1RE3ZjXDJq_bhYiMQuI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>

          {{--// PLAYLIST ######### --}}
          <div class="playlist">
            <a class="playlist-link">Health and Wellness</a>
            <p>It's a hot industry. These women are running companies that put our minds and bodies in a better place.</p>
            <div class="video-player">
              <div class="wrap">
                <div class="embed-container">
                  <iframe width="640" height="360" og-src="https://www.youtube.com/embed/videoseries?list=PLaK2UyNCu2g0-Bv2VZYScyYQsb5OK3x5C" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>

          {{--PLAYLIST --}}
          <div class="playlist">
            <a class="playlist-link">Eco-friendly Entrepreneurs</a>
            <p>Watch how green business owners keep plastic out of the ocean, protect coastal cities, and even raise pigs sustainably.</p>
            <div class="video-player">
              <div class="wrap">
                <div class="embed-container">
                  <iframe width="640" height="360" og-src="https://www.youtube.com/embed/videoseries?list=PLaK2UyNCu2g32QTs9Ce6DR13ZdJNA87oB" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>

          {{--PLAYLIST --}}
          <div class="playlist">
            <a class="playlist-link">Mission Driven Nonprofits</a>
            <p>Be the change you wish to see in the world. Meet women social entrepreneurs making an impact. </p>
            <div class="video-player">
              <div class="wrap">
                <div class="embed-container">
                  <iframe width="640" height="360" og-src="https://www.youtube.com/embed/videoseries?list=PLaK2UyNCu2g010XvjfSMjBHBF7II5B3Gc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          
           <a class="btn" href="https://www.youtube.com/user/StoryExchange?ob=0&feature=results_main" target="_blank">More on YouTube</a>
          </section>


           <section id="youtubeBanner">
            <p>Subscribe to our channel</p>
            <script src="https://apis.google.com/js/platform.js"></script>
            <div class="g-ytsubscribe" data-channel="StoryExchange" data-layout="default" data-count="hidden"></div>
          </section>



          <section id="videocategories">
            <h2>Video Categories</h2>
            
  @php 
  $categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 3
  ) )
  @endphp
 
  @foreach ( $categories as $category )
    @php printf( '<a href="%1$s">%2$s</a><br />',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    )
    @endphp
  @endforeach

          </section>


           <section id="popularVideos">
            <h2>Most Popular</h2>
            @php 
            $popularpost = new WP_Query( array( 
              'posts_per_page' => 8, 
              'meta_key' => 'wpb_post_views_count', 
              'orderby' => 'meta_value_num', 
              'cat' => 3,
              'order' => 'DESC'  ) );
              $count = 1;
              @endphp
            @while ( $popularpost->have_posts() ) @php $popularpost->the_post();@endphp
            
              <div class="popular-post">
                <div class="count">
                  {{ $count }}
                </div>
                <div class="post-link">
                  <a href="{{ the_permalink() }}">{{ the_title() }}</a>
                </div>
              </div>
              
              @php $count = $count + 1 @endphp
            @endwhile
          </section>

         

        </div>
          
      </div>

@endsection
