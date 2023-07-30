<!DOCTYPE html>
<html class="app" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('hotel_name') }} - @stack('title')</title>

    <link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('assets/images/home_icon.gif') }}">

        @vite(['resources/themes/material/sass/app.scss', 'resources/themes/material/js/app.js'])
    @stack('scripts')
</head>

<body>


<!-- Validation Errors -->
<x-messages.flash-messages />

<div id="header-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hotel"></div>

                <div class="online-count-box"><b>{{ $onlineUsers }}</b>{{ setting('hotel_name') }} online</div>

                <a href="{{ route('nitro-client') }}" class="btn green big check-in-header" target="_blank">
                    {{ __('Enter :hotel hotel', ['hotel' => setting('hotel_name')]) }}
                </a>
            </div>
        </div>
    </div>
</div>

<div id="header-menu">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <ul class="user-menu">
                    <li>
                        <a href="me.php">
                            <div class="user-avatar-menu" style="background-image:url(http://habbo.com/habbo-imaging/avatarimage?figure={{ auth()->user()->look }}&head_direction=3&gesture=sml)"></div>{{ auth()->user()->username }}<span><i class="far fa-angle-down"></i></span>
                        </a>

                        <ul class="user-subnavi">
                            <li><a href="profile.php">Meine Seite</a></li>
                            <li><a href="settings.php">Einstellungen</a></li>
                            <li><a href="" class="logout">Abmelden</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-2">
                <a href="\" class="logo"></a>
            </div>
            <div class="col-5">
                <ul class="navigation">
                    <li>
                        <a href="community.php">Community<span><i class="far fa-angle-down"></i></span></a>

                        <ul class="subnavi">
                            <li><a href="news.php">News</a></li>
                            <li><a href="staffs.php">Mitarbeiter</a></li>
                            <li><a href="photos.php">Fotos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="app">
    {{ $slot }}
</div>

@stack('javascript')
</body>
</html>
