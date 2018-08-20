<!DOCTYPE html>
<html>
@include('admin.layout.head')
<body class="login">
<div class="animationload">
    <div class="loader"></div>
</div>
<div class="account-pages"></div>
<div class="clearfix"></div>
@yield('content')

</body>
@stack('scripts')
</html>