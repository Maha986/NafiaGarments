@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'saleCenterCreate', $title = 'Edit Sale Center - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Sale Centers</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Sale Center</div>
                        <form class="forms-sample" method="POST" action="{{route('salecenter.update',$salecenter)}}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterName">Sale Center Name</label>
                                    <input type="text"  name="name" class="form-control form-control @error('name') is-invalid @enderror" id="saleName" type="text" placeholder="Enter your sale center name" value="{{ $salecenter->name }}" autocomplete="name" autofocus />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterOwnerName">Sale Center Owner Name</label>
                                    <input type="text"  name="owner_name" class="form-control form-control @error('owner_name') is-invalid @enderror" id="saleCenterOwnerName" placeholder="Enter owner name" value="{{ $salecenter->owner_name }}" autocomplete="owner_name" autofocus/>
                                    @error('owner_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterAddress">Address</label>

                                    <input type="text"  name="address" class="form-control form-control @error('address') is-invalid @enderror" id="saleCenterAddress" placeholder="Enter Sale Center Adress" value="{{ $salecenter->address }}" autocomplete="address" autofocus/>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterCity">City</label>
                                    <input type="text"  name="city" class="form-control form-control @error('city') is-invalid @enderror" id="saleCenterCity" placeholder="Enter city name" value="{{ $salecenter->city }}" autocomplete="city" autofocus/>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterArea">Area</label>
                                    <input type="text"  name="area" class="form-control form-control @error('area') is-invalid @enderror" id="saleCenterArea" placeholder="Enter area name" value="{{ $salecenter->area }}" autocomplete="area" autofocus/>
                                    @error('area')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterContact">Contact Number</label>
                                    <input type="text"  name="contact" class="form-control form-control @error('contact') is-invalid @enderror" id="saleCenterContact" placeholder="Enter contact number" value="{{ $salecenter->contact }}" autocomplete="contact" autofocus/>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterCNICNO">CNIC Number</label>
                                    <input type="text"  name="cnic_no" class="form-control form-control @error('cnic_no') is-invalid @enderror" id="saleCenterCNICNO" placeholder="Enter CNIC Number" value="{{ $salecenter->cnic_no }}" autocomplete="cnic_no" autofocus/>
                                    @error('cnic_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="saleCenterCnicFront">CNIC Front Image</label>
                                    <input type="file"  name="cnic_front" class="form-control form-control @error('cnic_front') is-invalid @enderror" id="saleCenterCnicFront" value="{{ old('cnic_front') }}" autocomplete="cnic_front" autofocus/>
                                    @error('cnic_front')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <img src="{{ asset('storage/images/SaleCenterImages/'.$salecenter->cnic_front) }}" height="100px" width="200px">
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="saleCenterCnicBack">CNIC Back Image</label>
                                    <input type="file"  name="cnic_back" class="form-control form-control @error('cnic_back') is-invalid @enderror" id="saleCenterCnicBack" value="{{ old('cnic_back') }}" autocomplete="cnic_back" autofocus/>
                                    @error('cnic_back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <img src="{{ asset('storage/images/SaleCenterImages/'.$salecenter->cnic_back) }}" height="100px" width="200px">
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterMessagingServiceName">Messaging Service Name</label>
                                    <input type="text"  name="messaging_service_name" class="form-control form-control @error('messaging_service_name') is-invalid @enderror" id="saleCenterMessagingServiceName" type="text" placeholder="Enter messaging service name" value="{{ $salecenter->messaging_service_name }}" autocomplete="messaging_service_name" autofocus />
                                    @error('messaging_service_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterMessagingServiceNo">Messaging Service Number</label>
                                    <input type="text"  name="messaging_service_no" class="form-control form-control @error('messaging_service_no') is-invalid @enderror" id="saleCenterMessagingServiceNo" type="text" placeholder="Enter messaging service number" value="{{ $salecenter->messaging_service_no }}" autocomplete="messaging_service_no" autofocus />
                                    @error('messaging_service_no')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterEmail">Email</label>
                                    <input type="email"  name="email" class="form-control form-control @error('email') is-invalid @enderror" id="saleCenterEmail    " type="text" placeholder="Enter email" value="{{ $salecenter->email }}" autocomplete="email" autofocus />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Password</label>
                                    <input type="password"  name="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" id="exampleInputEmail2"  placeholder="Enter password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterSocialMediaName_1">Social Media Name One</label>
                                    <input type="text"  name="social_media_name_1" class="form-control form-control @error('social_media_name_1') is-invalid @enderror" id="saleCenterSocialMediaName_1" type="text" placeholder="Enter Social media name one" value="{{ $salecenter->social_media_name_1 }}" autocomplete="social_media_name_1" autofocus />
                                    @error('social_media_name_1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterLink_1">Social Media Link One</label>
                                    <input type="text"  name="link_1" class="form-control form-control @error('link_1') is-invalid @enderror" id="saleCenterLink_1" type="text" placeholder="Enter Social media Link one" value="{{ $salecenter->link_1 }}" autocomplete="link_1" autofocus />
                                    @error('link_1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterSocialMediaName_2">Social Media Name Two</label>
                                    <input type="text"  name="social_media_name_2" class="form-control form-control @error('social_media_name_2') is-invalid @enderror" id="saleCenterSocialMediaName_2" type="text" placeholder="Enter Social media name two" value="{{ $salecenter->social_media_name_2 }}" autocomplete="social_media_name_2" autofocus />
                                    @error('social_media_name_2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterLink_2">Social Media Link Two</label>
                                    <input type="text"  name="link_2" class="form-control form-control @error('link_2') is-invalid @enderror" id="saleCenterLink_2" type="text" placeholder="Enter Social media Link Two" value="{{ $salecenter->link_2 }}" autocomplete="link_2" autofocus />
                                    @error('link_2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterSocialMediaName_3">Social Media Name Three</label>
                                    <input type="text"  name="social_media_name_3" class="form-control form-control @error('social_media_name_3') is-invalid @enderror" id="saleCenterSocialMediaName_3" type="text" placeholder="Enter Social media name three" value="{{ $salecenter->social_media_name_3 }}" autocomplete="social_media_name_3" autofocus />
                                    @error('social_media_name_3')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterLink_3">Social Media Link Three</label>
                                    <input type="text"  name="link_3" class="form-control form-control @error('link_3') is-invalid @enderror" id="saleCenterLink_3" type="text" placeholder="Enter Social media Link Three" value="{{ $salecenter->link_3 }}" autocomplete="link_3" autofocus />
                                    @error('link_3')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterBankAccountTitle">Bank Account Title</label>
                                    <input type="text"  name="bank_account_title" class="form-control form-control @error('bank_account_title') is-invalid @enderror" id="saleCenterBankAccountTitle" type="text" placeholder="Enter Bank Account Title" value="{{ $salecenter->bank_account_title }}" autocomplete="bank_account_title" autofocus />
                                    @error('bank_account_title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterBankName">Bank Name</label>
                                    <input type="text"  name="bank_name" class="form-control form-control @error('bank_name') is-invalid @enderror" id="saleCenterBankName" type="text" placeholder="Enter Bank Name" value="{{ $salecenter->bank_name }}" autocomplete="bank_name" autofocus />
                                    @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerBankBranch">Bank Branch</label>
                                    <input type="text"  name="bank_branch" class="form-control form-control @error('bank_branch') is-invalid @enderror" id="resellerBankBranch" type="text" placeholder="Enter Bank Branch" value="{{ $salecenter->bank_branch }}" autocomplete="bank_branch" autofocus />
                                    @error('bank_branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterAccountOrIbanNo">Account/IBAN Number</label>
                                    <input type="text"  name="account_or_iban_no" class="form-control form-control @error('account_or_iban_no') is-invalid @enderror" id="saleCenterAccountOrIbanNo" type="text" placeholder="Enter Account/IBAN Number" value="{{ $salecenter->account_or_iban_no}}" autocomplete="account_or_iban_no" autofocus />
                                    @error('account_or_iban_no')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterMoneyTransferNo">Money Transfer Number</label>
                                    <input type="text"  name="money_transfer_no" class="form-control form-control @error('money_transfer_no') is-invalid @enderror" id="saleCenterMoneyTransferNo" type="text" placeholder="Enter Money Transfer Number" value="{{ $salecenter->money_transfer_no }}" autocomplete="money_transfer_no" autofocus />
                                    @error('money_transfer_no')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="saleCenterMoneyTransferService">Money Transfer Service</label>
                                    <input type="text"  name="money_transfer_service" class="form-control form-control @error('money_transfer_service') is-invalid @enderror" id="saleCenterMoneyTransferService" type="text" placeholder="Enter Money Transfer Service" value="{{ $salecenter->money_transfer_service }}" autocomplete="money_transfer_service" autofocus />
                                    @error('money_transfer_service')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStatus">Select Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                        <option selected disabled> Select Status </option>
                                        <option value="1" {{ $salecenter->status == '1' ? 'Selected':'' }}> Active </option>
                                        <option value="0" {{ $salecenter->status == '0' ? 'Selected':'' }}> In Active </option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
