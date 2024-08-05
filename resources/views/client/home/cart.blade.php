@extends('client.layouts.master')
@section('title')
Cart List
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content-wrap section-ptb cart-page">
    <header>
        <div class="d-flex justify-content-end">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-content table-responsive">
                    @foreach($productVariants as $item)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-quantity">Quantity</th>
                                    <th class="plantmore-product-subtotal">Total</th>
                                    <th class="plantmore-product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail">
                                        @if (str_contains($item->product_img_thumb, 'products/'))
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->product_img_thumb)}}"
                                                alt="" style="width: 80px;">
                                        @else
                                            <img src="{{($item->product_img_thumb)}}" alt="" style="width: 80px;">
                                        @endif
                                    </td>
                                    <td class="plantmore-product-name">
                                        <span>{{$item->product_name}}</span>
                                        <span>Phân loại{{$item->variant_size_name}} x {{$item->variant_color_name}}</span>
                                    </td>
                                    <td class="plantmore-product-price"><span
                                            class="amount">{{$item->product_price_sale ?: $item->product_price}}</span>
                                        <span class="text-gray" style="text-decoration: line-through">
                                            {{$item->product_price_sale ? $item->product_price : ''}}
                                        </span>
                                    </td>
                                    <td class="plantmore-product-quantity">
                                        <span>{{$item->quantity}}</span>
                                    </td>
                                    <td class="product-subtotal">
                                        <span>{{$totalAmount}}</span>
                                    </td>
                                    <td class="plantmore-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
            <form action="{{route('oder.add')}}" method="POST">
                @csrf
                <input type="hidden" name="productVariants" value="{{$productVariants}}">
                <input type="hidden" name="totalAmount" value="{{$totalAmount}}">
                <input type="hidden" name="userId" value="{{$userId}}">
                <div class="checkout-details-wrapper" style="padding-top: 20px;">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <h3 class="shoping-checkboxt-title">Thông tin người mua</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Họ và tên<span class="required">*</span></label>
                                            <input type="text" name="user_name">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Email address <span class="required">*</span></label>
                                            <input type="email" name="user_email">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ <span class="required">*</span></label>
                                            <input type="text" placeholder="Địa chỉ của bạn" name="user_address">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="user_phone">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-details-wrap">
                                <h3 class="shoping-checkboxt-title">Thông tin người nhận</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Họ và tên<span class="required">*</span></label>
                                            <input type="text" name="receiver_name">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Email address <span class="required">*</span></label>
                                            <input type="email" name="receiver_email">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ <span class="required">*</span></label>
                                            <input type="text" placeholder="Địa chỉ của bạn" name="receiver_address">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="receiver_phone">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-details-wrap">
                                <h3 class="shoping-checkboxt-title">Phương thức thanh toán</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input class="form-check-input" type="radio" name="payment" id="cod"
                                                    value="cod">
                                                <label class="form-check-label" for="cod">Thanh toán khi nhận
                                                    hàng</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input" type="radio" name="payment" id="online"
                                                    value="online">
                                                <label class="form-check-label" for="online">Thanh toán online</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Tổng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($productVariants as $item)
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            <span>{{$item->product_name}} x {{$item->quantity}}</span>
                                                        </td>
                                                        <td class="product-total">
                                                            <span
                                                                class="amount">{{$item->product_price_sale ?: $item->product_price}}</span>
                                                            <span class="text-gray" style="text-decoration: line-through">
                                                                {{$item->product_price_sale ? $item->product_price : ''}}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount">{{$totalAmount}}</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <input type="radio">
                                                                <label>Free Shipping:</label>
                                                            </li>
                                                            <li></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount">{{$totalAmount}}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <!-- ACCORDION START -->
                                            <h5>Direct Bank Transfer</h5>
                                            <div class="payment-content">
                                                <p>Make your payment directly into our bank account. Please use your
                                                    Order ID as the payment reference. Your order won’t be shipped until
                                                    the funds have cleared in our account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h5>Cheque Payment</h5>
                                            <div class="payment-content">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town,
                                                    Store State / County, Store Postcode.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h5>PayPal</h5>
                                            <div class="payment-content">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Thanh toán" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- End of Main Content -->
@endsection