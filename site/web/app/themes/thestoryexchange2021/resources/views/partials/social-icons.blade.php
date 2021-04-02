<div class="social-icons">
  <h4>Follow</h4>
  <div class="wrap">
  @foreach (App::fetch_social_icons_object() as $name => $icon)
    <a
      href="{!! $icon['url'] !!}"
      itemProp="sameAs"
      class="social {!! $name !!}"
      target="_blank"
      rel="nofollow external">
      <i class="fab fa-{!! $icon['icon_class'] !!} "></i>
    </a>
  @endforeach
  </div>
</div>
