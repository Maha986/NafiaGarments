@extends('rider.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'riderorderIndex', $title = 'Edit Order - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Orders</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Order</div>
                        <form class="forms-sample" method="POST" action="{{ route('rider_order.update2',$order) }}">
                            @csrf()
                            @method('PUT')
                            <div class="row">
                                @php $rider = \App\Models\riderproductorder::where('id',$order)->first() @endphp
                                <div class="col-md-4 form-group mb-6">
                                   <label>Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        @if($rider->status == 1)
                                            <option value="1" {{ $rider->status == 1 ? 'selected':'' }}> {{ 'Pending' }} </option>
                                            <option value="2"> {{ 'Process' }} </option>
                                            <option value="3"> {{ 'Ready To Dispatch' }} </option>
                                            <option value="4"> {{ 'Dispatched' }} </option>
                                        @elseif($rider->status == 2)
                                            <option value="2" {{ $rider->status == 2 ? 'selected':'' }}> {{ 'Process' }} </option>
                                            <option value="1"> {{ 'Pending' }} </option>
                                            <option value="3"> {{ 'Ready To Dispatch' }} </option>
                                            <option value="4"> {{ 'Dispatched' }} </option>
                                        @elseif($rider->status == 3)
                                            <option value="3" {{ $rider->status == 3 ? 'selected':'' }}> {{ 'Ready To Dispatch' }} </option>
                                            <option value="1"> {{ 'Pending' }} </option>
                                            <option value="2"> {{ 'Process' }} </option>
                                            <option value="4"> {{ 'Dispatched' }} </option>
                                        @elseif($rider->status == 4)
                                            <option value="4" {{ $rider->status == 4 ? 'selected':'' }}> {{ 'Dispatched' }} </option>
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
