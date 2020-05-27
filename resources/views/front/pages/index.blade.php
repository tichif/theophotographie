@extends('front.layout.app')

@section('banner')
<div id="banner" class="banner">
  <div class="banner-card">
    <h1>{{ $shareData['system_name'] }}</h1>
    <h3>L'archive numerique de votre vie</h3>
  </div>
</div>
@endsection


@section('content')
    <!--  About Section -->
  <section id="about" class="about">
    <article class="about-img"></article>
    <article class="about-text">
      <div class="about-text-center">
        <h1>A propos</h1>
        <div class="about-text-underline"></div>
        <p>Nous utilisons la photographie pour nourrir notre passion mais aussi pour créer un patrimoine pour les générations à venir.</p>
        <a href="{{ url('/about') }}">En savoir plus</a>
      </div>
    </article>
  </section>
  <!--  end About Section -->

  <!--  Projects section -->
  <section id="projects" class="projects">
    <article class="project project-1"></article>
    <article class="project project-2"></article>
    <article class="project project-3"></article>
    <article class="project project-4"></article>
    <article class="project project-5"></article>
    <article class="project project-6"></article>
    <article class="project project-7"></article>
    <article class="project project-8"></article>
    <article class="project project-9"></article>
    <article class="project project-10"></article>
  </section>
  <!--  end Projects section -->

  <!--  Filler Section -->
  <section id="filler-contact">
    <h1>{{ $shareData['system_name'] }}</h1>
    <button type="button"><a href="{{ url('/about') }}">Contactez nous</a></button>
  </section>
  <!--  end Filler Section -->


  <!-- Quotes -->
  <section id="quotes">
    <div class="quotes-center owl-carousel owl-theme">
      <article class="quote">
        <img src="{{ asset('front/assets/img/cus5.jpg') }}" alt="image" loading="lazy">
        <blockquote>
          <p><i class="fas fa-quote-left"></i> &nbsp;Théo Photography est la compagnie la plus professionnelle que je connaisse.</p>
          <footer>Peterson VILBERT</footer>
        </blockquote>
      </article>

      <article class="quote">
        <img src="{{ asset('front/assets/img/cus6.jpg') }}" alt="image" loading="lazy">
        <blockquote>
          <p><i class="fas fa-quote-left"></i>&nbsp; J'aime Théo Photographie, pour son professionnalisme, son éthique, et bien sur l'amour du metier reflete dans son travail.</p>
          <footer>Pamela PIERRE</footer>
        </blockquote>
      </article>

      <article class="quote">
        <img src="{{ asset('front/assets/img/cus1.jpg') }}" alt="image" loading="lazy">
        <blockquote>
          <p><i class="fas fa-quote-left"></i>&nbsp; J'ai pu à plusieurs reprises collaborer avec Théo Photographie, je suis toujours satisfaite du service et de l'équipe. Le travail est toujours bien fait et le résultat est très satisfaisant, c'est une équipe professionnelle qui ne fait que progresser de jour en jour.</p>
          <footer>Madjina ANTOINE</footer>
        </blockquote>
      </article>
      
      <article class="quote">
        <img src="{{ asset('front/assets/img/cus2.jpg')}}" alt="image" loading="lazy">
        <blockquote>
          <p><i class="fas fa-quote-left"></i>&nbsp; Ce qui m'a capté c'est le professionnalisme et le dynamisme  de l'équipe qui marche pair avec la technologie. Déjà sur les réseaux sociaux, Théo Photographie vous invite à passer de leur studio pour une séance de photos. L'archive numérique. </p>
          <footer>Luc DUFRESNE</footer>
        </blockquote>
      </article>
      
      <article class="quote">
        <img src="{{ asset('front/assets/img/cus3.jpg') }}" alt="image" loading="lazy">
        <blockquote>
          <p><i class="fas fa-quote-left"></i>&nbsp; Très satisfait.Et, de part mes expériences soit comme mannequin, soit comme dirigeant d'une agence de mannequins, il est celui qui travaille avec plus de rigueur et de professinnalisme.</p>
          <footer>Francky SAINT-FLEUR</footer>
        </blockquote>
      </article>
      
      <article class="quote">
        <img src="{{ asset('front/assets/img/cus4.jpg') }}" alt="image" loading="lazy">
        <blockquote>
          <p><i class="fas fa-quote-left"></i>&nbsp; I highly recommend Theo Photographie. My experience with them was more than satisfactory. In addition, customer service is to be congratulated. Do not hesitate to give your image in their hands.</p>
          <footer>Stayana Altagracia MARC-CHARLES</footer>
        </blockquote>
      </article>
    </div>
  </section>
  <!-- end quotes-->
@endsection