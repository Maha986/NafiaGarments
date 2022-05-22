@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'roleIndex', $title = 'Edit Role - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Roles</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Role</div>
                        <form class="forms-sample" method="POST" action="{{ route('role.update',$role) }}">
                            @method('PUT')
                            @csrf()
                            <div class="form-group">
                                <label>Edit Role</label>

                                <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" placeholder="Enter New Role" value="{{ $role->name }}" aria-label="role">
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Users</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%users%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror"  @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Roles</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%roles%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Categories</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%categories%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Products</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%products%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Colours</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%colours%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;" > {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sizes</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%sizes%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Batches</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%batches%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;" > {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sale Centers</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%sale centers%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;" > {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Riders</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%riders%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Suppliers</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%suppliers%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Logos</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%logos%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;" > {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address Phone Email</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%ape%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;" > {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sliders</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%sliders%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Banners</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%banners%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Services</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%services%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Floors</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%floors%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Couriers</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%couriers%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Extras</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%review reply%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" @foreach ($role->permissions as $p) {{ $p->id == $permission->id ? 'checked':'' }} @endforeach  value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>



    <tr>
                                            <td>Customer Service</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%confirm pick%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>


    <tr>
                                            <td>Store</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%store%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>

<tr>
                                            <td>Sorting & Packing</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%confirm packing%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>



    <tr>
                                            <td>Labelling And Dispatching</td>
                                            <td>
                                                <div class="row">
                                                    @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%labelling & dispatching%')->get() as $permission)
                                                        <div class="form-check form-check-inline col-md-2" style="margin-left:10px;">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror" value="{{ $permission->id }}" aria-label="permissions">
                                                            <span class="badge badge-primary"style="font-size:small;"> {{ $permission->name }} </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>

                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
