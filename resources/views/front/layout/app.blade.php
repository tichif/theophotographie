<!DOCTYPE html>
<html lang="en">

<head>
  @include('front.layout.top')
</head>

<body>

  <!-- Header Section -->
  <header id="header">
    @include('front.layout.nav')

    @yield('banner')
  </header>
  <!-- End Header Section -->

  @yield('content')

  
  <!--  Footer -->
    @include('front.layout.footer')
  <!--  end of Footer -->



    @include('front.layout.bottom')
    @include('sweetalert::alert')
  </body>

  </html>