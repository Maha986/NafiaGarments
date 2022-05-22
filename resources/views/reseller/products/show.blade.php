@extends('reseller.layouts.master')

@section('content')
    <input type="hidden" value="{{$activePage = 'batchIndex', $title = 'Show Full Product - Nafia Garments'}}">

        <h4>Full Information</h4>
        <br />

        <div class="row">
            <div class="col-md-2 col-6">
                <div class="mb-4">
                    <p class="text-primary mb-1"><i class="fas fa-signature text-16 mr-1"></i> Product Name </p><span> {{ $product->name }} </span>
                </div>
            </div>

            <div class="col-md-2 col-6">
                <div class="mb-4">
                    <p class="text-primary mb-1"><i class="far fa-usd-circle text-16 mr-1"></i> Price </p><span> {{ $product->list_price_for_salesman }} </span>
                </div>
            </div>

            <div class="col-md-8 col-6">
                <div class="mb-4">
                    <p class="text-primary mb-1"><i class="fas fa-info text-16 mr-1"></i> Description </p><span> {!! $product->description !!} </span>
                </div>
            </div>

        </div>

        @php $product_csis = \App\Models\ColourImageProductSize::where('product_id',$product->id)->get() @endphp

        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Product</h4>

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th> Colour</th>
                                    <th> Size</th>
                                    <th> Image</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                    @php $count = null; @endphp
                                    @php $total_rows = count($product_csis); @endphp
                                    @php $carousel_boolen = true @endphp
                                    @php $carousel_count_boolen = true @endphp
                                    @php $carousel_count_for_controls = 1 @endphp
                                    @php $catalogue_for_controls = 1 @endphp
                                    @foreach($product_csis as $product_csi)
                                        @if($product_csi->colour_id !== $count)
                                            <form method="POST" action="{{ route('reseller_cart.store') }}">
                                                @csrf
                                                <tr>
                                                    <td>
                                                        @php $colour =  \App\Models\Colour::where('id',$product_csi->colour_id)->first() @endphp

                                                        <div style="background-color: {{ $colour->colourCode }}; width:50px; height: 50px; font-size: 0;"></div>

                                                        <input type="hidden" name="colour" value="{{ $colour->id }}">
                                                    </td>
                                                    <td>

                                                        @php $size =  \App\Models\Size::where('id',$product_csi->size_id)->first() @endphp

                                                        {{ $size->sizeName }}

                                                        <input type="hidden" name="size" value="{{ $size->id }}">

                                                    </td>
                                                    <td>

                                                        <input type="hidden" name="product" value="{{ $product->id }}">



                  <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/productImages/'.$product_csi->image ) }}" alt="cnic image not found" />
                </div>
                                                   </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
<button type="button"  class="btn btn-raised btn-raised-success m-1" data-toggle="modal" data-target="#exampleModalCenter{{ $carousel_count_for_controls }}" style="color: white"><i class="nav-icon fas fa-cart-plus font-weight-bold"> </i> Add To Cart </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter{{ $carousel_count_for_controls }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                  <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">Quantity</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                             </button>
                                         </div>
                             <div class="modal-body">
                               <label>Quantity</label>
                           <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity Here" value="{{ old('quantity') }}" aria-label="quantity">
                                  @error('quantity')
                              <span class="invalid-feedback" role="alert">
                                                                             $message }}</strong>
                                          </span>
                                  @enderror
                                    </div>
                             <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Add</button>
                                                 </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                            </form>



                                                        @php $catalogues = \App\Models\Catalogue::all(); @endphp


                                                    <!-- Button trigger modal for catalogue -->
                                                        <button type="button"  class="btn btn-raised btn-raised-success m-1" data-toggle="modal" data-target="#exampleModalCenterCatalogue{{ $catalogue_for_controls }}" style="color: white"><i
                                                            class="nav-icon fa fa-list font-weight-bold"> </i> Add To Catalogue </button>

                <form method="POST" action="{{ route('catalogue_product.store') }}">
                                                    @csrf
                                                        <!-- Modal catalogue -->
                                                        <div class="modal fade" id="exampleModalCenterCatalogue{{ $catalogue_for_controls }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalCenterTitle">Catalogue</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                     </button>
                                     </div>
                             <div class="modal-body">
               <label>Catalogue</label>
           <select class="form-control js-example-basic-single{{ $catalogue_for_controls }} @error('catalogue_id') is-invalid @enderror" name="catalogue_id">
                                                                            <option selected disabled> Select Catalogue </option>
                                                                            @foreach($catalogues as $catalogue)
                                                                                <option value="{{ $catalogue->id }}">{{ $catalogue->catalogue  }}</option>
                                                                            @endforeach
                   </select>
                              @error('catalogue_id')
     <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
               @enderror
                                </div>
                 <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                            <input type="hidden" name="size_id" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($size->id)  }}">
                                                                            <input type="hidden" name="colour_id" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($colour->id)  }}">
                                                                            <input type="hidden" name="product_id" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($product->id) }}">

       <button type="submit" class="btn btn-primary">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $count = $colour->id;
                                                    $carousel_count_for_controls++;
                                                    $catalogue_for_controls++;
                                                @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th> Colour</th>
                                    <th> Size</th>
                                    <th> Image</th>
                                    <th> Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5"> </div>
            <div class="col-sm-2">
                <a href="{{route('product_reseller.index')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                class="nav-icon font-weight-bold"></i>Go Back</a>
            </div>
            <div class="col-sm-5"> </div>
        </div>
@endsection

@section('page_css')

    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
{{--    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@endsection

@section('page_script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>--}}
{{--    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>--}}
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>

    <script>

        var i;

        $(document).ready(function() {

            for(var i=1;i<{{ $catalogue_for_controls }};i++){

                $('.js-example-basic-single'+i).select2({
                    dropdownParent: $('#exampleModalCenterCatalogue'+i)
                });

            }

        });

    </script>

    <script>
        $(function(){$('.carousel').carousel();});
    </script>



@endsection
