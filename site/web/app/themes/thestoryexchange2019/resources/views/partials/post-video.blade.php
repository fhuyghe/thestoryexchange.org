<div class="post video-post row">
    <div class="thumbnail col-lg-4">
      <div class="wrap-out">
          <div class="fill">
        {!! the_post_thumbnail('medium') !!}
        </div>
        <div class="wrap-in">
          <div class="play-button"><i class="fas fa-play"></i></div>
        </div>
      </div>
    </div>
    <div class="content  col-lg-8">
      @php $cat = get_field('main_category') @endphp
          @if ($cat)
            <div class="tag"><a href="/category/{{$cat->slug}}">{{$cat->name}}</a></div>
          @endif
      <h3 class="post-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
      {{ the_excerpt() }}
    </div>

    <div class="video-player">
      <div class="wrap">
        <div class="embed-container">
          @php $iframe = get_field('video') @endphp
              @if ($iframe)
                @php 
                  preg_match('/src="(.+?)"/', $iframe, $matches);
                  preg_match("/src='(.+?)'/", $iframe, $othermatches);
                  $src = $matches[1];
                  if (!$src) {
                    $src = $othermatches[1];
                  }
                  $cleanedsrc = explode('?', $src);
                  // add extra params to iframe src
                  $new_src = $cleanedsrc[0] . '?autoplay=1';
                  $iframe = str_replace($src, $new_src, $iframe);
                  $iframe = str_replace('src', 'og-src', $iframe);
                  // add extra attributes to iframe html
                  $attributes = 'frameborder="0"';
                  $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                  echo $iframe;
                @endphp
              <p class="caption">{!! the_field('video_caption') !!}</p>
            @endif
        </div>
        <div class="close"><i class="far fa-times"></i></div>
        </div>
    </div>
  </div>