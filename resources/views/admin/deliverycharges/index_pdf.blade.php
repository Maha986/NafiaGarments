
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
               <center> <h4>View All E-Commerce Nafia Delivery Charges</h4></center>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Delivery Charge</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create delivery charges'))
                            <div style="float:right; margin-right: 1%;">
                                <a href="{{route('delivery_charges.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                        class="nav-icon font-weight-bold"></i>Add New Delivery Charge</a>
                                <br> <br>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>City</th>
                                    <th>Charges</th>
                                    <th>Created At</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($delivery_charges as $delivery_charge)
                                    <tr>
                                        <td>{{$delivery_charge->id}}</td>
                                        <td>
                                            @php $city = \App\Models\City::where('id',$delivery_charge->city_id)->first(); @endphp
                                            {{ $city->name }}
                                        </td>
                                        <td>{{$delivery_charge->delivery_charge}}</td>
                                        <td>{{$delivery_charge->created_at->diffForHumans()}}</td>
                                        
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>City</th>
                                    <th>Charges</th>
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


