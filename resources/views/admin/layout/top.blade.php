<div class="header navbar navbar-fixed-top">
    <div class="header-inner">
        <div class="page-logo">
            <a href="{{ url("/admin") }}">
                <h3 style="margin-top: 10px; color: #fff">{{ config('app.name') }}</h3>
                {{--<img src="/images/admin/logo.png" class="img-responsive col-md-12" style="margin-top: 6px; width: 140px" alt="logo"/>--}}
            </a>
        </div>
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="{{ asset('/images/admin/menu-toggler.png') }}" alt=""/>
        </a>
        <ul class="nav navbar-nav pull-right">

            <li class="devider">
                &nbsp;
            </li>
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <span class="username username-hide-on-mobile">
                        
                        
                    </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  
                    <li class="divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix">
</div>