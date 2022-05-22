

@php
$sliders = DB::table('home_settings')->where([
['key' ,'=','slider'],
['status','=',1],
])->get();
@endphp

@php $num =1 @endphp




<div class="home-slider owl-carousel owl-theme show-nav-hover nav-big">
    @foreach($sliders as $slider)
    @php $v = explode("~",$slider->value) @endphp
                <div class="home-slide home-slide1 banner">
                    <img  src="assets/images/{{$v[0]}}"  alt="home banner">
                                      <div class="banner-layer banner-layer-middle">
                        <h2>{{$v[1]}}</h2>
                        <h3 class="text-uppercase mb-0">{{$v[2]}}</h3>
                        <h4 class="m-b-4">on Jackets</h4>

                        <h5 class="text-uppercase">Starting at<span class="coupon-sale-text"><sup>$</sup>199<sup>99</sup></span></h5>
                        <a href="category.html" class="btn btn-dark btn-xl" role="button">Shop Now</a>
                    </div><!-- End .banner-layer -->
                </div><!-- End .home-slide -->
                @php $num++ @endphp
                @endforeach

               <!--  -->
            </div><!-- End .home-slider -->


















</div>
</br>
</br>

