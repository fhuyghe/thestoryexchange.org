{{--
  Title: Landing Page Top
  Category: formatting
  Icon: admin-comments
  Keywords: home landing page quote
  Mode: edit
  Align: wide
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php global $post
    $post_classes = ''; 
    $format = '';
@endphp

<div id="{{ $block['id'] }}" class="wp-block {{ $block['classes'] }}">
  <div class="row">
    <div class="col-md-6 left-column">
      <div class="post-group format-featured">
      
        @php $featured = get_field('featured_post') ?: null @endphp
        @if($featured)
          @php $featuredID = $featured->ID @endphp
        @else
          @php $featuredID = '' @endphp
        @endif
  
        @component('partials.post-item-featured', [
          'picture' => get_field('featured_image'),
          'post_object' => $featured
        ])@endcomponent
      </div>

      {{-- PODCAST --}}
      <div class="podcast">
        <div class="section-title">
          <h2>Podcast</h2>
        </div>
        @component('partials.post-group', [
        'posts_per_page' => 1,
        'cat' => '147', //Entrepreneur Stories, Focus Points and "Articles Offering Advice and Tips to Women Entrepreneurs”
        'additional_args' => [
          'post__not_in' => array($featuredID)
        ],
        'format' => 'horizontal',
        'post_classes' => 'col-12',
        'featured_post' => false,
            'showExcerpt' => false
      ])@endcomponent
      </div>
    </div>

    <div class="col-md-3">
      @component('partials.post-group', [
      'posts_per_page' => 3,
      'cat' => '41, 187, 35', //Entrepreneur Stories, Focus Points and "Articles Offering Advice and Tips to Women Entrepreneurs”
      'additional_args' => [
        'post__not_in' => array($featuredID)
      ],
      'format' => 'vertical',
      'post_classes' => '',
      'featured_post' => false,
      'showExcerpt' => false
    ])@endcomponent
    </div>

    <div class="col-md-3 latest-posts">
      <h4>The Latest</h4>
      @component('partials.post-group', [
      'posts_per_page' => 5,
      'offset' => 3,
      'cat' => '41, 187, 35', //Entrepreneur Stories, Focus Points and "Articles Offering Advice and Tips to Women Entrepreneurs”
      'additional_args' => [
        'post__not_in' => array($featuredID)
      ],
      'format' => 'minimal',
      'post_classes' => 'col-12',
      'featured_post' => false,
      'showExcerpt' => false
    ])@endcomponent
    </div>
  </div>
</div>