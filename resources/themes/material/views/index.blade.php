<!DOCTYPE html>
<html class="app" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('hotel_name') }} - @stack('title')</title>

    <link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('assets/images/home_icon.gif') }}">

    @vite(['resources/themes/material/sass/index.scss', 'resources/themes/material/js/app.js'])
    @stack('scripts')
</head>

<body>
<!-- TODO: Add header if debug is true in prod -->

<!-- Validation Errors -->
<x-messages.flash-messages />

<div id="app">
    <div class="hero">
        <div class="hotel"></div>
    </div>

    <div id="header-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo"></div>
                    <div class="online-count">
                        <b>{{ $onlineUsers }}</b> Habbos online
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="login-position">
                    <h2>
                        {{ __('Login') }}
                    </h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <label for="username">
                            {{ __('Username') }}
                        </label>
                        <input type="text" name="username" id="username">

                        <label for="password">
                            {{ __('Password') }}
                        </label>
                        <input type="password" name="password" id="password">

                       <div class="d-flex" style="gap: 10px;">
                           <div class="col-md-6">
                               <a href="register/step-1.php" class="btn big orange register-button">
                                   {{ __('Register') }}
                               </a>
                           </div>

                           <div class="col-md-6">
                               <button type="submit" class="btn big green login-button">
                                   {{ __('Login') }}
                               </button>
                           </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <div class="col-md-12">
            <div id="footer-content">
                <ul class="footer-links">
                    <li><a href="">Homepage</a></li>
                    <li><a href="">Kontakt</a></li>
                </ul>
                <p class="footer">{{ setting('hotel_name') }} &copy; {{ date('Y') }}. All rights reserved.<br />{{ setting('hotel_name') }} Hotel is no way affiliated with Sulake Corporation Oy.</p>
            </div>
        </div>
    </footer>
</div>

@stack('javascript')
</body>
</html>
