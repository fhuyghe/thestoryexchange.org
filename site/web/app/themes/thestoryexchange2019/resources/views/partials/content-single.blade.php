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
    @php $video = get_field('video') @endphp
    @if($video)
    <section class="video">
        <div class="iframewrap">
            <?php the_field('video'); ?>
        </div>
        <p class="caption"><?php the_field('video_caption'); ?></p>
    </section>
    @endif
  @endif

  <div class="entry-content">
    @php the_content() @endphp
  </div>

  <section class="newsletter-banner">
    <p>{!! the_field('newsletter_banner_title', 'option') !!}</p> 
    <p>{!! the_field('newsletter_banner_text', 'option') !!}</p>
    @include('partials/newsletter-signup-email')
  </section>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{--@php comments_template('/partials/comments.blade.php') @endphp--}}
</article>
