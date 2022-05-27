@extends('frontend.layout.master')

@section('content')


    <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="page-header">
                <div class="container">
                    <h1>The New Way to Success</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <div class="container">
                <h2 class="mb-4">Who we are</h2>
                <div class="row row-sparse">
                    <div class="col-md-6">
                        <p>Aliquam consectetur et lorem semper scelerisque. Proin est nibh, vestibulum vitae congue nec, tristique eu justo. Maecenas eu nunc lacinia, porta lorem vitae, viverra velit. Nulla dolor libero, rhoncus quis luctus eu, fermentum sed leo. Morbi ut risus porttitor odio sodales pulvinar. Sed gravida nulla sed sapien vulputate, eget malesuada justo egestas. Pellentesque sem mi, vulputate ac iaculis sit amet, sagittis feugiat dui. Proin non pellentesque leo. Vestibulum varius laoreet posuere. Etiam fringilla diam odio.</p>

                        <p>Nulla felis nibh, bibendum a leo ut, egestas ornare felis. Nam pretium mauris justo, eget commodo est fringilla vel. Proin condimentum, lacus sit amet finibus gravida, sapien ligula mattis leo, sit amet mattis leo lacus sit amet lectus. Nulla facilisi. Etiam porta iaculis velit id pulvinar. Sed dolor odio, eleifend eget aliquam vitae, efficitur vitae dolor. Integer ornare neque ac leo sollicitudin, at vestibulum ante scelerisque. Nullam ut elit sed lorem tempus feugiat in et lectus. Mauris interdum molestie placerat. Nullam dolor nunc, elementum et tincidunt id, vestibulum quis turpis. Integer imperdiet a eros a laoreet. Nam mattis vel ligula non imperdiet. Suspendisse potenti. Fusce purus sem, dapibus eu fermentum eget, aliquam vehicula ligula.</p>
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <p>Quisque congue dignissim dui sed luctus. Morbi nec mi vitae magna finibus ullamcorper. Etiam mattis blandit convallis. Suspendisse eu elementum leo. Vestibulum molestie nunc et efficitur egestas. Vivamus arcu lectus, laoreet vel consectetur bibendum, elementum non nunc. Proin porttitor velit odio, ac mattis quam tincidunt eget. Fusce semper nunc eget efficitur efficitur. Nam ullamcorper, enim id tincidunt feugiat, velit mauris fermentum nulla, at tempor eros turpis sit amet massa. Ut a semper lectus, sed hendrerit risus. In hac habitasse platea dictumst. Curabitur venenatis cursus posuere. Praesent turpis nisi, aliquam at facilisis non, sagittis vel urna. Donec diam lorem, feugiat vitae laoreet in, sagittis a lorem.</p>

                        <p>Aliquam consectetur et lorem semper scelerisque. Proin est nibh, vestibulum vitae congue nec, tristique eu justo. Maecenas eu nunc lacinia, porta lorem vitae, viverra velit. Nulla dolor libero, rhoncus quis luctus eu, fermentum sed leo. Morbi ut risus porttitor odio sodales pulvinar. Sed gravida nulla sed sapien vulputate, eget malesuada justo egestas. Pellentesque sem mi, vulputate ac iaculis sit amet, sagittis feugiat dui. Proin non pellentesque leo. Vestibulum varius laoreet posuere. Etiam fringilla diam odio.</p>
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <p>&nbsp;</p>
            <hr>
            <p>&nbsp;</p>
            
                 

            <div class="history-section">
                <div class="container">
                     @if($about->status == 1)
                                    @csrf
                                    @method('PUT')
                    <h1 class="page-title">{{$about->title}}</h1>
                    <div class="row row-sparse">
                        <div class="col-lg-5">
                            <div class="about-slider owl-carousel owl-theme">
                                <div class="about-slider-item">
                                   
                                    <img class="owl-lazy" src="{{ asset('storage/images/about/'.$about->image) }}" alt="About image description">
                                </div>
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-2.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-3.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                            </div><!-- End .about-slider -->
                        </div><!-- End .col-lg-5 -->
                        <div class="col-lg-7">
                            <h2 class="mb-4">2014</h2>
                            <p>{{$about->description}}</p>
                               @endif

                            <p>Nulla felis nibh, bibendum a leo ut, egestas ornare felis. Nam pretium mauris justo, eget commodo est fringilla vel. Proin condimentum, lacus sit amet finibus gravida, sapien ligula mattis leo, sit amet mattis leo lacus sit amet lectus. Nulla facilisi. Etiam porta iaculis velit id pulvinar. Sed dolor odio, eleifend eget aliquam vitae, efficitur vitae dolor. Integer ornare neque ac leo sollicitudin, at vestibulum ante scelerisque. Nullam ut elit sed lorem tempus feugiat in et lectus. Mauris interdum molestie placerat. Nullam dolor nunc, elementum et tincidunt id, vestibulum quis turpis. Integer imperdiet a eros a laoreet. Nam mattis vel ligula non imperdiet. Suspendisse potenti. Fusce purus sem, dapibus eu fermentum eget, aliquam vehicula ligula.</p>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->

                    <div class="row row-sparse">
                        <div class="col-lg-5">
                            <div class="about-slider owl-carousel owl-theme">
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-2.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-3.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-1.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                            </div><!-- End .about-slider -->
                        </div><!-- End .col-lg-5 -->
                        <div class="col-lg-7 order-lg-first">
                            <h2 class="mb-4">2015</h2>
                            <p>Aliquam consectetur et lorem semper scelerisque. Proin est nibh, vestibulum vitae congue nec, tristique eu justo. Maecenas eu nunc lacinia, porta lorem vitae, viverra velit. Nulla dolor libero, rhoncus quis luctus eu, fermentum sed leo. Morbi ut risus porttitor odio sodales pulvinar. Sed gravida nulla sed sapien vulputate, eget malesuada justo egestas. Pellentesque sem mi, vulputate ac iaculis sit amet, sagittis feugiat dui. Proin non pellentesque leo. Vestibulum varius laoreet posuere. Etiam fringilla diam odio.</p>

                            <p>Nulla felis nibh, bibendum a leo ut, egestas ornare felis. Nam pretium mauris justo, eget commodo est fringilla vel. Proin condimentum, lacus sit amet finibus gravida, sapien ligula mattis leo, sit amet mattis leo lacus sit amet lectus. Nulla facilisi. Etiam porta iaculis velit id pulvinar. Sed dolor odio, eleifend eget aliquam vitae, efficitur vitae dolor. Integer ornare neque ac leo sollicitudin, at vestibulum ante scelerisque. Nullam ut elit sed lorem tempus feugiat in et lectus. Mauris interdum molestie placerat. Nullam dolor nunc, elementum et tincidunt id, vestibulum quis turpis. Integer imperdiet a eros a laoreet. Nam mattis vel ligula non imperdiet. Suspendisse potenti. Fusce purus sem, dapibus eu fermentum eget, aliquam vehicula ligula.</p>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->

                    <div class="row row-sparse">
                        <div class="col-lg-5">
                            <div class="about-slider owl-carousel owl-theme">
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-3.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-2.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                                <div class="about-slider-item">
                                    <img class="owl-lazy" data-src="assets/images/about/img-1.jpg" src="assets/images/lazy.png" alt="About image description">
                                </div>
                            </div><!-- End .about-slider -->
                        </div><!-- End .col-lg-5 -->
                        <div class="col-lg-7">
                            <h2 class="mb-4">2016</h2>
                            <p>Aliquam consectetur et lorem semper scelerisque. Proin est nibh, vestibulum vitae congue nec, tristique eu justo. Maecenas eu nunc lacinia, porta lorem vitae, viverra velit. Nulla dolor libero, rhoncus quis luctus eu, fermentum sed leo. Morbi ut risus porttitor odio sodales pulvinar. Sed gravida nulla sed sapien vulputate, eget malesuada justo egestas. Pellentesque sem mi, vulputate ac iaculis sit amet, sagittis feugiat dui. Proin non pellentesque leo. Vestibulum varius laoreet posuere. Etiam fringilla diam odio.</p>

                            <p>Nulla felis nibh, bibendum a leo ut, egestas ornare felis. Nam pretium mauris justo, eget commodo est fringilla vel. Proin condimentum, lacus sit amet finibus gravida, sapien ligula mattis leo, sit amet mattis leo lacus sit amet lectus. Nulla facilisi. Etiam porta iaculis velit id pulvinar. Sed dolor odio, eleifend eget aliquam vitae, efficitur vitae dolor. Integer ornare neque ac leo sollicitudin, at vestibulum ante scelerisque. Nullam ut elit sed lorem tempus feugiat in et lectus. Mauris interdum molestie placerat. Nullam dolor nunc, elementum et tincidunt id, vestibulum quis turpis. Integer imperdiet a eros a laoreet. Nam mattis vel ligula non imperdiet. Suspendisse potenti. Fusce purus sem, dapibus eu fermentum eget, aliquam vehicula ligula.</p>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .history-section -->

            <div class="mb-8"></div><!-- margin -->
        </main><!-- End .main -->


@endsection
