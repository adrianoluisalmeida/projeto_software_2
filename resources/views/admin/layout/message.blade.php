
@if (session()->has('message-success'))
    <script type="text/javascript">
        window.backend.AppNotify._success('{{ session('message-success') }}');
    </script>
@endif

@if (session()->has('message-error'))
    <script type="text/javascript">
        window.backend.AppNotify._error('{{ session('message-error') }}');
    </script>
@endif

{{--@if (count($errors) > 0)--}}
    {{--<script type="text/javascript">--}}
        {{--var msg = "<ul>";--}}
        {{--@foreach ($errors->all() as $error)--}}
                {{--msg += "<li>{{ $error }}</li>";--}}
        {{--@endforeach--}}
                {{--msg += "</ul>";--}}

        {{--window.backend.AppNotify._error(msg, '<strong>Whoops!</strong> Houve algum problema!');--}}
    {{--</script>--}}
{{--@endif--}}