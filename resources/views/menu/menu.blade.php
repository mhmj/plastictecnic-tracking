<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{ asset('img/tecnic.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">Plastictecnic</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        {{Auth::user()->name}}
                                    </span>
                </a>
                <span class="d-inline-block">{{Auth::user()->email}}</span>
            </div>
            <img style="width: 100%; height:100%" src="{{ asset('img/card-backgrounds/warehouse.jpg') }}" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>

        </div>
        <ul id="js-nav-menu" class="nav-menu">
            <li class="{{ (request()->routeIs('home')) ? 'active' : '' }} ">
                <a href="{{route('home')}}" title="Home" data-filter-tags="home">
                    <i class="fal fa-home" style="color: #FFF"></i>
                    <span class="nav-link-text" data-i18n="nav.application_intel">Home</span>
                </a>
            </li>
            {{--<li class="{{ (request()->routeIs('admin.packaging')) ? 'active' : '' }} ">--}}
                {{--<a href="{{route('admin.packaging')}}" title="Packaging" data-filter-tags="packaging">--}}
                    {{--<i class="fal fa-box" style="color: #FFF"></i>--}}
                    {{--<span class="nav-link-text" data-i18n="nav.application_intel">Packaging</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="{{ (request()->routeIs('admin.packaging') || request()->routeIs('admin.category')  || request()->routeIs('admin.type'))   ? 'active' : '' }} ">
                <a href="#" title="Packaging" data-filter-tags="packaging category type">
                    <i class="fal fa-box" style="color: #FFF"></i>
                    <span class="nav-link-text" data-i18n="nav.statistics_flot">Packaging</span>
                </a>
                <ul>
                    <li class="{{ (request()->routeIs('admin.packaging')) ? 'active' : '' }} ">
                        <a href="{{route('admin.packaging')}}" title="Packaging" data-filter-tags="packaging packaging">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">Packaging</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.category')) ? 'active' : '' }} ">
                        <a href="{{route('admin.category')}}"title="Category" data-filter-tags="packaging category">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">Category</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.type')) ? 'active' : '' }} ">
                        <a href="{{route('admin.type')}}"title="Type" data-filter-tags="packaging type">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">Type</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->routeIs('admin.shipment-in') || request()->routeIs('admin.shipment-out'))   ? 'active' : '' }} ">
                <a href="#" title="Shipment" data-filter-tags="shipment in out">
                    <i class="fal fa-shipping-fast" style="color: #FFF"></i>
                    <span class="nav-link-text" data-i18n="nav.statistics_flot">Shipment</span>
                </a>
                <ul>
                    <li class="{{ (request()->routeIs('admin.shipment-out')) ? 'active' : '' }} ">
                        <a href="{{route('admin.shipment-out')}}" title="Out" data-filter-tags="shipment out">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">Out</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.shipment-in')) ? 'active' : '' }} ">
                        <a href="{{route('admin.shipment-in')}}"title="In" data-filter-tags="shipment in">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">In</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->routeIs('admin.company') || request()->routeIs('admin.user')) ? 'active' : '' }} ">
                <a href="#" title="Personnel" data-filter-tags="personnel company user">
                    <i class="fal fa-building" style="color: #FFF"></i>
                    <span class="nav-link-text" data-i18n="nav.statistics_flot">Personnel</span>
                </a>
                <ul>
                    <li class="{{ (request()->routeIs('admin.company')) ? 'active' : '' }} ">
                        <a href="{{route('admin.company')}}" title="Company" data-filter-tags="personnel company">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">Company</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.user')) ? 'active' : '' }} ">
                        <a href="{{route('admin.user')}}"title="User" data-filter-tags="personnel user">
                            <span class="nav-link-text" data-i18n="nav.statistics_flot">User</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{--<li class="{{ (request()->routeIs('admin.company')) ? 'active' : '' }} ">--}}
                {{--<a href="{{route('admin.company')}}" title="Company" data-filter-tags="company">--}}
                    {{--<i class="fal fa-building" style="color: #FFF"></i>--}}
                    {{--<span class="nav-link-text" data-i18n="nav.statistics_flot">Company</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    <!-- NAV FOOTER -->

</aside>