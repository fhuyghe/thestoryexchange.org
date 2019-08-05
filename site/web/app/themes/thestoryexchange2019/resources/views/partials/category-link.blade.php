@php
  $cat_id = get_cat_ID($name);
  $cat_url = get_category_link($cat_id);
  isset($link_text) || $link_text = $name;
@endphp
{{-- TODO: ALIAS COMPONENT --}}
@component('partials.btn-link', [
  'url' => $cat_url,
  'link_class' => 'category-link ' . ($link_class || '')
])
  {{ $slot ? $slot : $link_text }}
@endcomponent
