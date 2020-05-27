<!DOCTYPE html>
<html lang="en">

<head>
  @include('front.layout.top')
</head>

<body>

  <!-- Header Section -->
  <header id="{{ Request::is('/')  ? 'header' : 'about-header' }}">
    @include('front.layout.nav')

    @yield('banner')
  </header>
  <!-- End Header Section -->

  @yield('content')

  
  <!--  Footer -->
    @include('front.layout.footer')
  <!--  end of Footer -->



    @include('front.layout.bottom')
    @yield('scripts')
    @include('sweetalert::alert')
  </body>

  </html>