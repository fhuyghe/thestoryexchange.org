<?php 
global $post;
$categories = array(196, 127, 7964, 198, 7962, 7963, 197, 7965, 195)?>

<section class="page-header">
    <div class="row">
        <div class="col-md-6">
            <h1>{{ the_title() }}</h1>
            {!! the_content() !!}
        </div>
        <div class="col-md-6">
            <select id="cat-menu">
                <option value="0">All Categories</option>
            @foreach ($categories as $id)
                <?php $cat = get_category($id)?>
                {!! '<option value="' . $cat->slug . '">' . $cat->name . '</option>' !!}
            @endforeach
            </select>
        </div>
</section>
<section class="page-content">
        {{-- @foreach ($posts as $post)
        @php setup_postdata($post) @endphp
        @include('partials.post-item', [
            'post_classes' => '',
            'format' => 'advice',
            'showExcerpt' => false,
          ])
          @if($loop->iteration == 4)
            <div class="clearfix"></div>
          @endif
        @endforeach
        @php wp_reset_postdata() @endphp --}}
        @php 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '6',
            'category' => 'advice-tips',
            'button_label' => 'Show More Posts',
            'button_loading_label' => 'Loading...',
            'loading_style' => "infinite ring",
            'scroll' => 'true',
            'placeholder' => true,
        );	
        if(function_exists('alm_render')){
            alm_render($args);
        }
        @endphp
</section>