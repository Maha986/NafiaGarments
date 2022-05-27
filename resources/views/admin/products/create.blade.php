@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'productCreate', $title = 'Create Product - Nafia Garments'}}">

    <div class="main-content">
        <div class="breadcrumb">
            <h1>Products</h1>
        </div>
        <form class="forms-sample" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Product</div>

                            @csrf()
                            <div class="form-group">
                                <label>Product Name /Title</label>

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter New Product Name" value="{{ old('name') }}" aria-label="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                 <label for="selectCategory">Select Category</label>
                                <select class="form-control @error('categories') is-invalid @enderror" id="selectCategory" name="categories[]" multiple size="10">
                                    <option value="none" selected="" disabled="">Select Product Category</option>
                                    @foreach($categories as $category)


                                        @if($category->parent_id == 0)

                                            <optgroup value="{{ $category->id }}" label="{{ $category->title }}">

                                            @php
                                                $first_child_categories =  DB::table('categories')
                                                ->where('parent_id',$category->id)
                                                ->get()
                                            @endphp

                                                @if(count($first_child_categories) != false)

                                                    @foreach($first_child_categories as $first_child_category)

                                                        <option value="{{ $first_child_category->id }}"> -{{$first_child_category->title }}</option>

                                                            @php
                                                                $second_child_categories =  DB::table('categories')
                                                                ->where('parent_id',$first_child_category->id)
                                                                ->get()
                                                            @endphp

                                                            @if(count($second_child_categories) != false)

                                                                @foreach($second_child_categories as $second_child_category)

                                                                    <option value="{{ $second_child_category->id }}"> --{{ $second_child_category->title }}</option>

                                                                    @php
                                                                        $third_child_categories =  DB::table('categories')
                                                                        ->where('parent_id',$second_child_category->id)
                                                                        ->get()
                                                                    @endphp

                                                                    @if(count($third_child_categories) != false)

                                                                        @foreach($third_child_categories as $third_child_category)

                                                                            <option value="{{ $third_child_category->id }}"> ---{{ $third_child_category->title }}</option>

                                                                            @php
                                                                                $fourth_child_categories =  DB::table('categories')
                                                                                ->where('parent_id',$third_child_category->id)
                                                                                ->get()
                                                                            @endphp

                                                                            @if(count($fourth_child_categories) != false)

                                                                                @foreach($fourth_child_categories as $fourth_child_category)

                                                                                    <option value="{{ $fourth_child_category->id }}"> ----{{ $fourth_child_category->title }}</option>

                                                                                @endforeach

                                                                            @endif

                                                                        @endforeach

                                                                    @endif

                                                                @endforeach

                                                            @endif

                                                    @endforeach

                                                @endif

                                            </optgroup>

                                        @endif

                                    @endforeach


                                </select>
                                @error('categories')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label> Product Attributes </label>
                        </div>
                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <th> Colour </th>
                                    <th> Size </th>
                                    <th> Quantity </th>
                                      <th> QR_Code </th>
                                    <th> Image </th>
                                    <th> Image Preview </th>
                                    <th> Action </th>
                                </tr>
                                <tr>
                                    <td>
             <div class="form-group">
            <label for="selectColour">Select Colour</label>
            <select class="form-control @error('colour_0') is-invalid @enderror" id="selectColour" name="colour_0[0]">
            <option selected disabled> Select Colour </option>
             @foreach($colours as $colour)
          <option value="{{ $colour->id }}" style="background-color:{{ $colour->colourCode }}">{{ $colour->colourCode  }}</option>
                                                @endforeach
        </select>
            @error('colour_0')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
        <div class="form-group">
     <label for="selectSize">Select Size</label>
<select class="form-control @error('size_0') is-invalid @enderror" id="selectSize" name="size_0[0]">
    <option selected disabled> Select Size </option>
                 @foreach($sizes as $size)
             <option value="{{ $size->id }}">{{ $size->sizeName  }}</option>
                     @endforeach
             </select>
                 @error('size_0')
         <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </td>

<td>


<div class="form-group">
                            <label for="qrcode">Quantity </label>
            <input type="text" name="quantity_0[0]" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity" value=""id="selectQuantity">
                            @error('quantity_0[0]')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>









    <!--  <div class="form-group">
          <label for="quantity">Quantity</label>

                <input type="number" min ="0"name="quantity_0[0]" id="selectQuantity" class="form-control @error('quantity_0') is-invalid @enderror" placeholder="Enter Quantity Here" value="" aria-label="quantity">
         
                                        
                                            <span class="invalid-feedback" role="alert">
                                                
                                            </span>
                                           
                                        </div> -->
</td>

<td>
<div class="form-group">
                            <label for="qrcode">QR_Code </label>
            <input type="text" name="qr_0[0]" class="form-control @error('qr') is-invalid @enderror" placeholder="Enter QR Code" value=""id="selectQr">
                            @error('qr')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

 </td>


                                    <td>
                             <label for="selectImage">Select Image</label>
                                        <input type="file" class="form-control @error('image_0') is-invalid @enderror"onchange="readURL(this);" name="image_0[]" multiple>
                                        @error('image_0')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>

                                    <td> 
                                      <img id="blah" src="#" alt="your image" />

                                    </td>
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                    </td>
                                </tr>
                            </table>


                            <div class="form-group">
                                <label>Description</label>

                                <textarea name="description" id="tiny" class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}" aria-label="description" rows="15"> </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                </div>
            </div>











            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Status</div>
                        <div class="form-group">
                            <label for="selectStatus">Select Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                <option selected disabled> Select Status </option>
                                <option value="1"> Active </option>
                                <option value="0"> In Active </option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

@php
$batchi = App\Models\Batch::all();
@endphp
  <div class="form-group">
                            <label for="selectStatus">Select Batch</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="selectBatch" name="batch">
                                <option selected disabled> Select Batches </option>
                                @foreach($batchi as $b)
                                <option value="{{$b->id}}"> {{$b->name}} </option>
                               
                                @endforeach
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>





                        <div class="form-group">
                            <label for="product_weight">Product Weight (Kg) </label>
                            <input type="text" name="product_weight" class="form-control @error('product_weight') is-invalid @enderror" placeholder="Enter Product Weight" value="{{ old('product_weight') }}" aria-label="product_weight">
                            @error('product_weight')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



<!-- <div class="form-group">
                            <label for="qrcode">QR_Code </label>
                            <input type="text" name="qr" class="form-control @error('qrcode') is-invalid @enderror" placeholder="Enter QR Code" value="">
                            @error('qrcode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div> -->





                        <div class="form-group">
                            <label>Purchase Cost</label>

                            <input type="text" name="purchase_cost" id="purchase_cost" class="form-control @error('purchase_cost') is-invalid @enderror" placeholder="Enter Purchase Cost Here" value="{{ old('purchase_cost') }}" aria-label="purchase_cost">
                            @error('purchase_cost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label>Purchase Discount Percentage (%)</label>

                            <input type="text" name="purchase_discount_percentage" id="purchase_discount_percentage" class="form-control @error('purchase_discount_percentage') is-invalid @enderror" placeholder="Enter Purchase Discount Percentage" value="{{ old('purchase_discount_percentage') }}" aria-label="purchase_discount_percentage">
                            @error('purchase_discount_percentage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                          <div class="form-group">
                            <label>Purchase Discount Amount</label>

                            <input type="text" name="purchase_discount" id="purchase_discount" class="form-control @error('purchase_discount') is-invalid @enderror" placeholder="Enter Discount Here" value="{{ old('purchase_discount') }}" aria-label="purchase_discount">
                            @error('purchase_discount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Retail Price</label>

                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Retail Price Here" value="{{ old('price') }}" aria-label="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Reseller Price</label>

                            <input type="text" name="list_price_for_salesman" class="form-control @error('list_price_for_salesman') is-invalid @enderror" placeholder="Enter Price for Salesman Here" value="{{ old('list_price_for_salesman') }}" aria-label="list_price_for_salesman">
                            @error('list_price_for_salesman')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Commission Amount</label>

                            <input type="text" name="commission_amount" id="commission_amount" class="form-control @error('commission_amount') is-invalid @enderror" placeholder="Enter Commission Amount" value="{{ old('commission_amount') }}" aria-label="commission_amount">
                            @error('commission_amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Commission (%)</label>

                            <input type="text" name="commission" id="commission" class="form-control @error('commission') is-invalid @enderror" placeholder="Enter Commission in percent" value="{{ old('commission') }}" aria-label="commission">
                            @error('commission')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Video Link</label>

                            <input type="text" name="video_link" class="form-control @error('video_link') is-invalid @enderror" placeholder="Enter Video Link Here" value="{{ old('video_link') }}" aria-label="video_link">
                            @error('video_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!--<div class="form-group">
                            <label>Labour Cost</label>

                            <input type="text" name="labour_cost" class="form-control @error('labour_cost') is-invalid @enderror" placeholder="Enter Labour Cost Here" value="{{ old('labour_cost') }}" aria-label="labour_cost">
                            @error('labour_cost')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Transportation Cost</label>

                            <input type="text" name="transportation_cost" class="form-control @error('transportation_cost') is-invalid @enderror" placeholder="Enter Transportation Cost Here" value="{{ old('transportation_cost') }}" aria-label="transportation_cost">
                            @error('transportation_cost')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div> -->
        @php
        $owner = App\Models\Owner::all()
        @endphp
                        <div class="form-group">
                            <label>Owner</label>

                           <select class="form-control @error('owner') is-invalid @enderror" id="selectowner" name="owner">
            <option selected disabled> Select Owners </option>
             @foreach($owner as $o)
          <option value="{{ $o->id }}">{{ $o->name  }}</option>
                                                @endforeach
        </select>
                            @error('owner')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                     @php
        $supplier = App\Models\Supplier::all()
        @endphp
                        <div class="form-group">
                            <label>Supplier</label>

                           <select class="form-control @error('supplier') is-invalid @enderror" id="selectsupplier" name="supplier">
            <option selected disabled> Select Suppliers </option>
             @foreach( $supplier as $s)
          <option value="{{ $s->id }}">{{ $s->name  }}</option>
                                                @endforeach
        </select>
                            @error('supplier')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
        </form>
    </div>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
    <script>


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>

@endsection


@section('page_css')
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />


@endsection
@section('page_script')

    <script type="text/javascript">

        var i = 0;

        $("#add").click(function(){


            ++i;


            $("#dynamicTable").append('<tr>' +
                '<td>' +
                '<div class="form-group">' +
                '<label for="selectColour">Select Colour</label>' +
                '<select class="form-control" id="selectColour" name="colour_'+i+'['+i+']">' +
                '<option selected disabled> Select Colour </option>' +
                '@foreach($colours as $colour)' +
                '<option value="{{ $colour->id }}" style="background-color:{{ $colour->colourCode }}">{{ $colour->colourCode  }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group">' +
                '<label for="selectColour">Select Size</label>' +
                '<select class="form-control" id="selectSize" name="size_'+i+'['+i+']">' +
                '<option selected disabled> Select size </option>' +
                '@foreach($sizes as $size)' +
                '<option value="{{ $size->id }}">{{ $size->sizeName  }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</td>'+


                '<td>' +

                  '<div class="form-group">' +
                '<label for="selectQuantity">Quantity</label>' +
        '<input class="form-control"type="text" id="selectQuantity" name="quantity_'+i+'['+i+']">' +
                
                
                '</div>' +

                '</td>'+

'<td>' +

               '<div class="form-group">' +
                '<label for="selectColour">Select Qr Code</label>' +
        '<input class="form-control"type="text" id="selectQr" name="qr_'+i+'['+i+']">' +
                
                
                '</div>' +


     '</td>'+



                '<td>' +
                '<label for="selectImage">Select Image</label>' +
                '<input type="file" class="form-control" name="image_'+i+'[]" multiple>' +
                '</td>'+
                 '<td>' +
                '<img id="blah" src="#" alt="your image" />' +
                '</td>'+
                '<input type="hidden" name="length" value="'+i+'">'+
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');



        });

        $(document).on('click', '.remove-tr', function(){

            $(this).parents('tr').remove();

        });
    </script>



    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/path/to/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea#tiny'
        });
    </script>

    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>

    <script>

        $(document).ready(function () {

            $("#commission_amount").on("keyup", function(){
                var Commission_amount = $(this).val();
                var total_amount = $('#price').val();
                var percent = Commission_amount/total_amount * 100;
                $("#commission").val(percent);
            });

            $("#commission").on("keyup", function(){
                var Commission_percentage = $(this).val();
                var total_amount = $('#price').val();
                var amount = (Commission_percentage*total_amount) / 100;
                $("#commission_amount").val(amount);
            });

            $("#purchase_discount").on("keyup", function(){
                var purchase_discount_amount = $(this).val();
                var total_cost_amount = $('#purchase_cost').val();
                var percent = purchase_discount_amount/total_cost_amount * 100;
                $("#purchase_discount_percentage").val(percent);
            });

            $("#purchase_discount_percentage").on("keyup", function(){
                var purchase_discount_percentage = $(this).val();
                var total_cost_amount = $('#purchase_cost').val();
                var amount = (purchase_discount_percentage*total_cost_amount) / 100;
                $("#purchase_discount").val(amount);
            });

        });

    </script>

@endsection
