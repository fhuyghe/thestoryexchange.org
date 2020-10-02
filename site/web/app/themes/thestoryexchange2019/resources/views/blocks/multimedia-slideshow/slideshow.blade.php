@php
/**
 * Slideshow Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'multimedia-slideshow-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'multimedia slideshow';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className']; 
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$slides = get_field('slides');
@endphp

<div id="{{ esc_attr($id) }}" class="{{ esc_attr($className) }}">
    @if(have_rows('slides'))
        @while( have_rows('slides') ) @php the_row() @endphp
        @if( get_row_layout() == 'image' )
            <div class="slide image">
                <img src="{{ get_sub_field('image')['url'] }}" />
                <div class="text">
                    {!! get_sub_field('text') !!}
                </div>
            </div>
        @elseif( get_row_layout() == 'video' )
            @php $video = get_sub_field('video') @endphp
            <div class="slide image">
                <video loop muted autoplay no-controls>
                    <source src="{{ $video['url'] }}" type="video/mp4" />
                </video>
                <div class="text">
                    {!! get_sub_field('text') !!}
                </div>
            </div>
        @elseif( get_row_layout() == 'embed_video' )
            <div class="slide image">
                {!! get_sub_field('embed_video') !!}
                <div class="text">
                    {!! get_sub_field('text') !!}
                </div>
            </div>
        @endif
        @endwhile
    @endif
</div>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('.slideshow').slick({
            dots: true,
            adaptiveHeight: false,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-circle-left"></i></button',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-circle-right"></i></button',
            responsive: [
                {
                breakpoint: 480,
                settings: {
                    adaptiveHeight: true
                }
                }
            ]
        });
    });
</script>