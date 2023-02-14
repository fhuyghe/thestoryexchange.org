<footer class="content-info" id="mainFooter">
  <div class="container">
    <div class="footer-main">
    <div class="logo">
      <a class="header-icon" href="{{ home_url('/') }}">
        <img width="200px" src="@asset('images/TSE_MASTERLOGO.svg')" alt="{!! get_bloginfo('description', 'display') !!}" class="site-logo">
      </a>
      @php $footer_description = get_field('footer_description', 'option') @endphp
      @if($footer_description)
        <p class="description">{{ $footer_description }}</p>
      @endif
    </div>
    <div class="menu">
      @if (has_nav_menu('footer'))
          {!! wp_nav_menu(['theme_location' => 'footer', 'menu_class' => 'nav']) !!}
        @endif
    </div>
    <div class="social">
      @include('partials.social-icons')
    </div>
  </div>
  <div class="copyright">
    {!! App\auto_copyright() !!} {{ App::siteName() }} - All rights reserved.
  </div>
  </div>
</footer>
<!--JB Tracker--> <script type="text/javascript"> var _paq = _paq || []; (function(){ if(window.apScriptInserted) return; _paq.push(['clientToken', 'P%2bsIjEMd6oQ%3d']); var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.async=true; g.defer=true; g.src='https://prod.benchmarkemail.com/tracker.bundle.js'; s.parentNode.insertBefore(g,s); window.apScriptInserted=true;})(); </script> <!--/JB Tracker--> <!-- BEGIN: Benchmark Email Signup Form Code -->