@extends('admin.layouts.master')

@section('content')


    <input type="hidden" value="{{$activePage = 'riderinfoIndex', $title = 'Rider Info - Nafia Garments'}}">

                             @if (Session::get('message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('message') }}</h5>
  @endif
    <div class="row">
                                
<div class="col-md-6 form-group mb-3">
<label for="riderName">Cash Payable</label>
<h3><b>{{$wallet->cash_payable}}</b></h3>
</div>

 <form class="forms-sample" method="POST" action="{{ route('riderwalletedit_post',$wallet->id) }}" enctype="multipart/form-data">
                            @csrf()

<div class="col-md-6 form-group mb-3">
                               <label for="riderName">Cash Recievable</label>
                              <input type="number"  name="recieve" class="form-control form-control @error('recieve') is-invalid @enderror" id="recieve" type="text" placeholder="Enter your recieve amount" value="" autocomplete="recieve" autofocus />
                                    @error('recieve')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                      </form>

                            </div>


 @endsection