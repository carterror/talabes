@extends('layouts.app')

@section('title')
Productos
@endsection

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('assets/img/breadcrumb.jpg')}}">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <div class="breadcrumb__text">
                  <h2>Vegetable’s Package</h2>
                  <div class="breadcrumb__option">
                      <a href="./index.html">Home</a>
                      <a href="./index.html">Vegetables</a>
                      <span>Vegetable’s Package</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
  <div class="container">
      <div class="row text-left">
          <div class="col-lg-6 col-md-6">
              <div class="product__details__pic">
                  <div class="product__details__pic__item">
                      <img class="product__details__pic__item--large"
                          src="{{url('assets/img/product/details/product-details-1.jpg')}}" alt="">
                  </div>
                  <div class="product__details__pic__slider owl-carousel">
                      <img data-imgbigurl="img/product/details/product-details-2.jpg"
                          src="img/product/details/thumb-1.jpg" alt="">
                      <img data-imgbigurl="img/product/details/product-details-3.jpg"
                          src="img/product/details/thumb-2.jpg" alt="">
                      <img data-imgbigurl="img/product/details/product-details-5.jpg"
                          src="img/product/details/thumb-3.jpg" alt="">
                      <img data-imgbigurl="img/product/details/product-details-4.jpg"
                          src="img/product/details/thumb-4.jpg" alt="">
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6">
              <div class="product__details__text">
                  <h3>{{$product->title}}</h3>
                  <div class="product__details__rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <span>(18 reviews)</span>
                  </div>
                  <div class="product__details__price">$ {{$product->pricing}}</div>
                  <p>{{$product->description}}</p>
                  <div class="product__details__quantity">
                      <div class="quantity">
                          <div class="pro-qty">
                              <input type="text" value="1">
                          </div>
                      </div>
                  </div>
                  @include('includes.form')
                  <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                  <ul>
                      <li><b>Availability</b> <span>In Stock</span></li>
                      <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                      <li><b>Weight</b> <span>0.5 kg</span></li>
                      <li><b>Share on</b>
                          <div class="share">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                              <a href="#"><i class="fa fa-twitter"></i></a>
                              <a href="#"><i class="fa fa-instagram"></i></a>
                              <a href="#"><i class="fa fa-pinterest"></i></a>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title related__product__title">
                  <h2>Related Product</h2>
              </div>
          </div>
      </div>
      <div class="row">
        @foreach ($products as $item)
          <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="{{url('assets/img/product/product-1.jpg')}}">
                      <ul class="product__item__pic__hover">
                          <li><a href="#"><i class="fa fa-heart"></i></a></li>
                          <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                          <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                      </ul>
                  </div>
                  <div class="product__item__text">
                      <h6><a href="{{route('products.show', $item->id)}}">{{$item->title}}</a></h6>
                      <h5>$ {{$item->pricing}}</h5>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Related Product Section End -->

@endsection