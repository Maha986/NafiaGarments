@extends('salecenter.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salecenterorderIndex', $title = 'Edit Order - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Orders</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Orders</div>
                        @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                        @if(Session::get('order_id'))
<div class="row">
@foreach(Session::get('order_id') as $p)
<div class="col-4">
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">Product:{{ $p->product_id }}, Size:{{ $p->size_id }}, Color:{{ $p->color_id }} not available on your salecenter</p>
</div>                
@endforeach
@endif

</div>

                      
                        <form class="forms-sample" method="POST" action="{{ route('sale_center_order.update',$order) }}">
                            @csrf()
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4 form-group mb-6">
                                    <label>Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        @if($order->status == 1)
                                            <option value="1" {{ $order->status == 1 ? 'selected':'' }}> {{ 'Pending' }} </option>
                                            <option value="2"> {{ 'Process' }} </option>
                                            <option value="3"> {{ 'Ready To Dispatch' }} </option>
                                            <option value="4"> {{ 'Dispatched' }} </option>
                                        @elseif($order->status == 2)
                                            <option value="2" {{ $order->status == 2 ? 'selected':'' }}> {{ 'Process' }} </option>
                                            <option value="1"> {{ 'Pending' }} </option>
                                            <option value="3"> {{ 'Ready To Dispatch' }} </option>
                                            <option value="4"> {{ 'Dispatched' }} </option>
                                        @elseif($order->status == 3)
                                            <option value="3" {{ $order->status == 3 ? 'selected':'' }}> {{ 'Ready To Dispatch' }} </option>
                                            <option value="1"> {{ 'Pending' }} </option>
                                            <option value="2"> {{ 'Process' }} </option>
                                            <option value="4"> {{ 'Dispatched' }} </option>
                                        @elseif($order->status == 4)
                                            <option value="4" {{ $order->status == 4 ? 'selected':'' }}> {{ 'Dispatched' }} </option>
                                            <option value="1"> {{ 'Pending' }} </option>
                                            <option value="2"> {{ 'Process' }} </option>
                                            <option value="3"> {{ 'Ready To Dispatch' }} </option>
                                        @endif
                                    </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="margin-left:25%;">Update</button>
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
