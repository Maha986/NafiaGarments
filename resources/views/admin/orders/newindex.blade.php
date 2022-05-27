@extends('admin.layouts.master')
@section('content')]





    <input type="hidden" value="{{$activePage = 'productownersIndex', $title = 'Product Owners - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>Order Details</h4>
         
     <!--                               @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif -->
            </div>
        </div>
        <!-- end of row-->
          @if($len==1)
        <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/rider')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </div>

                         <div style="float:right; margin-right: 1%;">
                            <a href=" {{route('orderdetails_pdf1',['pro1'=>$pro1,'products'=>$products])}}
                            " class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>

   
                      
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>{{$pro1}}</th>
                                  
                                  
                                
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          

           
        


        
 
           
           
           

          


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                   
                                    
                                   
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

 


                        @elseif($len==2)
                        <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/rider')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </di <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf2',['pro1'=>$pro1,'pro2'=>$pro2,'products'=>$products])}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>v>



                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>{{$pro1}}</th>
                                    <th>{{$pro2}}</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          <td>
               
       {{$pro->$pro2}}
          </td>

           
        


        
 
           
           
           

          


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                    <th>{{$pro2}}</th>
                                    
                                   
                                </tr>
                                </tfoot>
                            </table>
                        </div>
</div>
</div>
</div>
</div>
                        











@elseif ($len==3)


           <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/rider')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </div>

                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf3',['pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'products'=>$products])}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
 <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>{{$pro1}}</th>
                                    <th>{{$pro2}}</th>
                                      <th>{{$pro3}}</th>
                                  
                                 
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          <td>
               
       {{$pro->$pro2}}
          </td>

             <td>
               
       {{$pro->$pro3}}
          </td>


           
        


        
 
           
           
           

          


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                    <th>{{$pro2}}</th>
                                    
                             
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

@elseif($len==4)

 <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/rider')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </div>
                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf4',['pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'products'=>$products])}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>

 <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>{{$pro1}}</th>
                                    <th>{{$pro2}}</th>
                                      <th>{{$pro3}}</th>
                                      <th>{{$pro4}}</th>
                                  
                                
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          <td>
               
       {{$pro->$pro2}}
          </td>

             <td>
               
       {{$pro->$pro3}}
          </td>

           <td>
               
       {{$pro->$pro4}}
          </td>


           
        


        
 
           
           
           

          


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                    <th>{{$pro2}}</th>
                                    
                                
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>


@elseif($len==5)
 <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/rider')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </div>

                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf5',['pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'products'=>$products])}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
<div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>{{$pro1}}</th>
                                    <th>{{$pro2}}</th>
                                      <th>{{$pro3}}</th>
                                      <th>{{$pro4}}</th>
                                      <th>{{$pro5}}</th>
                                  
                              
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          <td>
               
       {{$pro->$pro2}}
          </td>

             <td>
               
       {{$pro->$pro3}}
          </td>

           <td>
               
       {{$pro->$pro4}}
          </td>

           <td>
               
       {{$pro->$pro5}}
          </td>


           
      
          


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                    <th>{{$pro2}}</th>
                                    
                             
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>





@elseif($len==6)
 <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/rider')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </div>

                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf6',['pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'pro6'=>$pro6,'products'=>$products])}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
<div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>{{$pro1}}</th>
                                    <th>{{$pro2}}</th>
                                      <th>{{$pro3}}</th>
                                      <th>{{$pro4}}</th>
                                      <th>{{$pro5}}</th>
                                    <th>{{$pro6}}</th>
                                  
                              
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          <td>
               
       {{$pro->$pro2}}
          </td>

             <td>
               
       {{$pro->$pro3}}
          </td>

           <td>
               
       {{$pro->$pro4}}
          </td>

           <td>
               
       {{$pro->$pro5}}
          </td>

            <td>
               
       {{$pro->$pro6}}
          </td>



                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                    <th>{{$pro2}}</th>
                          
                                </tr>
                                </tfoot>
                            </table>
                        </div>
</div>
</div>
</div>
</div>





                        @endif






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
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
