@extends('front.layout.app')


@section('content')
     <!-- Gallerie page Section-->
<section id="gallerie-page">
  <h1>{{ $page_name }}</h1>
    <div class="btn-group">
      <a href="{{ url('/gallerie') }}" class="btn-choice">all</a>
      @foreach ($albums as $title)
        <a href="{{ url('album') }}/{{ $title->id }}" class="btn-choice">{{ $title->name }}</a>
      @endforeach
    </div>
     <div id="current-center">
       @foreach ($album->photos as $photo)
        <article class="current-item">
          <a href="{{ url('/' )}}/storage/photos/{{ $photo->image }}">
            <img src="{{ url('/' )}}/storage/photos/{{ $photo->image }}" alt="{{ $photo->name }}" loading="lazy">
          </a>
        </article> 
       @endforeach
     </div>
     </section>
 <!-- end Gallerie page Section-->
@endsection

@section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('front/assets/js/magnific.js') }}"></script>
@endsection