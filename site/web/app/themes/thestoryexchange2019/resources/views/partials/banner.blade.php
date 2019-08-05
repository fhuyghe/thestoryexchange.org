@php
  $banner = App::banner_object($number)
@endphp
<a
  class="map banner banner-component"
  style="background-image: url({!! $banner['image'] !!})"
  href="{!! $banner['link'] !!}">
  <div class="wrap">
    <h6>{!! $banner['title'] !!}</h6>
    <p>{!! $banner['text'] !!}</p>
  </div>
</a>
