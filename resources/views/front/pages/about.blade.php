@extends('front.layout.app')

@section('content')
<!-- About page Section-->
<section id="about-page">
  <div class="about-page-center">
    <div class="about-page-photo">
      <img src="{{ asset('front/assets/img/image_1.png') }}" alt="image" loading="lazy">
    </div>
    <div class="about-page-text">
      <h6> Notre histoire</h6>
      <p>Fondée le 4 Décembre 2018, Théo Photography est une entreprise qui s’est lancée un défi : celui de toujours vous satisfaire et d'améliorer chaque jour votre expérience avec nous. Photographie et vidéographie englobant évènements, mariages, mode, et portrait sont les champs dans lesquels nous intervenons.</p>
      <p>Nous utilisons la photographie pour nourrir notre passion mais aussi pour créer un patrimoine pour les générations à venir.  Nos clichés servent à inspirer et sensibiliser les autres de manière à ce qu’ils donnent le meilleur d’eux-même.</p>
      <p>Loins d'être insensible à la culture haïtienne, nous nous acharnons à la réhausser à travers des images innovantes.</p>
      <h6>Une expérience humaine</h6>
      <p>Plus qu’un simple contrat à exécuter, nous donner l'occasion d’immortaliser les moments les plus importants de votre vie est pour nous une expérience humaine. Nos clients sont comme des invités à un festin dans lequel nous sommes les hôtes. Prendre en compte vos désirs et les matérialiser sous formes de clichés selon votre convenance est la garantie d’une appréciation de votre part. La finesse et la mise en confiance dont nous faisons montre, permet de garder avec notre clientèle, une relation sincère et durable.</p>
      <h6>Service de qualité</h6>
      <p>Ce qui donne un sens à notre existence - outre le fait d’utiliser nos images pour sensibiliser et motiver les autres - est la satisfaction de notre clientèle pour chaque contrat honoré. La qualité de notre service ne se résume pas à l’authenticité de notre travail mais s'étend jusqu’aux aspects les plus pertinents en commençant par le respect vis-à-vis de nos clients, passant par notre sérieux quant aux délais à respecter ou aux heures de rendez-vous fixés, jusqu’à notre sens de la responsabilité.</p>
    </div>
  </div>
  <div class="members-team">
    <h3>Notre equipe</h3>
  </div>
  <div class="about-page-center">
    <div class="about-page-photo">
      <img src="{{ asset('front/assets/img/image_2.jpg') }}" height="60%" alt="image" loading="lazy">
    </div>
    <div class="about-page-text">
      <h6>Abigaïl Clermont</h6>
      <p>Abigaïl Clermont est une jeune fille débordant d’optimisme et de positivité. Encore très jeune, elle a décroché sa licence en Philosophie et Sciences Politiques à l’Université d’État d’Haïti.</p>
      <p>Elle apporte un soutien à Théo Photography en portant le chapeau de Manager. Pour elle, ThéoPhotography est une entreprise qui grandit et qui se veut une place immortelle dans le monde la photographie.</p>
      <p>Passionnée de l'art, elle a tout de suite été attiré par la passion qui animait le jeune homme et la dextérité dont il faisait montre pour rendre ses clichés  vivants et originals . Depuis, elle n’a jamais refusé d’apporter sa contribution à ThéoPhotography.</p>
    </div>
  </div>
  <br><br>
  <div class="about-page-center">
    <div class="about-page-photo">
      <img src="{{ asset('front/assets/img/image_3.jpg') }}" alt="image" loading="lazy">
    </div>
    <div class="about-page-text">
      <h6>John Mitchel Théodore</h6>
      <p>Entrepreneuriat, leadership, gouvernance, art visuel, sont les différents centres d'intérêt de John Mitchel Théodore. PDG de Theophotography, il a pourtant été diplômé au Centre Pilote de Formation Professionnelle en Auto-Diesel.</p>
      <p>La fièvre qui le hante est telle qu'il désire en apprendre toujours plus sur d'autres branches - pas forcément connexes - d'où ses formations en employabilité, droits humains, déficit de l'attention, développement durable et autres. Motivé et déterminé à faire partie des grands du domaine, il a intégré la communauté d'Empara où les meilleurs cours de photographie numérique sont à sa disposition.</p>
      <p>La photographie, son oxygène. Ce savoir-faire qui le plonge dans un univers dont seul lui détient la clé, fait de lui un photographe talentueux, avec pour seul boussole son sens du détail.</p>
    </div>
  </div>
</section>
<!-- end About page Section-->
@endsection