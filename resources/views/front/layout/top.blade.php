<meta charset="UTF-8">
<title>{{ $page_name }} - {{ $shareData['system_name'] }}</title>
<meta name="description" content="{{ env('WEBSITE_DESCRIPTION') }}">
<meta name="keywords" content="{{ env('WEBSITE_KEYWORDS') }}"/>
<meta name="author" content="{{ env('WEBSITE_AUTHOR') }}"/>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="apple-touch-icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
<link rel="shortcut icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">