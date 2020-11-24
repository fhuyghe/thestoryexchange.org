@php
  $cat_id = get_cat_ID($name);
  $cat_url = get_category_link($cat_id);
  isset($link_text) || $link_text = $name;
@endphp
{{-- TODO: ALIAS COMPONENT --}}

<a href="{!! $cat_url !!}" class="btn category-link more-link">
  {{ $slot ? $slot : $link_text }}
</a>
