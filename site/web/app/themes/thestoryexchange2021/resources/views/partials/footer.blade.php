<footer class="content-info">
  <div class="container">
    <div class="row">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
  <div class="copyright">
    {!! App\auto_copyright() !!} {{ App::siteName() }} - All rights reserved.
  </div>
  </div>
</footer>
