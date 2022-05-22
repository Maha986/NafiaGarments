<?php ?>
<div class="header-top">
    <div class="container">

        <!-- nav-left -->
        <ul class="nav-left" >
            <li ><span><i class="fa fa-phone" aria-hidden="true"></i>

                <?php
                    $phone = DB::table('home_settings')
                    ->where([
                        ['key', '=', 'phone'],
                        ['status', '=', 1],
                    ])->first();

                    if(!empty($phone)){

                        echo $phone->value;
                    }
                ?>
{{--                {{ DB::table('home_settings')--}}
{{--                ->where([--}}
{{--                    ['key', '=', 'phone'],--}}
{{--                    ['status', '=', 1],--}}
{{--                ])->first()->value }}--}}
                </span></li>
            <li >
                <span>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <?php
                    $email = DB::table('home_settings')
                        ->where([
                            ['key', '=', 'email'],
                            ['status', '=', 1],
                        ])->first();

                        if(!empty($email)){

                            echo $email->value;
                        }
                    ?>
{{--                    {{ DB::table('home_settings')--}}
{{--                        ->where([--}}
{{--                            ['key', '=', 'email'],--}}
{{--                            ['status', '=', 1],--}}
{{--                        ])->first()->value }}--}}
                </span>
            </li>
        </ul><!-- nav-left -->

        <!-- nav-right -->
        <ul class=" nav-right">
            <li class="dropdown setting">
                <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                <div class="dropdown-menu  ">
                    <ul class="account">
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Compare</a></li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            @php

                                $role = Auth::user()->roles->first();

                                $permissions = \Spatie\Permission\Models\Permission::all();

                                foreach($permissions as $permission){

                                     $item =   DB::table('role_has_permissions')
                                            ->where('permission_id',$permission->id)
                                            ->where('role_id',$role->id)
                                            ->first();

                                     if(!empty($item)){

                                         break;
                                     }
                                }

                                if(!empty($item)){

                            @endphp

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                </li>

                            @php

                                }
                                else if($role->name == "reseller"){

                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reseller.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>

                            @php

                                }
                                else if($role->name == "salecenter"){

                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('salecenter.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>

                            @php

                                }
                                else if($role->name == "rider"){

                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rider.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>

                            @php

                                }
                                else if($role->name == "customer"){

                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.dashboard') }}">{{ __('My Profile') }}</a>
                            </li>

                            @php

                                }

                            @endphp


                            <li>
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </li>
            <li><a href="#" >Services</a></li>
            <li><a href="#">Support </a></li>
        </ul><!-- nav-right -->

    </div>
</div>
