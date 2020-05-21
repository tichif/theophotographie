<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Se connecter</title>
        <meta name="description" content="{{ env('WEBSITE_DESCRIPTION') }}">
        <meta name="keywords" content="{{ env('WEBSITE_KEYWORDS') }}"/>
        <meta name="author" content="{{ env('WEBSITE_AUTHOR') }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
        <link rel="shortcut icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">

        <link rel="stylesheet" href="{{ asset('admin/assets/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/admin/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/scss/style.css') }}">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    </head>
    <body class="bg-dark">


        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="{{ route('login') }}">
                            <img class="align-content" src="{{ asset('/others') }}/{{ $shareData['admin_logo'] }}" alt="">
                        </a>
                    </div>
                    <div class="login-form">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email</label>
                                
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                </label>

                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('admin/assets/js/main.js') }}"></script>


    </body>
</html>
