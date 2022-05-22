<div class="main-header">

    <?php $logo = DB::table('home_settings')
        ->where([
            ['key', '=', 'logo'],
            ['status', '=', 1],
        ])->first();

    if(!empty($logo)){

        $logo = $logo->value;
    }
    ?>

    <div class="logo">
        <img src="{{asset('storage/images/logos/'.$logo)}}" alt="logo" style="width:115px; height:40px;" />
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
{{--    <div class="d-flex align-items-center">--}}
{{--        <!-- Mega menu -->--}}
{{--        <div class="dropdown mega-menu d-none d-md-block">--}}
{{--            <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega Menu</a>--}}
{{--            <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">--}}
{{--                <div class="row m-0">--}}
{{--                    <div class="col-md-4 p-4 bg-img">--}}
{{--                        <h2 class="title">Mega Menu <br> Sidebar</h2>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores natus laboriosam fugit, consequatur.--}}
{{--                        </p>--}}
{{--                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem odio amet eos dolore suscipit placeat.</p>--}}
{{--                        <button class="btn btn-lg btn-rounded btn-outline-warning">Learn More</button>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4 p-4">--}}
{{--                        <p class="text-primary text--cap border-bottom-primary d-inline-block">Features</p>--}}
{{--                        <div class="menu-icon-grid w-auto p-0">--}}
{{--                            <a href="#"><i class="i-Shop-4"></i> Home</a>--}}
{{--                            <a href="#"><i class="i-Library"></i> UI Kits</a>--}}
{{--                            <a href="#"><i class="i-Drop"></i> Apps</a>--}}
{{--                            <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>--}}
{{--                            <a href="#"><i class="i-Checked-User"></i> Sessions</a>--}}
{{--                            <a href="#"><i class="i-Ambulance"></i> Support</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4 p-4">--}}
{{--                        <p class="text-primary text--cap border-bottom-primary d-inline-block">Components</p>--}}
{{--                        <ul class="links">--}}
{{--                            <li><a href="accordion.html">Accordion</a></li>--}}
{{--                            <li><a href="alerts.html">Alerts</a></li>--}}
{{--                            <li><a href="buttons.html">Buttons</a></li>--}}
{{--                            <li><a href="badges.html">Badges</a></li>--}}
{{--                            <li><a href="carousel.html">Carousels</a></li>--}}
{{--                            <li><a href="lists.html">Lists</a></li>--}}
{{--                            <li><a href="popover.html">Popover</a></li>--}}
{{--                            <li><a href="tables.html">Tables</a></li>--}}
{{--                            <li><a href="datatables.html">Datatables</a></li>--}}
{{--                            <li><a href="modals.html">Modals</a></li>--}}
{{--                            <li><a href="nouislider.html">Sliders</a></li>--}}
{{--                            <li><a href="tabs.html">Tabs</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- / Mega menu -->--}}
{{--        <div class="search-bar">--}}
{{--            <input type="text" placeholder="Search">--}}
{{--            <i class="search-icon text-muted i-Magnifi-Glass1"></i>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- Grid menu Dropdown -->
        <div class="dropdown">
            <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="menu-icon-grid">
                    <a href="#"><i class="i-Shop-4"></i> Home</a>
                    <a href="#"><i class="i-Library"></i> UI Kits</a>
                    <a href="#"><i class="i-Drop"></i> Apps</a>
                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                    <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                    <a href="#"><i class="i-Ambulance"></i> Support</a>
                </div>
            </div>
        </div>
    @php $contactus= \App\Models\Contactus::where('status','0')->get(); @endphp
    @php $orders= \App\Models\Order::where('n_status','0')->get(); @endphp
        @php $ccu=count($contactus);
            $co=count($orders)@endphp
        <!-- Notificaiton -->
        <div class="dropdown">
            <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-primary">{{$ccu+$co}}</span>
                <i class="i-Bell text-muted header-icon"></i>
            </div>
            <!-- Notification dropdown -->
            <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
              

                @foreach($contactus as $contactus)
                <form class="forms-sample" method="POST" action="{{ route('contactus.status',$contactus->id) }}" name="notification">
                    @csrf()
                    @method('PUT')
                <div class="dropdown-item d-flex" onClick="document.forms['notification'].submit();">
                    <div class="notification-icon">
                        <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span>{{$contactus->name}}</span>
                            <span class="badge badge-pill badge-primary ml-1 mr-1">new</span>
                            <span class="flex-grow-1"></span>
                            <span class="text-small text-muted ml-auto">{{$contactus->created_at->diffForHumans()}}</span>
                        </p>
                        <p class="text-small text-muted m-0">{{\Illuminate\Support\Str::limit($contactus->message,15 , $end='...')}}</p>
                    </div>
                </div>
                </form>
                @endforeach
         
           
                    @foreach($orders as $order)
                        <form class="forms-sample" method="POST" action="{{ route('order.status',$order->id) }}" name="notification2">
                            @csrf()
                            @method('PUT')
                            <div class="dropdown-item d-flex" onClick="document.forms['notification2'].submit();">
                                <div class="notification-icon">
                                    <i class="i-Data-Power text-danger mr-1"></i>
                                </div>
                                <div class="notification-details flex-grow-1">
                                    <p class="m-0 d-flex align-items-center">
                                        @php $user= \App\Models\User::where('id', $order->user_id)->first(); @endphp
                                        <span>{{$user->name}}</span>
                                        <span class="badge badge-pill badge-danger ml-1 mr-1">new</span>
                                        <span class="flex-grow-1"></span>
                                        <span class="text-small text-muted ml-auto">{{$order->created_at->diffForHumans()}}</span>
                                    </p>
                                    <p class="text-small text-muted m-0">{{\Illuminate\Support\Str::limit($order->order_number,15 , $end='...')}}</p>
                                </div>
                            </div>
                        </form>
                    @endforeach
      
            </div>
        </div>
        <!-- Notificaiton End -->
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{ asset('admin-assets/images/faces/1.jpg') }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> Timothy Carlson
                    </div>
                    <a class="dropdown-item">Account settings</a>
                    <a class="dropdown-item">Billing history</a>
                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
