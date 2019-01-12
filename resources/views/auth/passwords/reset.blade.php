@extends('auth.app')

@section('content')
    <section class="pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 text-left">
                    <div class="main_title">
                        <h1 class="p-0 d-inline-block text-center mb-5">Reset Password</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 d-flex">

                    <div class="col-md-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

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
                                    <label for="password_confirmation" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                </div>

                                <div class="form-group col-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
