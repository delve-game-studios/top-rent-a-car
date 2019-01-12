@extends('app')

@section('title', __('site.PAGE_PREFIX') . 'Log In')

@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row mt-md-5 pt-md-5 mt-sm-3 pt-sm-3">
            <div class="col-12 text-center">
                <div class="main_title">
                    <h1 class="p-0 d-inline-block text-center mb-5 text-light">Log In</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
<div class="container text-light">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="form-row">

                    <div class="form-group col-12">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-12">
                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-12">
                        <div class="checkbox">
                            <label class="d-flex align-items-center">
                                <input class="mr-3" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-primary px-5">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link ml-5" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</section>
@endsection
