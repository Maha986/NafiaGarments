<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
           
            <li class="nav-item {{ $activePage == 'adminIndex' ? 'active':'' }}"><a class="nav-item-hold" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span></a>
                <div class="triangle"></div>
            </li>
       

            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show users') || auth()->user()->hasPermissionTo('create users') || auth()->user()->hasPermissionTo('show roles'))
            <li class="nav-item {{$activePage == 'userIndex' ? 'active' : ''}} {{$activePage == 'userCreate' ? 'active' : ''}} {{$activePage == 'roleIndex' ? 'active' : ''}}" data-item="users">
                <a class="nav-item-hold" href="">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Users @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show roles'))  And Roles  @endif</span>
                </a>
                <div class="triangle"></div>
            </li>
            @endif

            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show categories') || auth()->user()->hasPermissionTo('create categories'))
            <li class="nav-item {{$activePage == 'categoryIndex' ? 'active' : ''}} {{$activePage == 'categoryCreate' ? 'active' : ''}}" data-item="categories"><a class="nav-item-hold" href="#">
                    <i class="nav-icon fa fa-bars"></i>
                    <span class="nav-text">Product Category</span></a>
                <div class="triangle"></div>
            </li>
            @endif

            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show products') || auth()->user()->hasPermissionTo('show colours') || auth()->user()->hasPermissionTo('show sizes') || auth()->user()->hasPermissionTo('show batches') )
            <li class="nav-item {{$activePage == 'productIndex' ? 'active' : ''}} {{$activePage == 'colourIndex' ? 'active' : ''}} {{$activePage == 'sizeIndex' ? 'active' : ''}} {{$activePage == 'batchIndex' ? 'active' : ''}} {{$activePage == 'productSalecenterIndex' ? 'active' : ''}} {{$activePage == 'productOwnerIndex' ? 'active' : ''}}" data-item="products"><a class="nav-item-hold" href="#">
                    <i class="nav-icon far fa-box"></i>
                    <span class="nav-text">Products</span></a>
                <div class="triangle"></div>
            </li>
            @endif

   @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show sale centers') || auth()->user()->hasPermissionTo('create sale centers'))

            <li class="nav-item {{$activePage == 'saleCenterIndex' ? 'active' : ''}} 
            {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"
            data-item="salecenters"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-user-friends"></i>
                    <span class="nav-text">Sale Center</span></a>
                <div class=""></div>
            </li>
            @endif


            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show riders') || auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show couriers'))
            <li class="nav-item {{$activePage == 'riderIndex' ? 'active' : ''}} {{$activePage == 'riderCreate' ? 'active' : ''}} {{ $activePage == 'courierIndex' ? 'active' : ''}} {{$activePage == 'courierCreate' ? 'active' : ''}}" data-item="riders_and_couriers"><a class="nav-item-hold" href="#">
                    <i class="nav-icon fas fa-biking"></i><span class="nav-text">Riders @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show couriers')) And Couriers @endif</span></a>
                <div class="triangle"></div>
            </li>
            @endif

         
@if(auth()->user()->hasRole('super-admin'))
            <li class="nav-item {{$activePage == 'riderorderdetailIndex' ? 'active' : ''}} 
            {{$activePage == 'riderorderdetailCreate' ? 'active' : ''}}"
            data-item=""><a class="nav-item-hold" href="{{route('riderorderdetail')}}">
                   <i class="nav-icon fas fa-biking"></i>
                    <span class="nav-text">Rider Order Detail </span></a>
                <div class="triangle"></div>
            </li>
 @endif
       

         <!--    @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show suppliers'))
            <li class="nav-item {{$activePage == 'supplierIndex' ? 'active' : ''}} 
            {{$activePage == 'supplierCreate' ? 'active' : ''}}">
            <a class="nav-item-hold" href="{{route('supplier.index')}}">
                    <i class="nav-icon fas fa-user-friends"></i><span class="nav-text">Suppliers</span></a>
                <div class="triangle"></div>
            </li>
            @endif -->



   @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show suppliers') || auth()->user()->hasPermissionTo('create suppliers'))

            <li class="nav-item {{$activePage == 'supplierIndex' ? 'active' : ''}} 
            {{$activePage == 'supplierCreate' ? 'active' : ''}}"
            data-item="supplierss"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-user-friends"></i>
                    <span class="nav-text">Suppliers</span></a>
                <div class=""></div>
            </li>
            @endif















            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show logos') || auth()->user()->hasPermissionTo('show ape') || auth()->user()->hasPermissionTo('show sliders') || auth()->user()->hasPermissionTo('show banners') || auth()->user()->hasPermissionTo('show services') || auth()->user()->hasPermissionTo('show floors'))
            <li class="nav-item {{$activePage == 'aboutIndex' ? 'active' : ''}} {{$activePage == 'logoIndex' ? 'active' : ''}} {{$activePage == 'apeIndex' ? 'active' : ''}} {{$activePage == 'sliderIndex' ? 'active' : ''}} {{$activePage == 'bannerIndex' ? 'active' : ''}} {{$activePage == 'serviceIndex' ? 'active' : ''}} {{$activePage == 'floorIndex' ? 'active' : ''}}" data-item="homesettings"><a class="nav-item-hold" href="#">
                    <i class="nav-icon fas fa-cogs"></i><span class="nav-text">Home Page Settings</span></a>
                <div class="triangle"></div>
            </li>
            @endif

      <!--   
                <li class="nav-item {{$activePage == 'deliverychargesIndex' ? 'active' : ''}} "><a class="nav-item-hold" href="{{route('delivery_charges.index')}}">
                        <i class="nav-icon fas fa-dollar-sign"></i><span class="nav-text">Delivery Charges</span></a>
                    <div class="triangle"></div>
                </li>
          
 --> 


@if(auth()->user()->hasRole('super-admin'))


            <li class="nav-item {{$activePage == 'deliverychargesIndex' ? 'active' : ''}} 
            {{$activePage == 'deliverychargesCreate' ? 'active' : ''}}"
            data-item="delivery"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-dollar-sign"></i>
                    <span class="nav-text">Delivery Charges</span></a>
                <div class=""></div>
            </li>
            @endif
           









{{--{{route('order.index')}}--}}

            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show orders')||auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('show orders')|| auth()->user()->hasRole('customer service') || auth()->user()->hasPermissionTo('show orders')|| auth()->user()->hasRole('store') || auth()->user()->hasRole('sorting-packing')||auth()->user()->hasRole('labelling-dispatch'))
          

                <li class="nav-item {{$activePage == 'orderIndex' ? 'active' : ''}} "><a class="nav-item-hold" href="{{route('orderdetails')}}">
                        <i class="nav-icon fab fa-first-order"></i><span class="nav-text">Orders</span></a>
                    <div class="triangle"></div>
                </li>
           
            @endif




         @if(auth()->user()->hasRole('super-admin'))

            <li class="nav-item {{$activePage == 'manualorderIndex' ? 'active' : ''}} 
            {{$activePage == 'manualorderCreate' ? 'active' : ''}}"
            data-item=""><a class="nav-item-hold" href="{{route('manualorder')}}">
                   <i class="nav-icon fab fa-first-order"></i>
                    <span class="nav-text">Manual Order </span></a>
                <div class="triangle"></div>
            </li>
          @endif






@if(auth()->user()->hasRole('super-admin'))

                <li class="nav-item {{$activePage == 'dealIndex' ? 'active' : ''}} {{$activePage == 'offerIndex' ? 'active' : ''}} {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}" data-item="discounts"><a class="nav-item-hold" href="#">
                        <i class="nav-icon fas fa-tags"></i><span class="nav-text">Deals And Discounts</span></a>
                    <div class="triangle"></div>
                </li>
@endif
    
<!-- 
        
                <li class="nav-item {{$activePage == 'resellerIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{route('reseller.index')}}">
                        <i class="nav-icon fas fa-users"></i><span class="nav-text">Resellers</span></a>
                    <div class="triangle"></div>
                </li>
           
 -->





@if(auth()->user()->hasRole('super-admin'))

            <li class="nav-item {{$activePage == 'resellerIndex' ? 'active' : ''}} 
            {{$activePage == 'resellerCreate' ? 'active' : ''}}"
            data-item="res"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-dollar-sign"></i>
                    <span class="nav-text">Resellers</span></a>
                <div class=""></div>
            </li>
@endif
           




@if(auth()->user()->hasRole('super-admin'))
       
                <li class="nav-item {{$activePage == 'contactusIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{route('contactus.index')}}"><i class="nav-icon fas fa-envelope-open-text"></i><span class="nav-text">Customers Contacted</span></a>
                    <div class="triangle"></div>
                </li>
    @endif
       
@if(auth()->user()->hasRole('super-admin'))
                <li class="nav-item {{$activePage == 'reviewsIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{route('review.index')}}"><i class="nav-icon fa fa-star"></i><span class="nav-text">Customers Reviews</span></a>
                    <div class="triangle"></div>
                </li>
        @endif

       
                <li class="nav-item {{$activePage == 'customerIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{route('customer.index')}}">
                        <i class="nav-icon fas fa-users"></i><span class="nav-text">customers</span></a>
                    <div class="triangle"></div>
                </li>
           








            <li class="nav-item {{$activePage == 'customerIndex' ? 'active' : ''}} 
            {{$activePage == 'customerCreate' ? 'active' : ''}}"
            data-item="custo"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-users"></i>
                    <span class="nav-text">Customers</span></a>
                <div class=""></div>
            </li>
   






        
                <li class="nav-item {{$activePage == 'accountsIndex' ? 'active' : ''}}" data-item="accounts">
                    <a class="nav-item-hold">
                        <i class="nav-icon fas fa-credit-card fa-2x"></i>
                        <span class="nav-text">Accounts</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            

                <li class="nav-item {{$activePage == 'ownerIndex' ? 'active' : ''}}"><a class="nav-item-hold" href="{{route('owner.index')}}">
                        <i class="nav-icon fas fa-users"></i><span class="nav-text">owners</span></a>
                    <div class="triangle"></div>
                </li>
          


@if(auth()->user()->hasRole('super-admin'))


            <li class="nav-item {{$activePage == 'ownerIndex' ? 'active' : ''}} 
            {{$activePage == 'ownerCreate' ? 'active' : ''}}"
            data-item="own"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-users"></i>
                    <span class="nav-text"> Product Owners</span></a>
                <div class="triangle"></div>
            </li>
         
@endif


@if(auth()->user()->hasRole('super-admin'))
            <li class="nav-item {{$activePage == 'salereturnIndex' ? 'active' : ''}} 
            {{$activePage == 'salereturnCreate' ? 'active' : ''}}"
            data-item="sale"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-users"></i>
                    <span class="nav-text">Sale Return</span></a>
                <div class="triangle"></div>
            </li>
    @endif
   



@if(auth()->user()->hasRole('super-admin'))

            <li class="nav-item {{$activePage == 'purchasereturnIndex' ? 'active' : ''}} 
            {{$activePage == 'purchasereturnCreate' ? 'active' : ''}}"
            data-item="purchase"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-users"></i>
                    <span class="nav-text">Purchase Return</span></a>
                <div class="triangle"></div>
            </li>
        @endif



        


@if(auth()->user()->hasRole('super-admin'))

            <li class="nav-item {{$activePage == 'Reports' ? 'active' : ''}} 
            {{$activePage == 'purchasereturnCreate' ? 'active' : ''}}"
            data-item="reports"><a class="nav-item-hold" href="#">
                   <i class="nav-icon fa fa-file"></i>
                    <span class="nav-text">Reports</span></a>
                <div class="triangle"></div>
            </li>
        @endif









        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
{{--        <ul class="childNav" data-parent="dashboard">--}}
{{--            <li class="nav-item"><a href="dashboard1.html"><i class="nav-icon i-Clock-3"></i><span class="item-name">Version 1</span></a></li>--}}
{{--        </ul>--}}


        <ul class="childNav" data-parent="users">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show users'))
                <li class="nav-item {{$activePage == 'userIndex' ? 'active' : ''}}"><a href="{{route('user.index')}}"><i class="nav-icon i-Administrator"></i><span class="item-name">View All Users</span></a></li>
            @endif
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create users'))
                <li class="nav-item {{$activePage == 'userCreate' ? 'active' : ''}}"><a href="{{route('user.create')}}"><i class="nav-icon i-Add-User"></i><span class="item-name">Create User</span></a></li>
            @endif
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show roles'))
                <li class="nav-item {{$activePage == 'roleIndex' ? 'active' : ''}}"><a href="{{route('role.index')}}"><i class="nav-icon i-Add-User"></i><span class="item-name">View All Roles</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="categories">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show categories'))
            <li class="nav-item {{$activePage == 'categoryIndex' ? 'active' : ''}}"><a href="{{route('category.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">View All Product Category</span></a></li>
            @endif
                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create categories'))
                <li class="nav-item {{$activePage == 'categoryCreate' ? 'active' : ''}}"><a href="{{route('category.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Create Product Category</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="products">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show products'))
                <li class="nav-item {{$activePage == 'productIndex' ? 'active' : ''}}"><a href="{{route('product.index')}}"><i class="nav-icon fal fa-box-full"></i><span class="item-name">View All Products</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="products">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show colours'))
                <li class="nav-item {{$activePage == 'colourIndex' ? 'active' : ''}}"><a href="{{route('colour.index')}}"><i class="nav-icon fal fa-palette"></i><span class="item-name">View All Colours</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="products">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show sizes'))
            <li class="nav-item {{$activePage == 'sizeIndex' ? 'active' : ''}}"><a href="{{route('size.index')}}"><i class="nav-icon fad fa-expand-arrows"></i><span class="item-name">View All Sizes</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="products">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show batches'))
            <li class="nav-item {{$activePage == 'batchIndex' ? 'active' : ''}}"><a href="{{route('batch.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View All Batches</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="products">
          
                <li class="nav-item {{$activePage == 'productSalecenterIndex' ? 'active' : ''}}"><a href="{{route('product_salecenter.index')}}"><i class="nav-icon fal fa-box-full"></i><span class="item-name">View All Products For Sale Centers</span></a></li>
       
        </ul>


 <ul class="childNav" data-parent="salecenters">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show sale centers'))
            <li class="nav-item {{$activePage == 'saleCenterIndex' ? 'active' : ''}}"><a href="{{route('saleCenter.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show Sale Center</span></a></li>
            @endif
                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create categories'))
                <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('saleCenter.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Sale Center</span></a></li>
            @endif
        </ul>


        <ul class="childNav" data-parent="supplierss">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show suppliers'))
            <li class="nav-item {{$activePage == 'supplierIndex' ? 'active' : ''}}"><a href="{{route('supplier.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show Suppliers</span></a></li>
            @endif
                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create suppliers'))
                <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('supplier.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Suppliers</span></a></li>
            @endif
            
        
        </ul>


   <ul class="childNav" data-parent="delivery">
      
            <li class="nav-item {{$activePage == 'deliverychargesIndex' ? 'active' : ''}}"><a href="{{route('delivery_charges.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show Delivery Charges</span></a></li>
            
             
                <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('delivery_charges.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Delivery Charges</span></a></li>

                <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('standarddelivery_charges.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show Standard Delivery Charges</span></a></li>
                <!-- <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('standarddelivery_charges.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Standard Delivery Charges</span></a></li> -->
                <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('expressdelivery_charges.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show Express Delivery Charges</span></a></li>
                <!-- <li class="nav-item {{$activePage == 'saleCenterCreate' ? 'active' : ''}}"><a href="{{route('expressdelivery_charges.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Express Delivery Charges</span></a></li> -->
        </ul>










 <ul class="childNav" data-parent="res">
          
            <li class="nav-item {{$activePage == 'resellerIndex' ? 'active' : ''}}"><a href="{{route('reseller.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show All Resellers</span></a></li>
        
               
                <li class="nav-item {{$activePage == 'resellerCreate' ? 'active' : ''}}"><a href="{{route('reseller.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Reseller</span></a></li>
         
        </ul>

         <ul class="childNav" data-parent="res">
           
            <li class="nav-item {{$activePage == 'resellerIndex' ? 'active' : ''}}"><a href="{{route('reselleraccount')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name"> Resellers Accounts</span></a></li>
         
             
        </ul>






 <ul class="childNav" data-parent="custo">
          
            <li class="nav-item {{$activePage == 'customerIndex' ? 'active' : ''}}"><a href="{{route('customer.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show All Customers</span></a></li>
          
                <li class="nav-item {{$activePage == 'customerCreate' ? 'active' : ''}}"><a href="{{route('customer.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Customers</span></a></li>
       
        </ul>
        
 

  <ul class="childNav" data-parent="own">
         
            <li class="nav-item {{$activePage == 'ownerIndex' ? 'active' : ''}}"><a href="{{route('owner.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show All Product Owners</span></a></li>
          
              
                <li class="nav-item {{$activePage == 'ownerCreate' ? 'active' : ''}}"><a href="{{route('owner.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add  Owners</span></a></li>
       


              
                <li class="nav-item {{$activePage == 'ownerAssign' ? 'active' : ''}}"><a href="{{route('owner.assign')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Product Owners</span></a></li>
        
        </ul>


<ul class="childNav" data-parent="sale">
           
            <li class="nav-item {{$activePage == 'salereturnIndex' ? 'active' : ''}}"><a href="{{route('salereturn.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Show All Sale Return</span></a></li>
          
             
                <li class="nav-item {{$activePage == 'salereturnCreate' ? 'active' : ''}}"><a href="{{route('salereturn.create')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Sale Return</span></a></li>
          
        </ul>



<ul class="childNav" data-parent="purchase">
         
            <li class="nav-item {{$activePage == 'purchasereturnIndex' ? 'active' : ''}}"><a href="{{url('purchasereturn')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add New Purchase Return</span></a></li>
        
                <li class="nav-item {{$activePage == 'purchasereturnCreate' ? 'active' : ''}}"><a href="{{url('purchasereturnindex')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">View All Purchase Return</span></a></li>
           
        </ul>












        <ul class="childNav" data-parent="products">
            
                <li class="nav-item {{$activePage == 'productOwnerIndex' ? 'active' : ''}}"><a href="{{ route('product_owner.index') }}"><i class="nav-icon fal fa-box-full"></i><span class="item-name">View All Products For Owners</span></a></li>
         
        </ul>

        <ul class="childNav" data-parent="riders_and_couriers">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show riders'))
                <li class="nav-item {{$activePage == 'riderIndex' ? 'active' : ''}}"><a href="{{route('rider.index')}}"><i class="nav-icon fas fa-biking"></i><span class="item-name">View Riders</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="riders_and_couriers">
          
                <li class="nav-item {{$activePage == 'courierIndex' ? 'active' : ''}}"><a href="{{route('courier.index')}}"><i class="nav-icon fas fa-shipping-fast"></i><span class="item-name">View Couriers</span></a></li>
         
        </ul>










        <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show logos'))
            <li class="nav-item {{$activePage == 'logoIndex' ? 'active' : ''}}"><a href="{{route('logo.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View Logos</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show ape'))
            <li class="nav-item {{$activePage == 'apeIndex' ? 'active' : ''}}"><a href="{{route('ape.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View Address - Phone - Email</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show sliders'))
            <li class="nav-item {{$activePage == 'sliderIndex' ? 'active' : ''}}"><a href="{{route('slider.index')}}"><i class="nav-icon fas fa-sliders-h"></i><span class="item-name">View Sliders</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show banners'))
            <li class="nav-item {{$activePage == 'bannerIndex' ? 'active' : ''}}"><a href="{{route('banner.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View Banners</span></a></li>
            @endif
        </ul>

         <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show banners'))
            <li class="nav-item {{$activePage == 'bannerIndex' ? 'active' : ''}}"><a href="menubannerindex"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View Menu Banners</span></a></li>        
            @endif
        </ul>

        <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show services'))
            <li class="nav-item {{$activePage == 'serviceIndex' ? 'active' : ''}}"><a href="{{route('service.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View Services</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="homesettings">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show floors'))
            <li class="nav-item {{$activePage == 'floorIndex' ? 'active' : ''}}"><a href="{{route('floor.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View Floors</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="homesettings">
           
                <li class="nav-item {{$activePage == 'aboutIndex' ? 'active' : ''}}"><a href="{{route('aboutus.index')}}"><i class="nav-icon fal fa-layer-group"></i><span class="item-name">View About us Content</span></a></li>
         
        </ul>

        <ul class="childNav" data-parent="discounts">
            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('show deals'))
                <li class="nav-item {{$activePage == 'dealIndex' ? 'active' : ''}}"><a href="{{route('deal.index')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">View Deals</span></a></li>
            @endif
        </ul>

        <ul class="childNav" data-parent="discounts">
           
                <li class="nav-item {{$activePage == 'offerIndex' ? 'active' : ''}}"><a href="{{route('offer.index')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">View Offers</span></a></li>
            
        </ul>

        <ul class="childNav" data-parent="discounts">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('general_discount.index')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">View General Discounts</span></a></li>
         
        </ul>










  <ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('uploadreport')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Upload Report</span></a></li>
         
        </ul>


<ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('purchaseorder_report')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Purchase Report</span></a></li>
         
        </ul>



<ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('inventory_report')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Inventory Report</span></a></li>
         
        </ul>


        <ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('orderreport')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Order/Sale Report</span></a></li>
         
        </ul>


         <ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('purchasereturn_Report')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Purchase-Return Report</span></a></li>
         
        </ul>

         <ul class="childNav" data-parent="reports">
      
                <li class="nav-item {{$activePage == 'generaldiscountIndex' ? 'active' : ''}}"><a href="{{route('salereturnreport')}}"><i class="nav-icon fas fa-badge-percent"></i><span class="item-name">Sales-Return Report</span></a></li>
         
        </ul>







        <ul class="childNav" data-parent="accounts">
         
                <li class="nav-item"><a href="{{route('assets.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Assets</span></a></li>
        

         
                <li class="nav-item"><a href="{{route('liabilities.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Liabilities</span></a></li>
  
           
                <li class="nav-item"><a href="{{route('equity.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Equity</span></a></li>
       

          
                <li class="nav-item"><a href="{{route('income.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Income</span></a></li>
           

         
                <li class="nav-item"><a href="{{route('expenses.index')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Expenses</span></a></li>
     

                           <li class="nav-item"><a href="{{url('generate_voucher')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Voucher</span></a></li>
         


          
                <li class="nav-item"><a href="{{url('addsubheader')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Categories</span></a></li>
           

          
                <li class="nav-item"><a href="{{url('addthirdsubheader')}}"><i class="nav-icon fa fa-bars"></i><span class="item-name">Add Sub-Categories</span></a></li>
          

        </ul>

    </div>
    <div class="sidebar-overlay"></div>
</div>
