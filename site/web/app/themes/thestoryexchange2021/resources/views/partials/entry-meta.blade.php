<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
@php $hideTheAuthor = get_field('hide_the_author') @endphp
@if(!$hideTheAuthor)
<div class="author-meta">
    <div class="author_thumbnail">
      @php $user_photo = get_field('user_photo', 'user_' . get_the_author_meta('ID')) @endphp
      @if(!empty( $user_photo))
        <img src="{!! esc_url($user_photo['sizes']['thumbnail']) !!}" alt="{{ esc_attr($user_photo['alt']) }}" />
      @elseif(function_exists('userphoto_the_author_photo'))
        {!! userphoto_the_author_photo($post->post_author) !!}
      @endif
    </div>
    {!! _e( 'By ', 'continuum' ) !!}
    {!! the_author_link() !!}
</div>
@endif
