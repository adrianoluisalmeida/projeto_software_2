<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layout.head')
<body class="page-header-fixed">


@include('admin/layout/top')

<div class="page-container">

    @include('admin/layout/sidebar')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        @yield('navigation', '')
                    </ol>
                </div>
            </div>
            <div class="row">

                @yield('content')

            </div>
        </div>
    </div>


</div>
<script>
    var resizefunc = [];
</script>



@include('admin/layout/footer')

<!-- Scripts -->
<script src="{{ asset('js/admin.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
//        App.init(); // initlayout and core plugins
    });
</script>

@include('admin/layout/message')

{{--Others scripts --}}
@stack('scripts')

</body>
</html>
