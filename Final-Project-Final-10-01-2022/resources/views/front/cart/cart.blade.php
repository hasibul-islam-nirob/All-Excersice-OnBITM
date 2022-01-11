@extends('front.master')

@section('title','SHoping Cart page')


@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            @if($message = Session::get('message'))
                                <h3 class="text-center text-success">{{$message}}</h3>
                            @endif
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @php($sum = 0)
                                @foreach($cartProducts as $cartProduct)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset($cartProduct->options->image)}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$cartProduct->name}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">${{$cartProduct->price}}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <form action="{{route('cart.update',['id'=>$cartProduct->rowId])}}" method="post">
                                                @csrf
                                                <input type="number" name="qty" class="form-control" value="{{$cartProduct->qty}}" min="1" max="10" step="1" data-decimals="0" required>
                                                <input type="submit" value="update" >
                                            </form>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">${{number_format(($cartProduct->qty * $cartProduct->price))}}</td>
                                    <td class="remove-col"><a href="{{route('cart.delete',['id'=>$cartProduct->rowId])}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                                    @php($sum = $sum + ($cartProduct->qty * $cartProduct->price))
                                @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                                <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{number_format($sum)}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;0 </td>
                                    </tr>

                                    <tr class="summary-shipping">
                                        <td>Vat/Tax :</td>
                                        <td>
                                            @php($tax = round((($sum * 15)/100)) )
                                            {{$tax}}
                                        </td>
                                    </tr>


                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{number_format( ($sum + $tax) )}}
                                        </td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{route('/')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection