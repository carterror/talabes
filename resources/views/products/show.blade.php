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
                  <h2>{{$product->title}}</h2>
                  <div class="breadcrumb__option">
                    <a href="{{route('todo')}}">Inicio</a>
                    <span>Producto</span>
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
                          src="{{$product->photo}}" alt="">
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

                  @include('includes.form')
                  <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                  <ul>
                      <li><b>Monedas</b> <span>MLC</span></li>
                      <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                      <li><b>Peso</b> <span>0.5 kg</span></li>
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
                  <h2>Otros Productos</h2>
              </div>
          </div>
      </div>
      <div class="row">
        @foreach ($products as $item)
        @if ($product->id != $item->id)
          <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="{{$item->photo}}">
                      <ul class="product__item__pic__hover">
                        <li><a href="{{route('products.show',$item->id)}}"><i class="fa fa-eye"></i></a></li>
                        <li>
                            <form action="{{ route('in_shopping_carts.store' )}}" method="post" id="pedir{{$item->id}}">
                                @csrf

                                <input type="hidden" name="cantidad" value="1">
      
                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('pedir{{$item->id}}').submit();"><i class="fa fa-shopping-cart"></i></a>
                            </form>
                        </li>
                      </ul>
                  </div>
                  <div class="product__item__text">
                      <h6><a href="{{route('products.show', $item->id)}}">{{$item->title}}</a></h6>
                      <h5>$ {{$item->pricing}}</h5>
                  </div>
              </div>
          </div>
        @endif
        @endforeach
      </div>
  </div>
</section>
<!-- Related Product Section End -->

@endsection