 @extends('rider.layouts.master')
@section('content')
<input type="hidden" value="{{$activePage = 'riderorderIndex', $title = 'Order - Nafia Garments'}}">

 <form method="POST" action="{{route('checkdate')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
<div class="col-md-12 form-group mb-3">
                                    <label for="exampleInputEmail2">Date of delivery </label>
                                    <input type="date"  name="date" class="form-control form-control-rounded @error('date') is-invalid @enderror" id="exampleInputEmail2"  value="" />
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </div>








                            </div>
                        </form>

 @endsection