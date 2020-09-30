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
$id = 'slideshow-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slideshow';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className']; 
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$photos = get_field('photos');
@endphp


<div id="{{ esc_attr($id) }}" class="{{ esc_attr($className) }}">
    @if($photos)
        @php foreach($photos as $image) : @endphp
        <div class="slide">
                <img src="{{ esc_url($image['sizes']['large']) }}" alt="<?php echo esc_attr($image['alt']); ?>" />
            <p>{!! $image['caption'] !!}</p>
        </div>
        @php endforeach; @endphp
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