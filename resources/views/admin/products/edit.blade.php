@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'productCreate', $title = 'Edit Product - Nafia Garments'}}">

    <div class="main-content">
        <div class="breadcrumb">
            <h1>Product</h1>
        </div>

        <form class="forms-sample" method="POST" action="{{ route('product.update',$product) }}"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-9">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Edit Product</div>
                            <div class="form-group">
                                <label>New Product</label>

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter New Product Name" value="{{ $product->name }}"
                                       aria-label="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="selectCategory">Select Category</label>
                                <select class="form-control @error('categories') is-invalid @enderror"
                                        id="selectCategory" name="categories[]" multiple size="10">
                                    <option value="none" selected="" disabled="">Select Product Category</option>

                                    {{ $length = sizeof($categoryProduct) }}

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

                                                        @for($i=0; $i<$length; $i++)

                                                            @if($first_child_category->id == $categoryProduct[$i]->category->id)

                                                                <option
                                                                    value="{{ $first_child_category->id }}" {{ $first_child_category->id == $categoryProduct[$i]->category->id ? 'selected':'' }}>
                                                                    -{{ $first_child_category->title }}</option>

                                                                {{ $j = 1 }}

                                                                @break

                                                            @else

                                                                {{ $j = 0 }}

                                                                @continue

                                                            @endif

                                                        @endfor

                                                        @if($j == 0)

                                                            <option value="{{ $first_child_category->id }}">
                                                                -{{ $first_child_category->title }}</option>

                                                        @endif

                                                        @php
                                                            $second_child_categories =  DB::table('categories')
                                                            ->where('parent_id',$first_child_category->id)
                                                            ->get()
                                                        @endphp

                                                        @if(count($second_child_categories) != false)

                                                            @foreach($second_child_categories as $second_child_category)

                                                                    @for($i=0; $i<$length; $i++)

                                                                        @if($second_child_category->id == $categoryProduct[$i]->category->id)

                                                                            <option
                                                                                value="{{ $second_child_category->id }}" {{ $second_child_category->id == $categoryProduct[$i]->category->id ? 'selected':'' }}>
                                                                                --{{ $second_child_category->title }}</option>

                                                                            {{ $j = 1 }}

                                                                            @break

                                                                        @else

                                                                            {{ $j = 0 }}

                                                                            @continue

                                                                        @endif

                                                                    @endfor

                                                                    @if($j == 0)

                                                                        <option value="{{ $second_child_category->id }}">
                                                                            --{{ $second_child_category->title }}</option>

                                                                    @endif

                                                                @php
                                                                    $third_child_categories =  DB::table('categories')
                                                                    ->where('parent_id',$second_child_category->id)
                                                                    ->get()
                                                                @endphp

                                                                @if(count($third_child_categories) != false)

                                                                    @foreach($third_child_categories as $third_child_category)

                                                                            @for($i=0; $i<$length; $i++)

                                                                                @if($third_child_category->id == $categoryProduct[$i]->category->id)

                                                                                    <option
                                                                                        value="{{ $third_child_category->id }}" {{ $third_child_category->id == $categoryProduct[$i]->category->id ? 'selected':'' }}>
                                                                                        ---{{ $third_child_category->title }}</option>

                                                                                    {{ $j = 1 }}

                                                                                    @break

                                                                                @else

                                                                                    {{ $j = 0 }}

                                                                                    @continue

                                                                                @endif

                                                                            @endfor

                                                                            @if($j == 0)

                                                                                <option value="{{ $third_child_category->id }}">
                                                                                    ---{{ $third_child_category->title }}</option>

                                                                            @endif

                                                                        @php
                                                                            $fourth_child_categories =  DB::table('categories')
                                                                            ->where('parent_id',$third_child_category->id)
                                                                            ->get()
                                                                        @endphp

                                                                        @if(count($fourth_child_categories) != false)

                                                                            @foreach($fourth_child_categories as $fourth_child_category)

                                                                                @for($i=0; $i<$length; $i++)

                                                                                    @if($fourth_child_category->id == $categoryProduct[$i]->category->id)

                                                                                        <option
                                                                                            value="{{ $fourth_child_category->id }}" {{ $fourth_child_category->id == $categoryProduct[$i]->category->id ? 'selected':'' }}>
                                                                                            ----{{ $fourth_child_category->title }}</option>

                                                                                        {{ $j = 1 }}

                                                                                        @break

                                                                                    @else

                                                                                        {{ $j = 0 }}

                                                                                        @continue

                                                                                    @endif

                                                                                @endfor

                                                                                @if($j == 0)

                                                                                    <option value="{{ $fourth_child_category->id }}">
                                                                                        ----{{ $fourth_child_category->title }}</option>

                                                                                @endif

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

                            <div class="form-group" style="display:inline">
                                <label> Product Attributes </label>
                                <button style="float:right;" type="button" name="add" id="add" class="btn btn-success">Add More
                                </button>
                            </div>
                            <br>  <br>
                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <th> Colour</th>
                                    <th> Size</th>
                                    <th> Image</th>
                                    <th> Action</th>
                                </tr>
                            </table>

                            <div class="form-group">
                                <label>Description</label>

                                <textarea name="description" id="tiny"
                                          class="form-control @error('description') is-invalid @enderror"
                                          aria-label="description" rows="15"> {{ $product->description }} </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
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
                                <select class="form-control @error('status') is-invalid @enderror" id="selectStatus"
                                        name="status">
                                    <option selected disabled> Select Status</option>
                                    <option value="1" {{ $product->status == 1 ? 'Selected':'' }}> Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'Selected':'' }}> In Active</option>
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
      @php
      $bb = App\Models\Batch::where('id',$product->batch_id)->first()->name;
      @endphp
                            <label for="selectStatus">Select Batch</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="selectBatch" name="batch" required>
                                
                                <option selected disabled value="{{$product->batch_id}}"> {{$bb}} </option>
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
                            <input type="text" name="product_weight"value="{{$product->product_weight}}" class="form-control @error('product_weight') is-invalid @enderror" placeholder="Enter Product Weight" value="{{ old('product_weight') }}" aria-label="product_weight">
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

                            <input type="text" name="purchase_cost"value="{{$product->purchase_cost}}" id="purchase_cost" class="form-control @error('purchase_cost') is-invalid @enderror" placeholder="Enter Purchase Cost Here" value="{{ old('purchase_cost') }}" aria-label="purchase_cost">
                            @error('purchase_cost')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label>Purchase Discount Percentage (%)</label>

                            <input type="text" name="purchase_discount_percentage"value="{{$product->purchase_discount_percentage}}" id="purchase_discount_percentage" class="form-control @error('purchase_discount_percentage') is-invalid @enderror" placeholder="Enter Purchase Discount Percentage" value="{{ old('purchase_discount_percentage') }}" aria-label="purchase_discount_percentage">
                            @error('purchase_discount_percentage')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                          <div class="form-group">
                            <label>Purchase Discount Amount</label>

                            <input type="text" name="purchase_discount" id="purchase_discount"value="{{$product->purchase_discount}}" class="form-control @error('purchase_discount') is-invalid @enderror" placeholder="Enter Discount Here" value="{{ old('purchase_discount') }}" aria-label="purchase_discount">
                            @error('purchase_discount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Retail Price</label>

                            <input type="text" name="price" id="price"value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Retail Price Here" value="{{ old('price') }}" aria-label="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Reseller Price</label>

                            <input type="text" name="list_price_for_salesman"value="{{$product->list_price_for_salesman}}" class="form-control @error('list_price_for_salesman') is-invalid @enderror" placeholder="Enter Price for Salesman Here" value="{{ old('list_price_for_salesman') }}" aria-label="list_price_for_salesman">
                            @error('list_price_for_salesman')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Commission Amount</label>

                            <input type="text" name="commission_amount"value="{{$product->commission_amount}}" id="commission_amount" class="form-control @error('commission_amount') is-invalid @enderror" placeholder="Enter Commission Amount" value="{{ old('commission_amount') }}" aria-label="commission_amount">
                            @error('commission_amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Commission (%)</label>

                            <input type="text" name="commission" value="{{$product->commission}}" id="commission" class="form-control @error('commission') is-invalid @enderror" placeholder="Enter Commission in percent" value="{{ old('commission') }}" aria-label="commission">
                            @error('commission')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Video Link</label>

                            <input type="text" name="video_link"value="{{$product->video_link}}" class="form-control @error('video_link') is-invalid @enderror" placeholder="Enter Video Link Here" value="{{ old('video_link') }}" aria-label="video_link">
                            @error('video_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Labour Cost</label>

                            <input type="text" name="labour_cost"value="{{$product->labour_cost}}" class="form-control @error('labour_cost') is-invalid @enderror" placeholder="Enter Labour Cost Here" value="{{ old('labour_cost') }}" aria-label="labour_cost">
                            @error('labour_cost')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
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

                           <select class="form-control @error('owner') is-invalid @enderror" id="selectowner" name="owner" required>
                           @php
                           $own = App\Models\Owner::where('id',$product->owner)->first()->name;
                           @endphp
                           <option selected disabled> {{$own}} </option>
                           <option selected disabled value="{{$product->owner}}"> {{$own}} </option>
                           
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
                            @php
                           $sup = App\Models\Supplier::where('id',$product->supplier)->first();
                           @endphp
                           @if( $sup!=null )
                           <select class="form-control @error('supplier') is-invalid @enderror" id="selectsupplier" name="supplier" required>
            
            <option selected disabled value="{{$product->supplier}}"> {{$sup->name}} </option>
             @foreach( $supplier as $s)
          <option value="{{ $s->id }}">{{ $s->name  }}</option>
                                                @endforeach
        </select>
        @else
        
        <select class="form-control @error('supplier') is-invalid @enderror" id="selectsupplier" name="supplier" required>
            
            <option selected disabled > Select </option>
             @foreach( $supplier as $s)
          <option value="{{ $s->id }}">{{ $s->name  }}</option>
                                                @endforeach
        </select>
        @endif
                            @error('supplier')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>return
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of main-content -->
        </form>
    </div>

@endsection


@section('page_css')
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/sweetalert2.min.css')}}"/>


@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="{{asset('admin-assets/js/plugins/sweetalert2.min.js')}}"></script>

    <script>

        var i=0;

        $("#add").click(function () {

            ++i;

            $("#dynamicTable").append('<tr>' +
                '<td>' +
                '<div class="form-group">' +
                '<label for="selectColour">Select Colour</label>' +
                '<select class="form-control" id="selectColour" name="colour_' + i + '[' + i + ']">' +
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
                '<select class="form-control" id="selectSize" name="size_' + i + '[' + i + ']">' +
                '<option selected disabled> Select size </option>' +
                '@foreach($sizes as $size)' +
                '<option value="{{ $size->id }}">{{ $size->sizeName  }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td>'+
                '<div class="form-group">'+
                '<label for="qrcode">Quantity </label>'+
                '<input type="text"  value="" class="form-control" placeholder="Enter Quantity" id="quantity" name="quantity_' + i + '[' + i + ']">'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<div class="form-group">'+
                '<label for="qrcode">QR-Code </label>'+
                '<input type="text"  value="" class="form-control " placeholder="Enter Quantity"id="qr" name="qr_' + i + '[' + i + ']">'+
                '</div>'+
                '</td>'+
                '<td>' +
                '<label for="selectImage">Select Image</label>' +
                '<input type="file" class="form-control" name="image_' + i + '[]" multiple>' +
                '</td>' +
                '<input type="hidden" name="length" value="'+i+'">'+
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

        });

        $(document).on('click', '.remove-tr', function () {

            $(this).parents('tr').remove();

        });

    </script>




    <?php $countP=0?>
   
    @foreach($ColoursImagesProductsSizes as $ColourImageProductSize)

        <script type="text/javascript">

            $("#dynamicTable").append('<tr>' +
                '<td>' +
                '<div class="form-group">' +
                '<label for="selectColour">Select Colour</label>' +
                '<select class="form-control" id="selectColour" disabled>' +
                '<option selected disabled> Select Colour </option>' +
                '@foreach($colours as $colour)' +
                '<option value="{{ $colour->id }}" {{ $ColourImageProductSize->colour_id == $colour->id ? 'Selected':'' }} style="background-color:{{ $colour->colourCode }}">{{ $colour->colourCode  }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group">' +
                '<label for="selectColour">Select Size</label>' +
                '<select class="form-control" id="selectSize"  disabled>' +
                '<option selected disabled> Select size </option>' +
                '@foreach($sizes as $size)' +
                '<option value="{{ $size->id }}" {{ $ColourImageProductSize->size_id == $size->id ? 'Selected':'' }}>{{ $size->sizeName  }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td>'+
                '<div class="form-group">'+
                '<label for="qrcode">Quantity </label>'+
                '<input type="text" name="quantity_0[0]" value="{{ $ColourImageProductSize->quantity}}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity" value=""id="quantity"disabled>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<div class="form-group">'+
                '<label for="qrcode">QR-Code </label>'+
                '<input type="text" name="quantity_0[0]" value="{{ $ColourImageProductSize->qr_code}}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity" value=""id="qr"disabled>'+
                '</div>'+
                '</td>'+
                '<td>' +
                '<img src="{{ asset('storage/images/productImages/'.$ColourImageProductSize->image) }}" height="70px" width="70px">' +
                '</td>' +
                '<input type="hidden" value="{{$ColourImageProductSize->id}}" id="inputRemove{{$countP}}" />' +
                '<td> <button data-re="{{ $ColourImageProductSize->id }}" id="btn12" class="btn btn-danger remove-tr rm{{$countP}}">Remove</button></td></tr>');

        </script>
    <?php $countP++?>
    @endforeach
        <script>
            $(function() {
                for (let j=0; j < {{$countP}}; j++){
                    $(".rm"+j).on('click', function () {
                        var id = $("#inputRemove"+j).val();
                        swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#0CC27E',
                            cancelButtonColor: '#FF586B',
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            confirmButtonClass: 'btn btn-success mr-5',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false
                        }).then(() => {
                            var token = $("meta[name='csrf-token']").attr("content");
                            $.ajax(
                                {
                                    url: "/admin/colourimageproductsize/" + id + "/delete",
                                    type: 'DELETE',
                                    data: {
                                        "id": id,
                                        "_token": token,
                                    },
                                    success: function () {
                                        swal('Deleted!', 'Your imaginary file has been deleted.', 'success');
                                    }
                                });

                        }, function (dismiss) {
                            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                            if (dismiss === 'cancel') {
                                swal('Cancelled', 'Your imaginary file is safe :)', 'error');
                            }
                        });
                        $(this).parents('tr').remove();
                    });
                }
            });


        </script>


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/path/to/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea#tiny'
        });
    </script>

@endsection
