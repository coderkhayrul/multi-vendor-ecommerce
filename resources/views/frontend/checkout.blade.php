{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Example - Hosted Checkout | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>Hosted Payment - SSLCommerz</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. We have provided this sample form for understanding Hosted Checkout Payment with SSLCommerz.</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">1000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">50</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">150</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>1200 TK</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="John Doe" required>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                               value="01711xxxxxx" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com" value="you@example.com" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                           value="93 B, New Eskaton Road" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required>
                            <option value="">Choose...</option>
                            <option value="Bangladesh">Bangladesh</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Choose...</option>
                            <option value="Dhaka">Dhaka</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <input type="hidden" value="1200" name="amount" id="total_amount" required/>
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                        address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html> --}}



{{-- <<========================  END OF FILE ==========================>> --}}

@extends('layouts.home_layout')
@section('home-content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form method="post" class="apply-coupon">
                            <input type="text" placeholder="Enter Coupon Code...">
                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="lname" placeholder="Last name *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address2" required="" placeholder="Address line2">
                            </div>
                        </div>
                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active">
                                        <option value="">Select an option...</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="PW">Belau</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="city" placeholder="City / Town *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone" placeholder="Phone *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="cname" placeholder="Company Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email address *">
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Additional information"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                </div>
                            </div>
                        </div>
                        <div id="collapsePassword" class="form-group create-account collapse in">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input required="" type="password" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddress" class="different_address collapse in">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" required="" name="fname" placeholder="First name *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" required="" name="lname" placeholder="Last name *">
                                    </div>
                                </div>
                                <div class="row shipping_calculator">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="cname" placeholder="Company Name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select w-100">
                                            <select class="form-control select-active">
                                                <option value="">Select an option...</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="billing_address" required="" placeholder="Address *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="billing_address2" required="" placeholder="Address line2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="state" placeholder="State / County *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="city" placeholder="City / Town *">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @php
                                    $carts = Cart::getContent()
                                @endphp
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{ asset('frontend') }}/imgs/shop/product-1-1.jpg" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{ $cart->name }}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x 1</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">${{ $cart->price }}</h4>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="{{ asset('frontend') }}/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="{{ asset('frontend') }}/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="{{ asset('frontend') }}/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="{{ asset('frontend') }}/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
