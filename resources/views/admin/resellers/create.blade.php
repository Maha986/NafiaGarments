@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'resellerIndex', $title = 'Create Reseller - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Resellers</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Reseller</div>
                        <form class="forms-sample" method="POST" action="{{ route('reseller.store') }}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerName">Reseller Name</label>
                                    <input type="text"  name="name" class="form-control form-control @error('name') is-invalid @enderror" id="resellerName" type="text" placeholder="Enter your Reseller name" value="{{ old('name') }}" autocomplete="name" autofocus />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerEmail">Email</label>
                                    <input type="email"  name="email" class="form-control form-control @error('email') is-invalid @enderror" id="resellerEmail" type="text" placeholder="Enter email" value="{{ old('email') }}" autocomplete="email" autofocus />
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
                                    <label for="resellerCity">City</label>
                                    <input type="text"  name="city" class="form-control form-control @error('city') is-invalid @enderror" id="resellerCity" placeholder="Enter city name" value="{{ old('city') }}" autocomplete="city" autofocus/>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerArea">Area</label>
                                    <input type="text"  name="area" class="form-control form-control @error('area') is-invalid @enderror" id="resellerArea" placeholder="Enter area name" value="{{ old('area') }}" autocomplete="area" autofocus/>
                                    @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerAddress">Address</label>
                                    <input type="text"  name="address" class="form-control form-control @error('address') is-invalid @enderror" id="resellerAddress" placeholder="Enter Reseller Address" value="{{ old('address') }}" autocomplete="address" autofocus/>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerContact">Contact Number</label>
                                    <input type="text"  name="contact" class="form-control form-control @error('contact') is-invalid @enderror" id="resellerContact" placeholder="Enter contact number" value="{{ old('contact') }}" autocomplete="contact" autofocus/>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerMessagingServiceNo">Messaging Service Number</label>
                                    <input type="text"  name="messaging_service_no" class="form-control form-control @error('messaging_service_no') is-invalid @enderror" id="resellerMessagingServiceNo" type="text" placeholder="Enter messaging service number" value="{{ old('messaging_service_no') }}" autocomplete="messaging_service_no" autofocus />
                                    @error('messaging_service_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerMessagingServiceName">Messaging Service Name</label>
                                    <input type="text"  name="messaging_service_name" class="form-control form-control @error('messaging_service_name') is-invalid @enderror" id="resellerMessagingServiceName" type="text" placeholder="Enter messaging service name" value="{{ old('messaging_service_name') }}" autocomplete="messaging_service_name" autofocus />
                                    @error('messaging_service_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerCNICNO">CNIC Number</label>
                                    <input type="text"  name="cnic_no" class="form-control form-control @error('cnic_no') is-invalid @enderror" id="resellerCNICNO" placeholder="Enter CNIC Number" value="{{ old('cnic_no') }}" autocomplete="cnic_no" autofocus/>
                                    @error('cnic_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerCnicFront">CNIC Front Image</label>
                                    <input type="file"  name="cnic_front" class="form-control form-control @error('cnic_front') is-invalid @enderror" id="resellerCnicFront" value="{{ old('cnic_front') }}" autocomplete="cnic_front" autofocus/>
                                    @error('cnic_front')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerCnicBack">CNIC Back Image</label>
                                    <input type="file"  name="cnic_back" class="form-control form-control @error('cnic_back') is-invalid @enderror" id="resellerCnicBack" value="{{ old('cnic_back') }}" autocomplete="cnic_back" autofocus/>
                                    @error('cnic_back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerSocialMediaName_1">Social Media Name One</label>
                                    <input type="text"  name="social_media_name_1" class="form-control form-control @error('social_media_name_1') is-invalid @enderror" id="resellerSocialMediaName_1" type="text" placeholder="Enter Social media name one" value="{{ old('social_media_name_1') }}" autocomplete="social_media_name_1" autofocus />
                                    @error('social_media_name_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerLink_1">Social Media Link One</label>
                                    <input type="text"  name="link_1" class="form-control form-control @error('link_1') is-invalid @enderror" id="resellerLink_1" type="text" placeholder="Enter Social media Link one" value="{{ old('link_1') }}" autocomplete="link_1" autofocus />
                                    @error('link_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerSocialMediaName_2">Social Media Name Two</label>
                                    <input type="text"  name="social_media_name_2" class="form-control form-control @error('social_media_name_2') is-invalid @enderror" id="resellerSocialMediaName_2" type="text" placeholder="Enter Social media name two" value="{{ old('social_media_name_2') }}" autocomplete="social_media_name_2" autofocus />
                                    @error('social_media_name_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerLink_2">Social Media Link Two</label>
                                    <input type="text"  name="link_2" class="form-control form-control @error('link_2') is-invalid @enderror" id="resellerLink_2" type="text" placeholder="Enter Social media Link Two" value="{{ old('link_2') }}" autocomplete="link_2" autofocus />
                                    @error('link_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerBankAccountTitle">Bank Account Title</label>
                                    <input type="text"  name="bank_account_title" class="form-control form-control @error('bank_account_title') is-invalid @enderror" id="resellerBankAccountTitle" type="text" placeholder="Enter Bank Account Title" value="{{ old('bank_account_title') }}" autocomplete="bank_account_title" autofocus />
                                    @error('bank_account_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerBankName">Bank Name</label>
                                    <input type="text"  name="bank_name" class="form-control form-control @error('bank_name') is-invalid @enderror" id="resellerBankName" type="text" placeholder="Enter Bank Name" value="{{ old('bank_name') }}" autocomplete="bank_name" autofocus />
                                    @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerBankBranch">Bank Branch</label>
                                    <input type="text"  name="bank_branch" class="form-control form-control @error('bank_branch') is-invalid @enderror" id="resellerBankBranch" type="text" placeholder="Enter Bank Branch" value="{{ old('bank_branch') }}" autocomplete="bank_branch" autofocus />
                                    @error('bank_branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerAccountOrIbanNo">Account/IBAN Number</label>
                                    <input type="text"  name="account_or_iban_no" class="form-control form-control @error('account_or_iban_no') is-invalid @enderror" id="resellerAccountOrIbanNo" type="text" placeholder="Enter Account/IBAN Number" value="{{ old('account_or_iban_no') }}" autocomplete="account_or_iban_no" autofocus />
                                    @error('account_or_iban_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerMoneyTransferNo">Money Transfer Number</label>
                                    <input type="text"  name="money_transfer_no" class="form-control form-control @error('money_transfer_no') is-invalid @enderror" id="resellerMoneyTransferNo" type="text" placeholder="Enter Money Transfer Number" value="{{ old('money_transfer_no') }}" autocomplete="money_transfer_no" autofocus />
                                    @error('money_transfer_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerMoneyTransferService">Money Transfer Service</label>
                                    <input type="text"  name="money_transfer_service" class="form-control form-control @error('money_transfer_service') is-invalid @enderror" id="resellerMoneyTransferService" type="text" placeholder="Enter Money Transfer Service" value="{{ old('money_transfer_service') }}" autocomplete="money_transfer_service" autofocus />
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
                                        <option {{ old('status') == 1 ? 'selected':'' }} value="1"> Active </option>
                                        <option {{ old('status') == 0 ? 'selected':'' }} value="0"> In Active </option>
                                    </select>
                                    @error('status')
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
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
