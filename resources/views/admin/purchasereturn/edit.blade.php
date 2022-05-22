@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = '$purchasereturnCreate', $title = 'Edit purchase return - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Purchase Return</h1>

           
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Purchase Return</div>
                        <form class="forms-sample" method="POST" action="{{route('purchasereturn.update',$purchasereturn)}}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                             <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="purchasereturnName">Product Quantity</label>
                                    <input type="number"  name="productquantity" class="form-control form-control @error('Product Quantity') is-invalid @enderror" id="saleName" type="number" placeholder="Enter your Product Quantity" value="{{$purchasereturn->product_quantity}}" max="{{$purchasereturn->product_quantity}}" min="1" autocomplete="productquantity" autofocus />
                                    @error('Product Quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                

                                <div class="col-md-6 form-group mb-3">
                                    <label for="purchasereturn amount"> Amount</label>
                                    <input type="number"  name="amountt" class="form-control form-control @error('purchase return amount') is-invalid @enderror" id="purchasereturn" placeholder="Enter Amount" value="{{$purchasereturn->amount}}" autocomplete="purchase return amount" autofocus/>
                                    @error('purchase return amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                 
                                   
                                    <input type="hidden"  name="p_id" value="{{$purchasereturn->product}}">
                                  

                               

                           

                                

                                



                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div>
@endsection

@section('page_css')
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
