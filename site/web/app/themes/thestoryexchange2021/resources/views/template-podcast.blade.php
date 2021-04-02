{{-- 
  TEMPLATE NAME: Podcast 
--}}

@extends('layouts.app')

@section('content')
<div class="row">
  <div class="left-sidebar col-sm-4">
    @while(have_posts()) @php the_post() @endphp
      <h2>{{ the_title() }}</h2>
      <?php the_content(); ?>
      <section class="buttonsWrap">
        {{ the_field('sharing_text') }}
        <a class="button-itunes" target="_blank" style="" href="https://itunes.apple.com/us/podcast/the-story-exchange/id1036000689?mt=2">iTunes</a>
        <a class="button-stitcher" target="_blank" style="" href="https://www.stitcher.com/s?fid=72717&refid=stpr">Stitcher</a>
        <a class="button-google spp-button-custom1" target="_blank" href="https://www.google.com/podcasts?feed=aHR0cDovL3RoZXN0b3J5ZXhjaGFuZ2UubGlic3luLmNvbS9yc3M%3D">Google</a>
        <a class="button-spprss" target="_blank" href="https://thestoryexchange.libsyn.com/rss">RSS</a>	
        <a class="button-spotify" target="_blank" href="https://open.spotify.com/show/5lJgdFK8g9WWXLBYjWytyn?si=Q-8dIabRR4S3vN_xNfSfWg">Spotify</a>	
        <a class="button-pocketcasts" target="_blank" href="https://pca.st/B094">Pocket Casts</a>	
      </section>
      <section class="share">
        {{ the_field('share_your_story_text') }}
        @php $link = get_field('share_your_story_link') @endphp
        @if ($link)
          <a class="bigbutton yellow" target="_blank" href="{{ $link }}">Share Your Story</a>
        @endif
      </section>
      @endwhile
  </div>

  <div class="right-content  col-sm-8">
  {{-- POCAST EPISODES --}}
    <section class="podcasts">
        @component('partials/post-group', [
          'posts_per_page' => -1,
          'cat' => array(147), 
          'format' => 'podcast',
          'featured_post' => false,
            'pinned_post' => null,
            'showExcerpt' => false,
            'post_classes' => null
      ])@endcomponent
    </section>  
  </div>
</div>


@endsection