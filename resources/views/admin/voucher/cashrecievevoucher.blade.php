@extends('admin.layouts.master')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("p").click(function(){
    $(this).hide();
  });
});
</script>

    <input type="hidden" value="{{$activePage = 'accountsIndex', $title = 'Generate Voucher - Nafia Garments'}}">
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('voucher-create'))
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create Cash Recieve Voucher</div>
                        <form method="POST" action="cashrecievevoucher">
                            @csrf
                            <div class="row">

                                  @php
     $date = date('d-m-y h:i:s');
   
     @endphp
                                  <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Date</label>
                                    <input class="form-control" value="{{$date}}"  name="date"  required/>
                                </div>

                               

                                <div class="col-md-6 form-group mb-3">
                                    <label for="recievefrom">Recievce From</label>
                                    <input class="form-control" id="recievefrom" name="recievefrom" type="text"
                                           placeholder="Enter Paid_To" required/>
                                </div>

                                 @php $accountcode = \App\Models\thirdsubheader::all() @endphp
                                     

                                 
                                <div class="col-md-12 form-group mb-3">
                                    <label for="total">Total</label>
                                    <input class="form-control" id="total" name="total" type="text" required/>
                                </div>

                               


                                  <div class="col-md-6 form-group mb-3">
                                    <label for="lastName1">Select Category</label>
                                    <select name="accountcode[]" id="nameid" class="form-control">
                                   
                                            <option value=""disabled>Select Account Code</option>
                                            @foreach($accountcode as $code)
                                              <option value="{{$code->code}}">{{$code->name}}({{$code->code}})</option>
                                             @endforeach
                                            
                                
                                       
                                    </select>

                                </div>
 


 <script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'select catagory',
        ajax: {
            url: '/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>



                                  <div class="col-md-6 form-group mb-3">
                                    <label for="particular">Particular</label>
                                    <input class="form-control" id="particular" name="particular[]" type="text" required/>
                                </div>

                                  <div class="col-md-6 form-group mb-3">
                                    <label for="debit">Debit</label>
                                    <input class="form-control" id="debit" name="debit[]" type="text" required/>
                                         @if(session('warning'))
            <div class="alert alert-warning">
                <p>{{session('warning')}}</p>
            </div>
        @endif 
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="credit">Credit</label>
                                    <input class="form-control" id="credit[]" name="credit" type="text" required/>
                                </div>





<div class="col-md-12"style="text-align: right;">

<div class="input_fields_container">
      <div>
           <button class="btn btn-sm btn-success add_more_button">Add More Fields</button>
      </div>
    </div>
</div>

                              
                              
                               
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif


        <script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div class="row"><div class="col-3"><label>Debit:</label><input class="form-control" type="text" name="debit[]"/></div><div class="col-3"><label>Credit:</label><input type="text" class="form-control" name="credit[]"/></div><div class="col-3"><label>Select Category/Account Code:</label><select name="accountcode[]" id="nameid" class="form-control"> <option value=""disabled>Select Account Code</option>@foreach($accountcode as $code)<option value="{{$code->code}}">{{$code->name}}({{$code->code}})</option>@endforeach</select></div><div class="col-3"><label>Particular:</label><input type="text" class="form-control"  name="particular[]"/></div><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>,'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#nameid").select2({
            placeholder: "Select a Name",
            allowClear: true
        });
</script>
        
@endsection
