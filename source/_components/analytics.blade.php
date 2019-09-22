@if ($page->production)
  <!-- GA -->
  @if (getenv('GA_ID'))
      {{-- Global site tag (gtag.js) - Google Analytics --}}
      <script async src="https://www.googletagmanager.com/gtag/js?id={{ getenv('GA_ID') }}"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ getenv('GA_ID') }}');
      </script>
  @endif

  @if (getenv('RECAPTCHA_SITE_KEY'))
      {{-- Recaptcha --}}
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  @endif
@endif