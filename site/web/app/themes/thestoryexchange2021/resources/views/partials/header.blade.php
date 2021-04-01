<header class="site-header">
  <div class="container">
    <div class="top-left">
      <button class="hamburger hamburger--collapse" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <nav class="nav-left">
        @if (has_nav_menu('top_left'))
          {!! wp_nav_menu(['theme_location' => 'top_left', 'menu_class' => 'nav nav-left']) !!}
        @endif
      </nav>
    </div>

    <div class="brand">
      <a class="header-icon" href="{{ home_url('/') }}">
        <img src="@asset('images/TSE-logo-160.png')" alt="{!! get_bloginfo('description', 'display') !!}" class="site-logo">
      </a>
    </div>

    <div class="top-right">
      <nav class="nav-right">
        @if (has_nav_menu('top_right'))
          {!! wp_nav_menu(['theme_location' => 'top_right', 'menu_class' => 'nav nav-right']) !!}
        @endif
      </nav>
      <div class="search">
        <?php get_search_form(); ?>
      </div>
  </div>
</div>
{{-- Full menu accessible with hamburger --}}
  <div id="fullMenu">
    <nav class="nav-right">
      @if (has_nav_menu('nav-primary'))
        {!! wp_nav_menu(['theme_location' => 'nav-primary', 'menu_class' => 'nav nav-right']) !!}
      @endif
    </nav>
    @include('partials.social-icons')
  </div>
</header>
