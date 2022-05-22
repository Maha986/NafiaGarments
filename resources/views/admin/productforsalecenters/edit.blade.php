@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'ownerIndex', $title = 'Create Owner - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Edit Sale-Center</h1>
        </div>

        @php
       $p_f_sc = App\Models\ProductForSaleCenter::where('id',$id)->first();
     
        $salecenters = App\Models\SaleCenter::all();
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Update Product Sale-Center</div>
                        <form class="forms-sample" method="POST" action="{{route('productsalecenter_store_edit')}}">
                            @csrf()




                            <div class="row">












  <div class="col-md-6 form-group mb-3">
                                    <label for="salecenter_id">Sale Center</label>
                                    <select class="form-control @error('salecenter_id') is-invalid @enderror" id="salecenter_id" name="salecenter_id">
                                        <option selected disabled> Select Sale Centers </option>
                                      @foreach($salecenters as $salecenter)
            <option name ="salecenter_id"value="{{$salecenter->id}}"> {{$salecenter->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('salecenter_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>










                                <div class="col-md-6 form-group mb-3">
                                    <label for="quantity">Product Quantity</label>
                                    <input type="number"  name="quantity"value="{{$p_f_sc->quantity}}" class="form-control form-control @error('quantity') is-invalid @enderror" id="quantity " type="number" placeholder="Enter Product Quantity" value="" autocomplete="quantity" min="0" autofocus />
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                <div class="col-md-6 form-group mb-3">
                                    <label for="purchasereturn amount">Price Per Piece</label>
                                    <input type="number"  name="ppp" class="form-control form-control " id="purchasereturn" placeholder="Enter Amount" value="{{$p_f_sc->PricePerPiece}}" autocomplete="purchase return amount" autofocus/>
                                   
                                </div>



                                <div class="col-md-6 form-group mb-3">
                                    <label for="inventory_category">Inventory</label>
                                    <input type="number"  name="inventory_category" value="{{$p_f_sc->inventroy}}"class="form-control form-control @error('inventory_category') is-invalid @enderror" id="inventory_category " type="number" placeholder="Enter inventory_category" value="" autocomplete="inventory" min="0" autofocus />
                                    @error('inventory_category')
                                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



<input type="hidden" value="{{$id}}" name="productsalecenter_id">
                               

                             
                              
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
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
