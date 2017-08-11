<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel =  {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            {!! Form::open([
                                'method' => 'POST', 'route' => 'login',
                                'class' => 'navbar-form navbar-left'
                            ]) !!}
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    {!! Form::text('username', null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Username'
                                    ]) !!}
                                    <small class="text-danger">{{ $errors->first('username') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {!! Form::password('password', [
                                      'class' => 'form-control',
                                      'required' => 'required',
                                      'placeholder' => 'Password'
                                    ]) !!}
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>

                                {!! Form::submit("Login", ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @else
                            <p class="navbar-text">
                                Loged in as <strong>{{ Auth::user()->getUsername() }}</strong>
                            </p>
                            {!! Form::open([
                              'method' => 'POST', 'route' => 'logout',
                              'class' => 'navbar-form navbar-left'
                            ]) !!}
                                {!! Form::submit("Logout", [
                                  'class' => 'btn btn-default'
                                ]) !!}
                            {!! Form::close() !!}
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @include('layouts._global-messages')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
