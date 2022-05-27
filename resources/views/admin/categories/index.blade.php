@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'categoryIndex', $title = 'Categories- Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Categories</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Category</h4>
                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('category.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Category</a>
                            <br> <br>
                        </div>
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Route</th>
                                    <th>Parent Category</th>
                                    <th>Title</th>
                                    
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>

                                        <td>{{$category->id}}</td>
                                          <td>                                       
@php
echo $cat = App\Models\Category::where('id',$category->id)->first()->title;
echo" / ";
 $cat_parent = App\Models\Category::where('id',$category->id)->first()->parent_id;
if($cat_parent!='0')
{
 $cat2 = App\Models\Category::where('id',$cat_parent)->first();
$productt = json_decode($cat2,true);
if(  $productt!=null)
{
  echo $productt['title'];
  echo" / ";

  $productt['parent_id'];
  $cat_parent2 = App\Models\Category::where('id',$productt['parent_id'])->first();
  $productt2 = json_decode($cat_parent2,true);
  if($productt2!=null)
  {
   echo $productt2['title'];
  }
  

}






}



@endphp

                                        </td>
                                        <td>
                                        @foreach($categories as $parentcategory)
                                            {{$category->parent_id == $parentcategory->id ? $parentcategory->title : ''}}
                                        @endforeach
                                        </td>
                                        <td>{{$category->title}}</td>
                                       

                                     
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                     @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit categories'))
                                            <a href="{{route('category.edit',$category)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                                </div>

                                                <div class="col-6">
                                                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete categories'))
                                            <form method="POST" action="{{route('category.destroy',$category)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                                </div>
                                            </div> 
                                           
                                            
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                      <th>Category Route</th>
                                    <th>Parent Category</th>
                                    <th>Title</th>
                                  
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('page_css')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
{{--    --}}{{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
