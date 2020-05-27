@extends('front.layout.app')


@section('content')
<section id="pricing">
  <div class="first-title">
    <!--  title-->
  <div class="title">
    <div class="title-text">
      <h2 class="title-heading">{{ $page_name}}</h2>
      <p class="title-subheading">{{ $category->description }}</p>
    </div>
  </div>

  <!--end of  title-->
  </div>

  
    <div class="pricing-center">
      @foreach ($category->plans as $i=>$plan)
      <!--  pricing card-->
      <article class="pricing-card {{ $i % 2 == 1 ? 'custom' : ''}}">
        <h3>{{ $plan->name }}</h3>
        <h1>${{ $plan->price }}</h1>
        <ul>
          @foreach ($plan->options as $option)
            <li class="price-list">
              <i class="fa fa-check"></i>
              <p>{{ $option->name }}</p>
            </li>
          @endforeach
        </ul>
        <a href="{{ url('bookus/plan') }}/{{ $plan->id }}">choisir</a>
      </article>
      @endforeach
    </div>
    
 
</section>
@endsection