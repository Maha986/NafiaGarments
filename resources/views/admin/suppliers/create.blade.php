@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'supplierCreate', $title = 'Create Supplier - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Suppliers</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Supplier</div>
                        <form class="forms-sample" method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierName">Supplier Name</label>
                                    <input type="text"  name="name" class="form-control form-control @error('name') is-invalid @enderror" id="supplierName" type="text" placeholder="Enter your supplier name" value="{{ old('name') }}" autocomplete="name" autofocus />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierBusinessName">Business Name</label>
                                    <input type="text"  name="business_name" class="form-control form-control @error('business_name') is-invalid @enderror" id="supplierBusinessName" type="text" placeholder="Enter supplier bussiness name" value="{{ old('business_name') }}" autocomplete="business_name" autofocus />
                                    @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierAddress">Address</label>

                                    <input type="text"  name="address" class="form-control form-control @error('address') is-invalid @enderror" id="supplierAddress" placeholder="Enter supplier Address" value="{{ old('address') }}" autocomplete="address" autofocus/>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierCity">City</label>
                                    <input type="text"  name="city" class="form-control form-control @error('city') is-invalid @enderror" id="supplierCity" placeholder="Enter city name" value="{{ old('city') }}" autocomplete="city" autofocus/>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierArea">Area</label>
                                    <input type="text"  name="area" class="form-control form-control @error('area') is-invalid @enderror" id="supplierArea" placeholder="Enter area name" value="{{ old('area') }}" autocomplete="area" autofocus/>
                                    @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierContact">Contact Number</label>
                                    <input type="text"  name="contact" class="form-control form-control @error('contact') is-invalid @enderror" id="supplierContact" placeholder="Enter contact number" value="{{ old('contact') }}" autocomplete="contact" autofocus/>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierCnicFront">CNIC Front Image</label>
                                    <input id="file-input" type="file" multiple  name="cnic_front" class="form-control form-control @error('cnic_front') is-invalid @enderror" id="supplierCnicFront" value="{{ old('cnic_front') }}" autocomplete="cnic_front" autofocus/>
                                    @error('cnic_front')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                <div id="preview"></div>
                            </div>
                                <script>
                                    function previewImages() {

  var preview = document.querySelector('#preview');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}

document.querySelector('#file-input').addEventListener("change", previewImages);
                                </script>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierCnicBack">CNIC Back Image</label>
                                    <input  id="file-inputt" type="file" multiple  name="cnic_back" class="form-control form-control @error('cnic_back') is-invalid @enderror" id="supplierCnicBack" value="{{ old('cnic_back') }}" autocomplete="cnic_back" autofocus/>
                                    @error('cnic_back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                 <div class="col-md-6 form-group mb-3">
                                <div id="preview2"></div>
                            </div>
                                <script>
                                    function previewImages() {

  var preview = document.querySelector('#preview2');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}

document.querySelector('#file-inputt').addEventListener("change", previewImages);
                                </script>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierCNICNO">CNIC Number</label>
                                    <input type="text"  name="cnic_no" class="form-control form-control @error('cnic_no') is-invalid @enderror" id="supplierCNICNO" placeholder="Enter CNIC Number" value="{{ old('cnic_no') }}" autocomplete="cnic_no" autofocus/>
                                    @error('cnic_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierMessagingServiceNo">Messaging Service Number</label>
                                    <input type="text"  name="messaging_service_no" class="form-control form-control @error('messaging_service_no') is-invalid @enderror" id="supplierMessagingServiceNo" type="text" placeholder="Enter messaging service number" value="{{ old('messaging_service_no') }}" autocomplete="messaging_service_no" autofocus />
                                    @error('messaging_service_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierMessagingServiceName">Messaging Service Name</label>
                                    <input type="text"  name="messaging_service_name" class="form-control form-control @error('messaging_service_name') is-invalid @enderror" id="supplierMessagingServiceName" type="text" placeholder="Enter messaging service name" value="{{ old('messaging_service_name') }}" autocomplete="messaging_service_name" autofocus />
                                    @error('messaging_service_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierEmail">Email</label>
                                    <input type="email"  name="email" class="form-control form-control @error('email') is-invalid @enderror" id="supplierEmail    " type="text" placeholder="Enter email" value="{{ old('email') }}" autocomplete="email" autofocus />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierSocialMediaName_1">Social Media Name One</label>
                                    <input type="text"  name="social_media_name_1" class="form-control form-control @error('social_media_name_1') is-invalid @enderror" id="supplierSocialMediaName_1" type="text" placeholder="Enter Social media name one" value="{{ old('social_media_name_1') }}" autocomplete="social_media_name_1" autofocus />
                                    @error('social_media_name_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierLink_1">Social Media Link One</label>
                                    <input type="text"  name="link_1" class="form-control form-control @error('link_1') is-invalid @enderror" id="supplierLink_1" type="text" placeholder="Enter Social media Link one" value="{{ old('link_1') }}" autocomplete="link_1" autofocus />
                                    @error('link_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierSocialMediaName_2">Social Media Name Two</label>
                                    <input type="text"  name="social_media_name_2" class="form-control form-control @error('social_media_name_2') is-invalid @enderror" id="supplierSocialMediaName_2" type="text" placeholder="Enter Social media name two" value="{{ old('social_media_name_2') }}" autocomplete="social_media_name_2" autofocus />
                                    @error('social_media_name_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierLink_2">Social Media Link Two</label>
                                    <input type="text"  name="link_2" class="form-control form-control @error('link_2') is-invalid @enderror" id="supplierLink_2" type="text" placeholder="Enter Social media Link Two" value="{{ old('link_2') }}" autocomplete="link_2" autofocus />
                                    @error('link_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierBankAccountTitle">Bank Account Title</label>
                                    <input type="text"  name="bank_account_title" class="form-control form-control @error('bank_account_title') is-invalid @enderror" id="supplierBankAccountTitle" type="text" placeholder="Enter Bank Account Title" value="{{ old('bank_account_title') }}" autocomplete="bank_account_title" autofocus />
                                    @error('bank_account_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierBankName">Bank Name</label>
                                    <input type="text"  name="bank_name" class="form-control form-control @error('bank_name') is-invalid @enderror" id="supplierBankName" type="text" placeholder="Enter Bank Name" value="{{ old('bank_name') }}" autocomplete="bank_name" autofocus />
                                    @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierBankBranch">Bank Branch</label>
                                    <input type="text"  name="bank_branch" class="form-control form-control @error('bank_branch') is-invalid @enderror" id="supplierBankBranch" type="text" placeholder="Enter Bank Branch" value="{{ old('bank_branch') }}" autocomplete="bank_branch" autofocus />
                                    @error('bank_branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierAccountOrIbanNo">Account/IBAN Number</label>
                                    <input type="text"  name="account_or_iban_no" class="form-control form-control @error('account_or_iban_no') is-invalid @enderror" id="supplierAccountOrIbanNo" type="text" placeholder="Enter Account/IBAN Number" value="{{ old('account_or_iban_no') }}" autocomplete="account_or_iban_no" autofocus />
                                    @error('account_or_iban_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierMoneyTransferNo">Money Transfer Number</label>
                                    <input type="text"  name="money_transfer_no" class="form-control form-control @error('money_transfer_no') is-invalid @enderror" id="supplierMoneyTransferNo" type="text" placeholder="Enter Money Transfer Number" value="{{ old('money_transfer_no') }}" autocomplete="money_transfer_no" autofocus />
                                    @error('money_transfer_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="supplierMoneyTransferService">Money Transfer Service</label>
                                    <input type="text"  name="money_transfer_service" class="form-control form-control @error('money_transfer_service') is-invalid @enderror" id="supplierMoneyTransferService" type="text" placeholder="Enter Money Transfer Service" value="{{ old('money_transfer_service') }}" autocomplete="money_transfer_service" autofocus />
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
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
