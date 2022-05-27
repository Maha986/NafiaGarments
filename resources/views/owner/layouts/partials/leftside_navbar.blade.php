<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">

            <li class="nav-item {{ $activePage == 'resellerIndex' ? 'active':'' }}"><a class="nav-item-hold" href="{{ route('reseller.dashboard') }}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{$activePage == 'productIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{ url('productdetails') }}"><i class="nav-icon far fa-box"></i><span class="nav-text">My Products Details</span></a>
                <div class="triangle"></div>
            </li>


  <li class="nav-item {{$activePage == 'Reports' ? 'active' : ''}} 
            {{$activePage == 'purchasereturnCreate' ? 'active' : ''}}"
            data-item="reports"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-file"></i>
                    <span class="nav-text">Reports</span></a>
                <div class="triangle"></div>
            </li>

          <!--   <li class="nav-item {{$activePage == 'cartIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{ route('reseller_cart.index') }}"><i class="nav-icon fas fa-shopping-cart"></i><span class="nav-text">Cart</span></a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{$activePage == 'catalogueIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{ route('catalogue.index') }}"><i class="nav-icon fa fa-list"></i><span class="nav-text">Catalogue</span></a>
                <div class="triangle"></div>
            </li> -->

{{--            <li class="nav-item {{$activePage == 'userIndex' ? 'active' : ''}} {{$activePage == 'userCreate' ? 'active' : ''}} {{$activePage == 'roleIndex' ? 'active' : ''}}" data-item="users">--}}
{{--                <a class="nav-item-hold" href="">--}}
{{--                    <i class="nav-icon i-Administrator"></i>--}}
{{--                    <span class="nav-text">Users</span>--}}
{{--                </a>--}}
{{--                <div class="triangle"></div>--}}
{{--            </li>--}}

        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
{{--        <ul class="childNav" data-parent="dashboard">--}}
{{--            <li class="nav-item"><a href="dashboard1.html"><i class="nav-icon i-Clock-3"></i><span class="item-name">Version 1</span></a></li>--}}
{{--        </ul>--}}


{{--        <ul class="childNav" data-parent="users">--}}

{{--            <li class="nav-item {{$activePage == 'userIndex' ? 'active' : ''}}"><a href="{{route('user.index')}}"><i class="nav-icon i-Administrator"></i><span class="item-name">View All Users</span></a></li>--}}
{{--            <li class="nav-item {{$activePage == 'userCreate' ? 'active' : ''}}"><a href="{{route('user.create')}}"><i class="nav-icon i-Add-User"></i><span class="item-name">Create User</span></a></li>--}}
{{--            <li class="nav-item {{$activePage == 'roleIndex' ? 'active' : ''}}"><a href="{{route('role.index')}}"><i class="nav-icon i-Add-User"></i><span class="item-name">View All Roles</span></a></li>--}}

{{--        </ul>--}}

 <ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('inventoryreport_owner')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Inventory Report </span></a></li>
         
        </ul>



        <ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('orderreport_owner')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Order Report </span></a></li>
         
        </ul>

    </div>
    <div class="sidebar-overlay"></div>
</div>
