@extends('layouts.app')

@section('title')
Carrito de compras
@endsection

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg')}} ">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <div class="breadcrumb__text">
                  <h2>Carrito de compras</h2>
                  <div class="breadcrumb__option">
                      <a href="{{route('todo')}}">Inicio</a>
                      <span>Carrito</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">

  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="shoping__cart__table">
                  <table>
                      <thead>
                          <tr>
                              <th class="shoping__product">Productos</th>
                              <th>Precio</th>
                              <th>Canttidad</th>
                              <th>Total</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $item)
                          <tr>
                            <td class="shoping__cart__item">
                                <img src="img/cart/cart-1.jpg" alt="">
                                <h5>{{$item->title}}</h5>
                            </td>
                            <td class="shoping__cart__price">
                                $ {{$item->pricing}}
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                    <div class="pro-qty" data-id="{{$item->cantidad()->id}}">
                                        <input type="text" value="{{$item->cantidad()->cantidad}}">
                                    </div>
                                </div>
                            </td>
                            <td class="shoping__cart__total">
                                $ {{$item->pricing*$item->cantidad()->cantidad}}
                            </td>
                            <td class="shoping__cart__item__close">
                                <span class="icon_close"></span>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="shoping__cart__btns">
                  <a href="{{route('shops.index')}}" class="primary-btn cart-btn">CONTINUAR COMPRANDO</a>
                  <a href="{{route('carrito.index')}}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                     ACTUALIZAR CARRITO</a>
              </div>
          </div>
          {{-- <div class="col-lg-6">
              <div class="shoping__continue">
                  <div class="shoping__discount">
                      <h5>Discount Codes</h5>
                      <form action="#">
                          <input type="text" placeholder="Enter your coupon code">
                          <button type="submit" class="site-btn">APPLY COUPON</button>
                      </form>
                  </div>
              </div>
          </div> --}}
          <div class="col-lg-6">
              <div class="shoping__checkout">
                  <h5>Total en el carrito</h5>
                  <ul>
                      <li>Subtotal <span>$ {{$total}}</span></li>
                      <li>Total <span>$ {{$total}}</span></li>
                  </ul>
                  <a href="{{route('orders.index')}}" class="primary-btn">CHEQUEAR COMPRA</a>

              </div>
          </div>
      </div>
  </div>
</section>
<!-- Shoping Cart Section End -->

@endsection