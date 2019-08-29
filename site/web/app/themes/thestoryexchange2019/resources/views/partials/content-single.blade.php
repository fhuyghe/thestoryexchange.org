<article {!! post_class() !!}>
  <header class="page-header">
    @if ( in_category(32) )
    <a class="thousandStoriesLogo" href="/category/yse/">
        <img src="@asset('images/TSE_1kPlusStories_Logo.jpg')" />
    </a>
    @endif

    <div class="header-content">
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      <p class="subtitle"><?php the_subheading(); ?></p>
      @include('partials/entry-meta')
    </div>
  </header>

  @if ( in_category( 3 ))
    <section class="video">
        <div class="iframewrap">
            <?php the_field('video'); ?>
        </div>
        <p class="caption"><?php the_field('video_caption'); ?></p>
    </section>
  @endif

  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{--@php comments_template('/partials/comments.blade.php') @endphp--}}
</article>
