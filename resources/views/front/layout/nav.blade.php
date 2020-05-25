<nav>
  <div class="nav-container">
    <a href="{{ url('/') }}"><img src="{{ asset('others') }}/{{ $shareData['front_logo'] }}" alt="logo"></a>
    <div class="btn">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
  </div>

  <ul class="nav-links">
    <li><a href="{{ url('/') }}">accueil</a></li>
    <li><a href="{{ url('/gallerie') }}">gallerie</a></li>
    <li><a href="{{ url('/about') }}">a propos</a></li>
    <li><a href="{{ url('/contact') }}">contact</a></li>
    <li><a href="{{ url('/bookus') }}">book us</a></li>
  </ul>

  <ul class="nav-icons">
    <li><a href="{{ $shareData['facebook'] }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
    <li><a href="{{ $shareData['instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
    <li><a href="{{ $shareData['pinterest'] }}" target="_blank"><i class="fab fa-pinterest"></i></a></li>
    <li><a href="{{ $shareData['youtube'] }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
  </ul>
</nav>