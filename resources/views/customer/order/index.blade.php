@extends('customer.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'orderhistoryIndex', $title = 'Customers Reviews - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Orders History</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Orders History</h4>
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Product</th>
                                    <th>Payment Type</th>
                                    <th>Discount</th>
                                    <th>Sub Total Amount</th>
                                    <th>Delivery Charges</th>
                                    <th>Total Amount</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_number}}</td>
                                        <td>{{$order->quantity}}</td>
                                        @php $size = \App\Models\Size::where('id',$order->size_id)->first(); @endphp
                                        <td>{{$size->sizeName}}</td>
                                        @php $color = \App\Models\Colour::where('id',$order->colour_id)->first(); @endphp
                                        <td>{{$color->colourCode}}</td>
                                        @php $product= \App\Models\ColourImageProductSize::where('product_id', $order->product_id)->where('colour_id',$order->colour_id)->where('size_id',$order->size_id)->first(); @endphp
                                        <td><div class="col-md-3 form-group mb-3">
                                                <div>
                                                    <img src="{{ asset('storage/images/productImages/'.$product->image) }}" alt="Image not found" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$order->payment_type}}</td>
                                        <td>{{$order->discount}}</td>
                                        <td>{{$order->sub_total_amount}}</td>
                                        <td>{{$order->delivery_charges}}</td>
                                        <td>{{$order->total_amount}}</td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Product</th>
                                    <th>Payment Type</th>
                                    <th>Discount</th>
                                    <th>Sub Total Amount</th>
                                    <th>Delivery Charges</th>
                                    <th>Total Amount</th>
                                    <th>Created At</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('page_css')
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
