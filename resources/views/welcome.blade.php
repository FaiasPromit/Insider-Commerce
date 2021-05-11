@extends('layouts.layout')

@section('content')
        <!-- <div class="flex-center position-ref full-height"> -->
        <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            <!-- <div class="content"> -->
            <!-- <img src="/img/in.com.png" alt="in.com logo" width="500" hight="500"> -->
                

                <!-- <div class="links">
                    <a href="{{ route('products.buy') }}" class="button button1">Buy</a>
                    <a href="{{ route('products.sell') }}" class="button button1">Sell</a>
                    <a href="{{route('products.myadds')}}" class="button button1">My Ads</a>
                    <a href="{{route('products.myfavorites')}}" class="button button1">My Favorites</a>
                    @auth
                        <a href="{{route('about')}}">My Profile</a>
                    @endauth
                </div>
            </div>
        </div> -->
<!-- MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}" -->
@endsection