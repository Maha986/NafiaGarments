    <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="text-align:left;">#</th>
                                    <th style="text-align:left;">Offer</th>
                                    <th style="text-align:left;">Product</th>
                                    <th style="text-align:left;">Size</th>
                                    <th style="text-align:left;">Start Date</th>
                                    <th style="text-align:left;">End Date</th>
                                     <th style="text-align:left;">code</th>
                                      <th style="text-align:left;">Minimum Amount</th>
                                       <th style="text-align:left;">Discount</th>
                                        <th style="text-align:left;">No of Times</th>
                                    <th style="text-align:left;">Deal For</th>
                                    <th style="text-align:left;">Specific Deal For</th>
                                    <th style="text-align:left;">Status</th>
                                    <th style="text-align:left;">Created At</th>
                                 
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offer as $offer)
                                    <tr>
                                        <td>{{$offer->id}}</td>
                                        <td>{{$offer->offer}}</td>
                                        <td>
                                            @php $product = \App\Models\Product::where('id',$offer->product_id)->first() @endphp
                                            {{ $product->name }}
                                        </td>

                                        <td>

                                            @php $size = \App\Models\Size::where('id',$offer->size_id)->first() @endphp
                                            {{ $size->sizeName }}
                                        </td>
                                        <td>{{$offer->start_date}}</td>
                                        <td>{{$offer->end_date}}</td>
                                          
                                         
                                           <td>{{$offer->code}}</td>
                                     

                                      
                                   
                                           <td>{{$offer->min_amount}}</td>
                                    

                                 
                                           <td>{{$offer->discount}}</td>
                                        




                                         
                                   
                                           <td>{{$offer->no_of_times}}</td>
                                      



                                        <td>{{$offer->deal_for}}</td>

                                     
                                           <td>{{$offer->specific_deal_for}}</td>
                                     


                                   
                                        <td>{{$offer->status}}</td>
                                 <td>{{$offer->created_at->diffForHumans()}}</td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            
                            </table>
                        </div>