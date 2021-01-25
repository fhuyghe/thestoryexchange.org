<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php wp_head() @endphp

  {{-- FAVICON --}}
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="@asset('images/apple-touch-icon-144x144.png')" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="@asset('images/apple-touch-icon-152x152.png')" />
  <link rel="icon" type="image/png" href="@asset('images/favicon-32x32.png')" sizes="32x32" />
  <link rel="icon" type="image/png" href="@asset('images/favicon-16x16.png')" sizes="16x16" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="@asset('images/mstile-144x144.png')" />

  {{-- FONT AWESOME --}}
  <script src="https://kit.fontawesome.com/800e21cc29.js"></script>

  <!-- Pinterest Tag -->
  <script>
  !function(e){if(!window.pintrk){window.pintrk = function () {
  window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
    n=window.pintrk;n.queue=[],n.version="3.0";var
    t=document.createElement("script");t.async=!0,t.src=e;var
    r=document.getElementsByTagName("script")[0];
    r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
  pintrk('load', '2613795781749', {em: '<user_email_address>'});
  pintrk('page');
  </script>
  <noscript>
  <img height="1" width="1" style="display:none;" alt=""
    src="https://ct.pinterest.com/v3/?event=init&tid=2613795781749&pd[em]=<hashed_email_address>&noscript=1" />
  </noscript>
  <!-- end Pinterest Tag -->

  <!-- Google Tag Manager begins -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-T492J8');</script>
  <!-- End Google Tag Manager -->
</head>
