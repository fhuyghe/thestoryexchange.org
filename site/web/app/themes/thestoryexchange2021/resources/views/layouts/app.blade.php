<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @include('partials.tag-manager') 
    @php do_action('get_header') @endphp
    @component('partials.side-menu')
      @include('partials.header')
      <div class="wrap" role="document">
        <div class="content">
          <main class="main" id="content">
            @yield('content')
          </main>
          {{-- @if (App\display_sidebar())
            <aside class="sidebar">
              @include('partials.sidebar')
            </aside>
          @endif --}}
        </div>
      </div>
      @php do_action('get_footer') @endphp
      @include('partials.footer')
    @endcomponent
    @php wp_footer() @endphp
  </body>

</html>
