
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Opg</title>
        <link rel="icon" href="{!! asset('images/icon.png') !!}"/>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/stil.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: whitesmoke;;
                color: #32a883;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #32a883;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            @media only screen and (max-width:600px) {
                .links > a {
                    display: block;

                }
            }



        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                    @else
                        <a href="{{ route('login') }}">Prijava</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registracija</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <x-application-logo class="block h-10 w-auto fill-current text-green-600" />
                </div>

                <div class="links">


                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Proizvodi') }}
                 </x-nav-link>  @auth
                 @if(Auth::user()->isSuperAdmin())
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ __('Korisnici') }}
                    </x-nav-link>
                    @endif
                    @endauth
                    <x-nav-link :href="route('opg.index')" :active="request()->routeIs('opg.index')">
                        {{ __('OPG-ovi') }}
                    </x-nav-link>
                    @guest
                    <x-nav-link :href="route('dashboard')" :>
                        {{ __('login') }}
                    </x-nav-link>
                    @endguest




                </div>
            </div>
        </div>
    </body>
</html>
