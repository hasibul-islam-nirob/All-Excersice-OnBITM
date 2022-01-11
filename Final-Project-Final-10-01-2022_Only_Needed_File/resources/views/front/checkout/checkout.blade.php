@extends('front.master')

@section('title')
    Check Out
@endsection


@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>

            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">

                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title text-center">Please Fill-up The Form Carefully</h2><!-- End .checkout-title -->
                                <hr>

                                <label>Full Name</label>
                                <input type="text"  name="name" class="form-control" required>

                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" required>

                                <label>E-mail Address</label>
                                <input type="email" name="phone" class="form-control" >

                                <label>Delivery Address</label>
                                <textarea class="form-control" name="address" cols="30" rows="4" placeholder="" required ></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>

                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @php($sum=0)
                                        @foreach($cartProducts as $cartProduct)
                                        <tr>
                                            <td><a href="#">{{$cartProduct->name}}</a></td>
                                            <td>${{($cartProduct->price * $cartProduct->qty) }}</td>
                                            @php($sum = $sum + ($cartProduct->price * $cartProduct->qty) )
                                        </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{ number_format($sum)  }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr>
                                            <td>Tax:</td>
                                            <td>{{ $tax = (( $sum*15)/100)  }}</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{$sum+$tax}}</td>
                                        </tr><!-- End .summary-total -->

                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                        Cash On Delivery
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->


                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection