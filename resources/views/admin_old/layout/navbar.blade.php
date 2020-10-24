<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="fas fa-bars"></i></a></li>
            <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="fas fa-search pdd-right-10"></i></a></li>
            <li class="search-input"><input class="form-control" type="text" placeholder="Search..."></li>
        </ul>
        <ul class="nav-right">
            <li class="notifications dropdown"><span class="counter bgc-red">3</span> <a href="" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="fas fa-bell"></i></a>
                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Notifications</span></li>
                    <li>
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                        </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT"><span><a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
                </ul>
            </li>
            <li class="notifications dropdown"><span class="counter bgc-blue">3</span> <a href="" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="fas fa-envelope"></i></a>
                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Emails</span></li>
                    <li>
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                        </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT"><span><a href="email.html" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right mL-10"></i></a></span></li>
                </ul>
            </li>
            <li class="dropdown"><a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10"><img class="w-2r bdrs-50p" src="{{auth()->user()->profile_image}}" alt="{{auth()->user()->name}}"></div>
                    <div class="peer"><span class="fsz-sm c-grey-900">{{auth()->user()->name}}</span></div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li><a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="fas fa-power-off mR-10"></i><span>Logout</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@if(session()->has('success'))
<div class="noto noto-success">
    {{session('success')}}
</div>
@endif
@if ($errors->any())
<div class="noto noto-danger">
    @foreach ($errors->all() as $error)
    {!! $error . '<br>' !!}
    @endforeach
</div>
@endif