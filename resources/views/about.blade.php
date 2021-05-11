@extends('layouts.app')

@section('content')
<div class="content">
<div class="links m-b-md">
                <a href="/" class="button button1">Home</a>
                <a href="{{route('products.myfavorites')}}" class="button button1">My Favourites</a>
                <a href="{{route('products.myadds')}}" class="button button1">My Ads</a>
            </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('about.passwordchange') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <h3>{{Auth::user()->name}}</h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <h3>{{Auth::user()->email}}</h3>
                            </div>
                        </div>
                        
                        

                        <div class="form-group row">
                            <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autocomplete="oldpass" autofocus>

                                @error('oldpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                        <!-- @if(session('errorMatching'))
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                            bla bla
                        </div> 
                        @endif -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete your account and all of your data') }}</div>
                    <div class="card-body"> 
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn btn-danger">
                                    <a href="{{ route('deleteAccount')}}" onclick="return confirm('Are you sure you want to delete your account and everything related to it??');">Delete Your Account !!</a>
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</div>
@endsection
