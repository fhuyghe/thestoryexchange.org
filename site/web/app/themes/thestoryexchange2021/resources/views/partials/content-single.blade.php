<div id="post-container">
<article {!! post_class() !!}>
  <div class="container" >
  @include('partials/post-header')

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

    @php $postsNotes = get_field('posts_notes', 'option') @endphp
    @if ($postsNotes && $postsNotes['message_on'])
      <div class="posts-notes">
          {!! $postsNotes['message'] !!}
      </div>
    @endif

  </div>

  <div class="container">
    @if(function_exists('social_warfare'))
      @php social_warfare() @endphp
    @endif
  </div>

  <section class="newsletter-banner">
    <p>{!! the_field('newsletter_banner_title', 'option') !!}</p> 
    <p>{!! the_field('newsletter_banner_text', 'option') !!}</p>
    @include('partials/newsletter-signup-email')
  </section>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</div>
</article>
</div>

@php
$args = array(
	'single_post' 			=> 'true',
	'single_post_id' 		=> get_the_ID(),
	'single_post_target'	=> '#post-container',
	'post_type' 			=> 'post',
	'pause_override' 		=> 'true',
);	
 
if( function_exists( 'alm_render' ) ){
	alm_render($args);
}
@endphp