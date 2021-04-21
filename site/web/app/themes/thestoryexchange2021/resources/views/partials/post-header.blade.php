<header class="page-header">
    @if ( in_category(32) )
    <a class="thousandStoriesLogo" href="/category/yse/">
        <img src="@asset('images/TSE_1kPlusStories_Logo.jpg')" />
    </a>
    @endif

    <div class="header-content">
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @php $subheading = get_field('subheading') ? get_field('subheading') :  get_post_meta($post->ID, '_subheading')[0] @endphp
      @if($subheading)
        <p class="subtitle">{{ $subheading }}</p>
      @endif
      @include('partials/entry-meta')
    </div>
  </header>