<header class="page-header">
    @if ( in_category(32) )
    <a class="thousandStoriesLogo" href="/stories/">
        <img src="@asset('images/TSE_1kPlusStories_Logo.jpg')" />
    </a>
    @endif

    <div class="header-content">
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @php $subheading = get_field('subheading') @endphp
      @if($subheading)
        <p class="subtitle">{{ $subheading }}</p>
        @else
        <p class="subtitle">{{ the_excerpt() }}</p>
        @endif
      @include('partials/entry-meta')
    </div>
  </header>