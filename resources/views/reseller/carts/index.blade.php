@extends('reseller.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'cartIndex', $title = 'Reseller Cart - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View Cart</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Cart</h4>

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                     <th>SubTotal</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $carousel_boolen = true @endphp
                                @php $carousel_count_boolen = true @endphp
                                @php $carousel_count_for_controls = 1 @endphp
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->id }}

                                        @php $product = \App\Models\Product::where('id',$cart->product_id)->first() @endphp

                                        <td> {{ $product->name }} </td>

                                        @php $product_cips = \App\Models\ColourImageProductSize::where('product_id',$product->id)
                                                    ->where('colour_id',$cart->colour_id)
                                                    ->where('size_id',$cart->size_id)
                                                    ->first()
                                        @endphp

                                        <td>
                                            @php $colour =  \App\Models\Colour::where('id',$product_cips->colour_id)->first() @endphp

                                            <div style="background-color: {{ $colour->colourCode }}; width:50px; height: 50px; font-size: 0;"></div>
                                        </td>

                                        <td>
                                            @php $size =  \App\Models\Size::where('id',$product_cips->size_id)->first() @endphp

                                            {{ $size->sizeName }}
                                        </td>

                                        <td> {{ $cart->quantity }} </td>
                                            <td> {{ $cart->sub_total }} </td>

                                        <td>
@php $productss = \App\Models\ColourImageProductSize::where('colour_id',$colour->id)->where('size_id',$product_cips->size_id)->where('product_id',$cart->product_id)->first(); @endphp

                                          

                             <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/productImages/'. $productss->image) }}" alt="cnic image not found" />
                </div>
        
                                        </td>
                                        <td>
                                            <a href="{{route('reseller_cart.destroy',$cart)}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                    class="nav-icon i-Close-Window font-weight-bold"></i></a>
                                        </td>
                                    </tr>
                                    @php $carousel_count_for_controls++; @endphp
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="text-center">
                                        <a href="{{route('reseller.checkout')}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                                <br> <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('page_css')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>

    <script>
        $(function(){$('.carousel').carousel();});
    </script>
@endsection
