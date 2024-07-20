@extends('client.layouts.master')
@section('title')
    detail
@endsection
@section('content')
    <!-- Main Content -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('client.home.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row  product-details-inner">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-large-slider">
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset('theme/client/assets/images/product/product-01.png')}}" alt="product-details" />
                                <a href="{{asset('theme/client/assets/images/product/product-01.png')}}" data-fancybox="images"><i
                                        class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset('theme/client/assets/images/product/product-02.png')}}" alt="product-details" />
                                <a href="{{asset('theme/client/assets/images/product/product-02.png')}}" data-fancybox="images"><i
                                        class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset('theme/client/assets/images/product/product-03.png')}}" alt="product-details" />
                                <a href="{{asset('theme/client/assets/images/product/product-03.png')}}" data-fancybox="images"><i
                                        class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset('theme/client/assets/images/product/product-04.png')}}" alt="product-details" />
                                <a href="{{asset('theme/client/assets/images/product/product-04.png')}}" data-fancybox="images"><i
                                        class="fa fa-search"></i></a>
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img src="{{asset('theme/client/assets/images/product/product-05.png')}}" alt="product-details" />
                                <a href="{{asset('theme/client/assets/images/product/product-05.png')}}" data-fancybox="images"><i
                                        class="fa fa-search"></i></a>
                            </div>

                        </div>
                        <div class="product-nav">
                            <div class="pro-nav-thumb">
                                <img src="{{asset('theme/client/assets/images/product/product-01.png')}}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('theme/client/assets/images/product/product-02.png')}}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('theme/client/assets/images/product/product-03.png')}}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('theme/client/assets/images/product/product-04.png')}}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('theme/client/assets/images/product/product-05.png')}}" alt="product-details" />
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content">
                            <div class="product-info">
                                <h3>BENYAR AKNIGHT Mens Watches</h3>
                                <div class="product-rating d-flex">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                    <a href="#reviews">(<span class="count">1</span> customer review)</a>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">$70.00</span>
                                    <span class="old-price">$78.00</span>
                                </div>
                                <p>Thương hiệu BY BENYAR là cái tên nổi tiếng được rất nhiều khách hàng trên thế giới
                                    chọn lựa. Sản phẩm BENYAR AKNIGHT MENS WATCHES EASY READ LUMINOUS, STAINLESS STEEL
                                    QUARTZ WATCH FOR MEN WOMEN, FASHION CASUAL SPORT WRIST WATCH WITH WATERPROOF
                                    CHRONOGRAPH DATE là sự lựa chọn hoàn hảo nếu bạn đang tìm mua một món cho riêng
                                    mình.</p>
                                <div class="select-opstion-box mb-20">
                                    <h6 class="title mb-10">Color</h6>
                                    <select id="color" class="color-select">
                                        <option value="">Choose an option</option>
                                        <option value="Blue" class="attached enabled">Blue</option>
                                        <option value="Red" class="attached enabled">Red</option>
                                        <option value="Yellow" class="attached enabled">Yellow</option>
                                    </select>
                                </div>

                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity d-flex">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" class="input-text" name="quantity" value="1"
                                                       title="Qty">
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add To Cart</button>
                                    </form>
                                </div>
                                <ul class="single-add-actions">
                                    <li class="add-to-wishlist">
                                        <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add
                                            to Wishlist</a>
                                    </li>
                                    <li class="add-to-compare">
                                        <div class="compare-button"><a href="compare.html"><i class="icon-refresh"></i>
                                                Compare</a></div>
                                    </li>
                                </ul>
                                <ul class="stock-cont">
                                    <li class="product-sku">Sku: <span>P006</span></li>
                                    <li class="product-stock-status">Categories: <a href="#">Butter & Eggs,</a> <a
                                            href="#">Cultured Butter</a></li>
                                    <li class="product-stock-status">Tag: <a href="#">Man</a></li>
                                </ul>
                                <div class="share-product-socail-area">
                                    <p>Share this product</p>
                                    <ul class="single-product-share">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#description"
                                           class="active">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            <p>【⌚ 100% HIGH QUALITY WATCHES】: We are providing classic watches for men
                                                with 100% premium quality quartz movement. This watch has a simple and
                                                elegant design, unique craftsmanship, giving a unique style and elegant
                                                atmosphere, suitable for any occasion. Personalized glowing hands make
                                                this watch even more elegant.
                                                【⌚ WATER RESISTANT TO 50M】: Waterproof (50 meters), wash hands, rain, no
                                                problem! Suitable for all kinds of business, leisure, indoor activities
                                                or daily use. NOTE: Do not wear this watch while pressing any button in
                                                the water or underwater activities such as prolonged diving.</p>

                                            <p>【⌚ DURABLE AND COMFORTABLE】: The analog watch with quartz movement offers
                                                a classy look. Have chronograph analog display and date window, hardened
                                                mineral glass lens resists scratches. The strap is soft and comfortable
                                                to wear.
                                                【⌚ A PERFECT GIFT】: This versatile watch blends in with every occasion
                                                be it formal or casual. Wear this watch on the go, from business,
                                                leisure to indoor and outdoor activities or for daily use. The Benyar
                                                wrist watch is a perfect gift for you and your loved ones.
                                                【⌚ 100% SATISFACTION GUARANTEE】: Use our chronograph sports quartz watch
                                                with no risk. We offer a 60-day money-back guarantee for any reason.2
                                                year warranty for any quality-related issue. Customer satisfaction is
                                                our first priority and we don’t compromise on the quality of the
                                                material. Buy our waterproof wristwatch care-free.</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">
                                        <!-- Start Single Review -->
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{asset('theme/client/assets/images/other/reviewer-60x60.jpg')}}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    <ul class="product-rating d-flex mb-10">
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                    </ul>
                                                    <h5>Admin - <span> November 19, 2023</span></h5>

                                                </div>
                                                <p>Sản phẩm rất là ok dùng được
                                                </p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <div class="rating_wrap mt-50">
                                        <h5 class="rating-title-1">Add a review </h5>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <h6 class="rating-title-2">Your Rating</h6>
                                        <div class="rating_list">
                                            <div class="review_info mb-10">
                                                <ul class="product-rating d-flex mb-10">
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="#" class="comment-form-area">
                                                    <div class="row comment-input">
                                                        <div class="col-md-6 comment-form-author mt-15">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" required="required" name="Name">
                                                        </div>
                                                        <div class="col-md-6 comment-form-email mt-15">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" required="required" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-comment mt-15">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit mt-15">
                                                        <input type="submit" value="Submit" class="comment-submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3> Related Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row product-active-lg-4">
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-02.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                        <li class="portage"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 002</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$49.00</span>
                                        <span class="old-price">$90.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-03.png')}}" alt="">
                                    </a>

                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 003</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$55.00</span>
                                        <span class="old-price">$76.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-04.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$64.00</span>
                                        <span class="old-price">$72.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-05.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$44.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-01.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$42.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                    </div>
                </div>

                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3>Upsell Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row product-active-lg-4">
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-12.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                        <li class="portage"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 002</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$49.00</span>
                                        <span class="old-price">$90.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-13.png')}}" alt="">
                                    </a>

                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 003</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$55.00</span>
                                        <span class="old-price">$76.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-14.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$64.00</span>
                                        <span class="old-price">$72.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-15.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$44.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="{{asset('theme/client/assets/images/product/product-01.png')}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$42.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- main-content-wrap end -->
    </div>
    <!-- /.container-fluid -->

    <!-- End of Main Content -->
@endsection
