

    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Catalogues</h4>
            </div>
        </div>
        <!-- end of row-->
          <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Page-3.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.18.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": ""
}</script>
    <meta name="theme-color" content="#80ff00">
    <meta property="og:title" content="Page 3">
    <meta property="og:type" content="website">
  </head>


<h3> <b>Catalogue {{$catalogue->catalogue}} </b> </h3></br>



  <div class="row">
@foreach($cat as $c)
<div class="col-12">
    @php $cata = \App\Models\Product::where('id',$c->product_id)->first(); @endphp


 <body data-home-page="https://website476423.nicepage.io/Page-3.html?version=401433e5-5dcb-410c-ab6a-2f2e367ee01a" data-home-page-title="Page 3" class="u-body">

    <section class="u-clearfix u-grey-5 u-section-1" id="carousel_2cbf">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1">

        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <img src="" alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="1133" data-image-height="1700">
                <div class="u-palette-1-base u-shape u-shape-rectangle u-shape-1"></div>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <img src="" alt="" class="u-expanded-width u-image u-image-default u-image-2">
                <div class="u-palette-1-base u-shape u-shape-rectangle u-shape-2"></div>
              </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <img src="" alt="" class="u-expanded-width u-image u-image-default u-image-3">
                <div class="u-palette-1-base u-shape u-shape-rectangle u-shape-3"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-container-style u-group u-group-1">
          <div class="u-container-layout u-container-layout-4">
            <div class="container">



   @php $image = \App\Models\ColourImageProductSize::where('product_id',$c->product_id)->get(); @endphp
  <div class="row">

    @foreach($image as $img)

    @php
       $path = 'storage/images/productImages/'.$img->image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp

  <div class="col-4">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="{{ $imageee }}" alt="Image Not Found" style="width:100%">
  <!--   <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary stretched-link">See Profile</a>
    </div> -->
  </div></div>
  @endforeach

  
  </div>
            <h3>{{$cata->name}} </h3>
            <h3 class="u-text u-text-default u-text-1">New Collection</h3>
            <p class="u-text u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
            <h6 class="u-text u-text-3">Size_Id:&nbsp;:{{$c->size_id}}</h6>
             <h6 class="u-text u-text-3">Color_Id:&nbsp;:{{$c->colour_id}}</h6>
            <h6 class="u-text u-text-4">$ {{$cata->price}}</h6>
          </div>
        </div>
      </div>
    </section>
  </body>
</br></br> </br>
</div>
@endforeach



  </div>





 
 








       
    </div>


