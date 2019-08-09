{{-- Get the category and return tags if it includes a video --}}

    @php $cats = get_the_category() @endphp
    
    @if(count($cats) > 0)
    <div class="tags">
        @foreach ( $cats as $cat )
            @if($cat->term_id == 3)
            @php printf( '<a class="tag" href="%1$s">Video</a><br />',
            esc_url( get_category_link( $cat->term_id ) ))
            @endphp
            @endif
        @endforeach
    </div>
    @endif