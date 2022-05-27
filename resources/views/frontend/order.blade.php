@extends('frontend.layout.master')

@section('content')

    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li class="active">Your shopping cart</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2">Shopping Cart Summary</span>
            </h2>

            <div class="page-content page-order">
                <ul class="step">
                    <li class="current-step"><span>01. Summary</span></li>
                    <li><span>02. Sign in</span></li>
                    <li><span>03. Address</span></li>
                    <li><span>04. Shipping</span></li>
                    <li><span>05. Payment</span></li>
                </ul>
                <div class="heading-counter warning">Your shopping cart contains:
                    <span>1 Product</span>
                </div>
                <div class="order-detail-content">
                    <div class="table-responsive">
                        <table class="table table-bordered  cart_summary">
                            <thead>
                            <tr>
                                <th class="cart_product">Product</th>
                                <th>Description</th>
                                <th>Avail.</th>
                                <th>Unit price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th class="action"><i class="fa fa-trash-o"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cart_product">
                                    <a href="#"><img alt="Product" src="{{ asset('frontend/images/media/detail/product-100x122.jpg') }}"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="#">Frederique Constant </a></p>
                                    <small class="cart_ref">SKU : #123654999</small><br>
                                    <small><a href="#">Color : Beige</a></small><br>
                                    <small><a href="#">Size : S</a></small>
                                </td>
                                <td class="cart_avail"><span class="label label-success">In stock</span></td>
                                <td class="price"><span>61,19 €</span></td>
                                <td class="qty">

                                    <input type="text" minlength="1" maxlength="12" name="qty0" id="qty0" value="1" class="form-control input-sm">
                                    <span  data-field="qty0" data-type="minus" class="btn-number"><i class="fa fa-caret-up"></i></span>
                                    <span  data-field="qty0" data-type="plus" class="btn-number"><i class="fa fa-caret-down"></i></span>
                                </td>
                                <td class="price">
                                    <span>61,19 €</span>
                                </td>
                                <td class="action">
                                    <a href="#">Delete item</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_product">
                                    <a href="#"><img alt="Product" src="{{ asset('frontend/images/media/detail/product-100x122.jpg') }}"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="#">Frederique Constant </a></p>
                                    <small class="cart_ref">SKU : #123654999</small><br>
                                    <small><a href="#">Color : Beige</a></small><br>
                                    <small><a href="#">Size : S</a></small>
                                </td>
                                <td class="cart_avail"><span class="label label-success">In stock</span></td>
                                <td class="price"><span>61,19 €</span></td>
                                <td class="qty">

                                    <input type="text" minlength="1" maxlength="12" name="qty1" id="qty1" value="1" class="form-control input-sm">
                                    <span  data-field="qty1" data-type="minus" class="btn-number"><i class="fa fa-caret-up"></i></span>
                                    <span  data-field="qty1" data-type="plus" class="btn-number"><i class="fa fa-caret-down"></i></span>
                                </td>


                                <td class="price">
                                    <span>61,19 €</span>
                                </td>
                                <td class="action">
                                    <a href="#">Delete item</a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td rowspan="2" colspan="2"></td>
                                <td colspan="3">Total products (tax incl.)</td>
                                <td colspan="2">122.38 €</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td colspan="2"><strong>122.38 €</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="cart_navigation">
                        <a href="#" class="prev-btn">Continue shopping</a>
                        <a href="#" class="next-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
            <br>
        </div>


    </main><!-- end MAIN -->

@endsection
