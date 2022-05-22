
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Owners</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Owner</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create owners'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('owner.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Owners</a>
                            <br> <br>
                        </div>
                        @endif

                         

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($owners as $owner)
                                    <tr>
                                        <td>{{$owner->id}}</td>
                                        <td>{{$owner->name}}</td>
                                        <td>{{$owner->email}}</td>
                                        <td>{{$owner->contact}}</td>
                                        <td>{{$owner->address}}</td>
                                        <td>{{$owner->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$owner->created_at->diffForHumans()}}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


