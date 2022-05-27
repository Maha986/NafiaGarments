@extends('admin.layouts.master')

@section('content')


    <input type="hidden" value="{{$activePage = 'resellerinfoIndex', $title = 'Rider Info - Nafia Garments'}}">

    <div class="row">
                                
<div class="col-md-6 form-group mb-3">
<label for="riderName">Cash Payable</label>
<h3><b>{{$wallet->reseller_commission_payable}}</b></h3>
</div>

 <form class="forms-sample" method="POST" action="{{ route('resellerwalletedit_post',$wallet->id) }}" enctype="multipart/form-data">
                            @csrf()

<div class="col-md-6 form-group mb-3">
                               <label for="riderName">Cash Recievable</label>
                              <input type="number"  name="recieve" class="form-control form-control @error('recieve') is-invalid @enderror" id="recieve" type="text" placeholder="Enter your recieve amount" value="{{$wallet->reseller_commission_recieved}}" autocomplete="recieve" autofocus />
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