@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnCreate', $title = 'Edit Sale return - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Sale Return</h1>

           
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Sale Return</div>
                        <form class="forms-sample" method="POST" action="{{route('salereturn.update',$salereturn)}}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                             <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnName">Order Name</label>
                                    <input type="text"  name="ordername" class="form-control form-control @error('ordername') is-invalid @enderror" id="saleName" type="text" placeholder="Enter your order name" value="{{$salereturn->order_number}}" autocomplete="ordername" autofocus />
                                    @error('ordername')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnProduct_id"> Product_Id</label>
                                    <input type="text"  name="productid" class="form-control form-control @error('productid') is-invalid @enderror" id="salereturnProduct_id" placeholder="Enter Product_Id" value="{{$salereturn->product_id}}" autocomplete="productid" autofocus/>
                                    @error('productid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnReason">Reason</label>

                                    <input type="text"  name="reason" class="form-control form-control @error('reason') is-invalid @enderror" id="salereturnReason" placeholder="Enter Sale Center Adress" value="{{$salereturn->reason}}" autocomplete="reason" autofocus/>

                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

 <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Amount</label>

                                    <input type="text"  name="amount" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="{{$salereturn->amount}}" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                

                                



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
