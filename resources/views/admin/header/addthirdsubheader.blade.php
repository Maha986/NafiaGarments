@extends('admin.layouts.master')

@section('content')


    <input type="hidden" value="{{$activePage = 'accountsIndex', $title = 'Add Third-Sub-Headers - Nafia Garments'}}">
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('subheaders-create'))
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Add Sub-Headers</div>
                        <form method="POST" action="thirdsubheader_post">
                            @csrf
                            <div class="row">

                                 


                                

                                 @php $subheader = \App\Models\subheader::all() @endphp
                                     

                                  <div class="col-md-6 form-group mb-3">
                                    <label for="lastName1">Select Sub-Header</label>
                                    <select name="subheaders" id="" class="form-control">
                                   
                                            <option value=""disabled>Select Sub-Header</option>
                                            @foreach($subheader as $subhead)
                                              <option value="{{$subhead->id}}">{{$subhead->name}}</option>
                                             @endforeach
                                            
                                
                                       
                                    </select>
                                </div>




                              

                              


                                    <div class="col-md-6 form-group mb-3">
                                    <label for="chequeno">Sub-Header Name</label>
                                    <input class="form-control" id="thirdsubheadername" name="thirdsubheadername" type="text" required/>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="chequeno">Code</label>
                                    <input class="form-control" id="code" name="code" type="text" required/>
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
        
@endsection
