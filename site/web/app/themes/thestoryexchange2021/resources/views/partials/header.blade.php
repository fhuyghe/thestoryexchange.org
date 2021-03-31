<header class="site-header">
  <a class="hamburger menu-toggle">
    HAM
  </a>
  <nav class="nav-left">
    @if (has_nav_menu('top_left'))
      {!! wp_nav_menu(['theme_location' => 'top_left', 'menu_class' => 'nav nav-left']) !!}
    @endif
  </nav>
  <div class="brand container">
    <a class="header-icon" href="{{ home_url('/') }}">
      <img src="@asset('images/TSE-logo-160.png')" alt="{!! get_bloginfo('description', 'display') !!}" class="site-logo">
    </a>
  </div>
  <nav class="nav-right">
    @if (has_nav_menu('top_right'))
      {!! wp_nav_menu(['theme_location' => 'top_right', 'menu_class' => 'nav nav-right']) !!}
    @endif
  </nav>
  <button>
    Subscribe
  </button>
  <div class="search">
    <?php get_search_form(); ?>
  </div>
  <div id="fullMenu">
    <nav class="nav-primary">
        <div class="container">
      </div>
    </nav>
    @include('partials.social-icons')
  </div>
</header>
