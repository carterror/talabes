@extends('layouts.app')

@section('title')
Carrito de compras
@endsection

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
                <h4 class="@if ($order->status == 'incompleted') bg-danger @elseif($order->status == 'En proceso') bg-warning @elseif($order->status == 'Aprovado') bg-success @endif " style="color: aliceblue; padding: 10px;">Estado de la orden:<span class="icon_tag_alt"></span> <b>{{$order->status}}</b> <a href="{{route('orders.show', $order->customid)}}"> Link Permanente </a></h4>
            </div>
        </div>
        <br>
        <div class="checkout__form">
            <h4>Formulario para la compra por agente en Cuba</h4>
            <form action="{{route('orders.store')}}" method="POST">
                @csrf
                <input type="hidden" name="carrito", value="{{$order->id}}">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nombre<span>*</span></p>
                                    <input type="text" name="recipient_name1" value="{{old('recipient_name1')}}">
                                    @error('recipient_name1')
                                        <p style="color: red;"><span> * </span>{{$errors->first('recipient_name1')}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Apellido<span>*</span></p>
                                    <input type="text" name="recipient_name2" value="{{old('recipient_name2')}}">
                                    @error('recipient_name2')
                                    <p style="color: red;"><span> * </span>{{$errors->first('recipient_name2')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Municipio<span>*</span></p>
                            <input type="text" name="state" value="{{old('state')}}">
                            @error('state')
                                    <p style="color: red;"><span> * </span>{{$errors->first('state')}}</p>
                            @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Dirección<span>*</span></p>
                            <input type="text" name="line1" value="{{old('line1')}}" placeholder="Street Address" class="checkout__input__add">
                            <input type="text" name="line2" value="{{old('line2')}}" placeholder="Apartment, suite, unite ect (optinal)">
                            @error('line1')
                                    <p style="color: red;"><span> * </span>{{$errors->first('line1')}}</p>
                            @enderror
                        </div>
                        {{-- <div class="checkout__input">
                            <p>Provincia<span>*</span></p>
                            <input type="text" name="city">
                        </div> --}}
                        {{-- <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="postal_code">
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                        <p style="color: red;"><span> * </span>{{$errors->first('phone')}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="{{old('email')}}">
                                    @error('email')
                                        <p style="color: red;"><span> * </span>{{$errors->first('email')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div> --}}
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Su Orden</h4>
                            <div class="checkout__order__products">Producto <span>Total</span></div>
                            <ul>
                                @foreach ($products as $item)
                                    <li>{{$item->title}} <span>${{$item->pricing}}</span></li>
                                @endforeach
                            </ul>
                            {{-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> --}}
                            <div class="checkout__order__total">Total <span>${{$total}}</span></div>
                            {{-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            
                                <h3 style="color: red;">IMPORTANTE</h3>
                                <p style="color: red;">
                                Contamos con dos formas de pago mediante PayPal, o mediante nuestros agentes en Cuba.
                                Si desea pagar con su cuenta PayPal marque el siguiente cuadro.
                            </p>
                            {{-- <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal" name="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Encargar</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection