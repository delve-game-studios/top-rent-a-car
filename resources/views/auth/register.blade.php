@extends('app')

@section('title', 'Sign up | Traina')
@section('description', 'Create an account with Traina and start booking classes with your favourite fitness instructors.')

@section('content')
<section class="pb-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center text-white">
                <div class="main_title">
                    <h1 class="p-0 d-inline-block text-center mb-5">Create an Account</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
<div class="container text-white">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">

            <div class="col">
                
                <form  method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>@endif
                        </div>

                        <div class="form-group col-12">
                            <label for="email">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>@endif
                        </div>

                        <div class="form-group col-12">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <p class="help-text mt-1"><small>Password must be at least 6 symbols.</small></p>
                            @if ($errors->has('password'))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>@endif
                        </div>

                        <div class="form-group col-12">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="col-12 btn btn-primary mt-4">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>                    
                </form>

                <div class="mt-5">
                    <p>Already got an account? <a href="{{ route('login') }}">Sign in here</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
@endsection
