@extends('front.layout.app')


@section('content')
<section id="pricing">
  <div class="first-title">
    <!--  title-->
  <div class="title">
    <div class="title-text">
      <h2 class="title-heading">Toutes nos catégories</h2>
    </div>
  </div>

  <!--end of  title-->
  </div>

  
    <div class="pricing-center">
      @foreach ($categories as $category)
      <!--  pricing card-->
      <article class="pricing-card">
        <h3>{{ $category->name }}</h3>
        <h1>{{ $category->plans->count() }} {{ str_plural('plan',$category->plans->count()) }}</h1>
        <a href="{{ url('bookus/category') }}/{{ $category->id }}">choisir</a>
      </article>
      @endforeach
    </div>
    
 
</section>
@endsection