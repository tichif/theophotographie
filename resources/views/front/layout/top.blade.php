<meta charset="UTF-8">
<title>{{ $page_name }} - {{ $shareData['system_name'] }}</title>
<meta name="description" content="{{ config('app.website_description','Site de photographie et de vidéographie') }}">
<meta name="keywords" content="{{ config('app.website_keywords','Théo, Photographie, Théo Photographie, Haïti, Carrefour') }}"/>
<meta name="author" content="{{ config('app.website_author','Dalzon Charles-Hébert') }}"/>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="apple-touch-icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
<link rel="shortcut icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">