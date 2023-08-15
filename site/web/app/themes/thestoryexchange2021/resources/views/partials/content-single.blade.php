<div id="post-container">
<article {!! post_class() !!}>
  @include('partials/post-header')

  @if ( in_category( 3 ))
    @php $video = get_field('video') @endphp
    @if($video)
    <section class="video">
      <div class="container">
        <div class="iframewrap">
          <?php the_field('video'); ?>
        </div>
        <p class="caption"><?php the_field('video_caption'); ?></p>
      </div>
    </section>
    @endif
  @endif

  <div class="entry-content">
    <div class="container-fluid" >
    @php the_content() @endphp

    @php $postsNotes = get_field('posts_notes', 'option') @endphp
    @if ($postsNotes && $postsNotes['message_on'])
      <div class="posts-notes">
          {!! $postsNotes['message'] !!}
      </div>
    @endif
    </div>
  </div>

  <section class="social-links">
  <div class="container">
    @if(function_exists('social_warfare'))
      @php social_warfare() @endphp
    @endif
  </div>
  </section>

  <section class="newsletter-banner">
    <div class="container">
      <p>{!! the_field('newsletter_banner_title', 'option') !!}</p> 
      <p>{!! the_field('newsletter_banner_text', 'option') !!}</p>
      @include('partials/newsletter-signup-email')
    </div>
  </section>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</div>
</article>
</div>

@php
// Ajax Load More
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