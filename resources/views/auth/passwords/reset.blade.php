@extends('auth.app')

@section('content')


    <div class="logo">
        {{--<img src="/images/backend/logo_taskka.png" class="img-responsive center-block" alt="logo"/>--}}
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <h3 class="form-title">{{ __('Reset Password') }}</h3>

            <div class="form-group row">
                <label for="email" class="col-form-label col-md-12 text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-12">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                       class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
            <div class="forget-password">
                <h4>Lembrou sua senha ?</h4>

                <p>
                    Não se preocupe, clique em <a href="{{ url('/login') }}">clique aqui</a>
                    para voltar ao login.
                </p>
            </div>


        </form>

    </div>
    <div class="col-sm-12 text-center copy-footer" style="margin-top: 30px; color: #fff">
        <p> {{ date('Y') }} &copy; <a href="http://www.taskka.com.br">Taskka</a> - Sites e Marketing Digital</p>
    </div>

    
@endsection
