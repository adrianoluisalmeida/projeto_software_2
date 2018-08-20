@extends('auth.app')

@section('header_title')
    Login - {{ config('app.name') }}
@endsection

@section('content')
    <div class="logo">
        {{--<img src="/images/backend/logo_taskka.png" class="img-responsive center-block" alt="logo"/>--}}
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <form class="login-form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <h3 class="form-title">Faça login na sua conta</h3>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">E-mail</label>

                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="E-mail"
                           name="email" value="{{ old('email') }}"/>
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Senha</label>

                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                           placeholder="Senha" name="password"/>
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            </div>

            <div class="form-actions">
                {{--<label class="checkbox">--}}
                {{--<input type="checkbox" name="remember" value="1"/> Remember me </label>--}}
                <button type="submit" class="btn btn-info pull-right">
                    Entrar
                </button>
            </div>
            <div class="forget-password">
                <h4>Esqueceu sua senha ?</h4>

                <p>
                    Não se preocupe, clique em <a href="javascript:;" id="forget-password">clique aqui</a>
                    para redefinir sua senha.
                </p>
            </div>


        </form>
        {!! Form::open(['url' => '/password/email', 'class' => 'forget-form']) !!}
        <h3>Esqueceu sua senha ?</h3>

        <p>
            Informe seu e-mail para recuperar seu acesso.
        </p>

        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">
                <i class="m-icon-swapleft"></i> Voltar
            </button>
            <button type="submit" class="btn btn-info pull-right">
                Enviar
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-12 text-center copy-footer" style="margin-top: 30px; color: #fff">
        <p> {{ date('Y') }} &copy; <a href="http://www.taskka.com.br">Taskka</a> - Sites e Marketing Digital</p>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/admin.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            App.init();
            Login.init();

            var action = location.hash.substr(1);

            if (action == 'createaccount') {
                $('.register-form').show();
                $('.login-form').hide();
                $('.forget-form').hide();
            } else if (action == 'forgetpassword') {
                $('.register-form').hide();
                $('.login-form').hide();
                $('.forget-form').show();
            }
        });
    </script>
@endpush