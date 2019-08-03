@php
  $icon = App::icon_object($number)
@endphp
<div class="page-home-icon">
  <div class="icon">
    <a href="{!! $icon['link'] !!}">
      <img src="{!! $icon['image'] !!}" />
    </a>
  </div>
  <h3>{!! $icon['title'] !!}</h3>
  <p>{!! $icon['text'] !!}</p>
  <a class="btn" href="{!! $icon['link'] !!}">
    {!! $icon['linktext'] !!}
  </a>
</div>
