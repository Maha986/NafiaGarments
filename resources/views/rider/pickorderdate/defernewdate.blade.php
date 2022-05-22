 @extends('rider.layouts.master')
@section('content')
<input type="hidden" value="{{$activePage = 'riderorderIndex', $title = 'Order - Nafia Garments'}}">

 <form method="POST" action="{{ route('defernewdate',$order) }}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                
@php
$date = App\Models\riderproductorder::where('id',$order)->first();
@endphp
                                <div class="col-md-12 form-group mb-3">
                                    <label for="exampleInputEmail2">Previous Delivey Date </label>

                                    <p>{{$date->date}}</p>
                                   
                                </div>
<div class="col-md-12 form-group mb-3">
                                    <label for="exampleInputEmail2">New Date of delivery </label>
                                    <input type="date"  name="date" class="form-control form-control-rounded @error('date') is-invalid @enderror" id="exampleInputEmail2"  value="" />
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Change Date</button>
                                </div>








                            </div>
                        </form>

 @endsection