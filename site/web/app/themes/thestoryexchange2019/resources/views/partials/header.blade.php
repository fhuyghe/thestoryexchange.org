<header class="banner">
    <a class="brand" href="{{ home_url('/') }}">
      <div class="title">
        <div class="name">{{ get_bloginfo('name', 'display') }}</div>
        <div class="description">{{ get_bloginfo('description', 'display') }}</div>
      </div>
      <img src="@asset('images/TSE-logo-160.png')">
    </a>
    <nav class="nav-primary">
        <div class="container">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
          @endif
          <div class="search">
              <?php get_search_form(); ?> 
          </div>
      </div>
    </nav>
</header>
