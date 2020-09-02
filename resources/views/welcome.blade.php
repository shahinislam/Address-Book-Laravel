<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Address Book</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <style>
            body {
                font-family: cursive, sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url("address-book.jpg");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                z-index: -1;
            }

            .title {
                position: relative;
                animation-name: heading;
                animation-duration: 4s;
                animation-delay: -1s;
            }

            @keyframes heading {
                0%   { left:0px; bottom:500px;}
                100% { left:0px; bottom:0px;}
            }
            .btn-log {
                position: relative;
                animation-name: btnlog;
                animation-duration: 4s;
                animation-delay: -1s;
            }

            @keyframes btnlog {
                0%   { right:700px; bottom:0px;}
                100% { right:0px; bottom:0px;}
            }
            .btn-reg {
                position: relative;
                animation-name: btnreg;
                animation-duration: 4s;
                animation-delay: -1s;
            }

            @keyframes btnreg {
                0%   { left:700px; bottom:0px;}
                100% { left:0px; bottom:0px;}
            }

            .btn{
                border-radius: 0;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                background: rgba(0, 0, 0, 0.6);
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
                color: lightblue;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: lightblue;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Address Book
                </div>

                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a class="btn btn-warning" href="{{ url('/') }}">Home</a>
                        @else
                            <a class="btn-log btn btn-lg btn-success px-4 mr-2" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a class="btn-reg btn btn-lg btn-info" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <div class="bg"></div>
    </body>
</html>
