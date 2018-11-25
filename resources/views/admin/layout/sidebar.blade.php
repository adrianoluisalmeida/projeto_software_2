<?php
$menus = [
    "Dashboard" => [
        "url" => "/admin",
        "icon" => "fa fa-home"
    ],
    "Administração" => [
        "icon" => "fa fa-cogs",
        "base_url" => "/admin/roles",
        "sub" => [
            "Grupos" => "admin/roles",
            "Permissões" => "admin/permissions",
            "Usuários" => "admin/users",
            "Grupos/Permissões" => "admin/permissions/roles",
        ],
    ],
    "Entidades" => [
        "url" => "/admin/entities",
        "icon" => "fa fa-building"
    ],
    "Categorias" => [
        "url" => "/admin/categories",
        "icon" => "fa fa-list-ul"
    ],
    "Solicitações (Reports)" => [
        "url" => "/admin/reports",
        "icon" => "fa fa-bell"
    ],
    "Contatos" => [
        "url" => "/admin/contacts",
        "icon" => "fa fa-envelope"
    ],
];
$urlCurrent = '/' . Request::segment(1) . '/' .  Request::segment(2);
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <div class="clearfix">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <form class="search-form" role="form" action="index.html" method="get">
                    <div class="input-icon right">
                        <i class="icon-magnifier"></i>
                        <input type="text" class="form-control" name="query" placeholder="Search...">
                    </div>
                </form>
            </li>
            @foreach($menus as $key => $menu)
                @if(isset($menu['permission']))
                    @if(!Auth::user()->hasRole($menu['permission']))
                        <?php continue; ?>
                    @endif
                @endif
                @if(!isset($menu['url']))
                    <li class="{{ $urlCurrent == $menu['base_url'] ? 'active' : '' }}">
                        <a href="javascript:;">
                            <i class="{{ $menu['icon'] }}"></i>
                            <span class="title">{{$key}}</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            @foreach($menu['sub'] as $ke => $m)
                                <li>
                                    <a href="{{ url($m) }}">
                                        {{$ke}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="start {{ $urlCurrent == $menu['url'] ? 'active' : '' }}">
                        <a href="{{url($menu['url'])}}">
                            <i class="{{ $menu['icon'] }}"></i>
                            <span class="title">{{$key}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                @endif

            @endforeach

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
