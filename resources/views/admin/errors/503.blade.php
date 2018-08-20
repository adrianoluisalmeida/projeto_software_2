<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    {{--<meta content="" name="description"/>--}}
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">


    <title>@yield('header_title', 'Admin')</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/css/backend.css') }}" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('/js/modern.js') }}"></script>
</head>

<body class="page-404-full-page text-center">
<div class="col-md-12 page-404">

    <div class="number">
        503
    </div>
    <div class="details">
        <h3>Oops! Este serviço não está disponível.</h3>
        <p>
            O servidor não pode processar a solicitação gerada pela sua aplicação. <br/>Tente novamente mais tarde.
            <br/>
            Para mais informações entre em contato com <a href="mailto:suporte@taskka.com.br">suporte@taskka.com.br</a>
        </p>
    </div>
    <br/><br/>
    <a class="btn btn-primary" href="{{ url('/admin') }}">Voltar para o Administrativo</a>
</div>
</body>


