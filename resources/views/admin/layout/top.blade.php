<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ $page_name }} - {{ $shareData['system_name'] }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ config('app.website_description','Site de photographie et de vidéographie') }}">
<meta name="keywords" content="{{ config('app.website_keywords','Théo, Photographie, Théo Photographie, Haïti, Carrefour') }}"/>
<meta name="author" content="{{ config('app.website_author','Dalzon Charles-Hébert') }}"/>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="apple-touch-icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
<link rel="shortcut icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">

<link rel="stylesheet" href="{{asset('admin/assets/css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/chosen/chosen.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/scss/style.css')}}">
<link href="{{asset('admin/assets/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>