<div id="post-container">
<article {!! post_class() !!}>
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
  </div>

  <div class="container">
    @if(function_exists('social_warfare'))
      @php social_warfare() @endphp
    @endif
  </div>

  <section class="newsletter-banner">
    <p>{!! the_field('newsletter_banner_title', 'option') !!}</p> 
    <p>{!! the_field('newsletter_banner_text', 'option') !!}</p>
    @include('partials/mailchimp-form')
  </section>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{--@php comments_template('/partials/comments.blade.php') @endphp--}}
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