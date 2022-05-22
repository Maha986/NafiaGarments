@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'dealIndex', $title = 'Edit Deal - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Deals</h1>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Deal</div>
                        <form class="forms-sample" method="POST"enctype="multipart/form-data" action="{{ route('deal.update',$deal) }}">
                            @csrf()
                            <div class="row">

                        <div class="col-md-12 form-group mb-3">
                                    <label for="selectDeal">Select Deal</label>
                                    <select class="form-control @error('deal') is-invalid @enderror" id="selectDeal" name="deal">
                                        <option selected disabled> {{$deal->deal}} </option>
                                        <option {{ old('deal') == 'pack_of_two' ? 'selected':'' }} value="pack_of_two"> Pack of Two </option>
                                        <option {{ old('deal') == 'pack_of_three' ? 'selected':'' }} value="pack_of_three"> Pack of Three </option>
                                        <option {{ old('deal') == 'pack_of_four' ? 'selected':'' }} value="pack_of_four"> Pack of four </option>
            <option {{ old('deal') == 'pack_of_five' ? 'selected':'' }} value="pack_of_five"> Pack of five </option>
                                    </select>
                                    @error('deal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label for="dealname">Deal Name</label>
                                    <input type="text" name="dealname"value="{{$deal->dealname}}" class="form-control @error('dealname') is-invalid @enderror" id="dealname" placeholder="Enter dealname Here" value="" aria-label="dealname">
                                    @error('dealname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

    <div class="col-md-6 form-group mb-3">
                                    <label for="riderimage">Deal Image 1</label>
                                    <input id="file-input" type="file" multiple  name="img1" class="form-control form-control @error('img1') is-invalid @enderror"  value="" autocomplete="img1" autofocus/>
                                    @error('img1')
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
                                    <label for="img_2">Deal Image 2(optional)</label>
                                    <input  id="file-inputt" type="file" multiple  name="img_2" class="form-control form-control @error('img_2') is-invalid @enderror" id="img_2" value="{{ old('cnic_back') }}" autocomplete="img_2" autofocus/>
                                    @error('img_2')
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
                                    <label for="supplierCnicBack">Deal Image 3(optional)</label>
                                    <input  id="file-inputtt" type="file" multiple  name="img_3" class="form-control form-control @error('img_3') is-invalid @enderror" id="supplierCnicBack" value="" autocomplete="img_3" autofocus/>
                                    @error('img_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                 <div class="col-md-6 form-group mb-3">
                                <div id="preview3"></div>
                            </div>
                                <script>
                                    function previewImages() {

  var preview = document.querySelector('#preview3');
  
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

document.querySelector('#file-inputtt').addEventListener("change", previewImages);
                                </script>


  

  <div class="col-md-6 form-group mb-3">
                                    <label for="totalprice">Total Price</label>
                                    <input type="text" name="totalprice"value="{{$deal->totalprice}}" class="form-control @error('totalprice') is-invalid @enderror" id="totalprice" placeholder="Enter TotalPrice Here" value="" aria-label="totalprice">
                                    @error('totalprice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectDiscount">Discount (%)</label>
                                    <input type="text" name="discount" value="{{$deal->discount}}"class="form-control @error('discount') is-invalid @enderror" id="selectDiscount" placeholder="Enter Discount Here" value="{{ old('discount') }}" aria-label="discount">
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStartDate">Start Date</label>
                                    <input type="datetime-local" name="start_date"value="{{$deal->start_date}}" class="form-control @error('start_date') is-invalid @enderror" id="selectStartDate" value="{{ old('start_date') }}" aria-label="start_date">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectEndDate">End Date</label>
                                    <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="selectEndDate" value="{{ old('end_date') }}" aria-label="end_date">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="deal_for">Select Deal for</label>
                                    <select class="form-control @error('deal_for') is-invalid @enderror" id="deal_for" name="deal_for">
                                        <option selected disabled> Select Deal For </option>
                                        <option {{ old('deal_for') == "customer" ? 'selected':'' }}  value="customer"> Customer </option>
                                        <option {{ old('deal_for') == "reseller" ? 'selected':'' }}  value="reseller"> Reseller </option>
                                    </select>
                                    @error('deal_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="specific_deal_for">Select Specific Deal For</label>
                                    <select class="form-control js-example-basic-single @error('specific_deal_for') is-invalid @enderror" id="specific_deal_for" name="specific_deal_for">
                                        @if(old('deal_for') == 'customer')

                                            @if(!is_null(old('specific_deal_for')))

                                                @php $customer = \App\Models\Customer::where('id',old('specific_deal_for'))->first() @endphp

                                                @if(!is_null($customer))

                                                    <option value="{{ old('specific_deal_for') }}"> {{ $customer->email }} </option>

                                                @endif
                                            @endif

                                        @elseif(old('deal_for') == 'reseller')

                                            @if(!is_null(old('specific_deal_for')))

                                                @php $reseller = \App\Models\Reseller::where('id',old('specific_deal_for'))->first() @endphp

                                                @if(!is_null($reseller))

                                                    <option value="{{ old('specific_deal_for') }}"> {{ $reseller->email }} </option>

                                                @endif

                                            @endif

                                        @endif
                                    </select>
                                    @error('specific_deal_for')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStatus">Select Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                        <option selected disabled> Select Status </option>
                                        <option {{ old('status') == 0 ? 'selected':'' }}  value="0"> In Active </option>
                                        <option {{ old('status') == 1 ? 'selected':'' }}  value="1"> Active </option>

                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
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
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#product').on('change', function () {
                var product_id = this.value;
                $("#size").html('');
                $.ajax({
                    url: "{{url('sizes')}}",
                    type: "POST",
                    data: {
                        product_id: product_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#size').html('<option value="">Select Size</option>');
                        $.each(result.sizes, function (key, value) {
                            $("#size").append('<option value="' + value.id + '">' + value.sizeName + '</option>');
                        });
                    }
                });
            });

            $('#deal_for').on('change', function () {
                var deal_for = this.value;
                $("#specific_deal_for").html('');
                $.ajax({
                    url: "{{url('specificdealfor')}}",
                    type: "POST",
                    data: {
                        deal_for: deal_for,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#specific_deal_for').html('<option value="">Select Specific Deal For</option>');

                        if(result.customers != null){

                            $.each(result.customers, function (key, value) {
                                $("#specific_deal_for").append('<option value="' + value.id + '">' + value.email + '</option>');
                            });

                        }
                        else if(result.resellers != null){

                            $.each(result.resellers, function (key, value) {
                                $("#specific_deal_for").append('<option value="' + value.id + '">' + value.email + '</option>');
                            });

                        }


                    }
                });
            });
        });
    </script>
@endsection
