@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = '', $title = 'Sale Center - Nafia Garments'}}">
     @php $salecenter = \App\Models\ProductForSaleCenter::where('product_id', $id)->get(); 
     @endphp

    <div class="main-content">
        <div class="breadcrumb">
            <h1>SaleCenter</h1> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Reassign Sale-Center</div>
                        <form class="forms-sample" method="POST" action="{{ route('editsalecenterorder') }}" enctype="multipart/form-data">
                            @csrf()
                             <select class="form-control" name="salecenterid">
                     <option selected disabled> Select SaleCenter </option>

                  @foreach($salecenter as $center)

                  @php $salecentername = \App\Models\SaleCenter::where('id', $center->salecenter_id); @endphp

                 <option value="{{$center->salecenter_id}}">{{$center->salecenter_id}}</option>
    
                  @endforeach

                                                                  
                                                             </select>
                                                             
                                                          
                                                             
                                                             
                            </div>
                            
                            <input type="hidden" name="salecenterorderid" value="{{$name2}}" />
                            
                            <div class="form-group" style="margin-left:1%;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div>
@endsection
@section('page_css')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection

