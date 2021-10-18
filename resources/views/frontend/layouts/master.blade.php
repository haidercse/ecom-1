<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    {{-- styles start here  --}}
      @include('frontend.layouts.partials.styles')
    {{-- styles end here  --}}

    <title>@yield('title','E-commerce Project')</title>
  </head>
  <body>

    {{-- nav start here  --}}
       @include('frontend.layouts.partials.nav')
    {{-- nav end here  --}}

    {{-- sidebar+show product  --}}
       @yield('content')
    {{-- sidebar+show product end  --}}

    {{-- footer start here  --}}
        @include('frontend.layouts.partials.footer')
    {{-- footer end here  --}}

    <!-- Optional JavaScript; choose one of the two! -->
    @include('frontend.layouts.partials.scripts')
    @yield('scripts')

  </body>
</html>
