    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:talabas.soporte@gmail.com" target="_blank">talabas.soporte@gmail.com</a></li>
                                <li>Envío gratis para todos los pedidos de $ 99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{route('todo')}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="tg://msg_url?url={{route('todo')}}&text=Mi pagina de ventas" target="_blank"><i class="fa fa-telegram"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{route('todo')}}&text=Mi pagina de ventas" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="whatsapp://send?text=Mira lo que he encontrado {{route('todo')}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            @if (Route::has('login'))
                                <div class="header__top__right__auth">
                                    @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                    @else
                                        <a href="{{ route('login') }}" class="fa fa-user"> Entrar </a>
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{request()->routeIs('todo') ? 'active' : ''}}"><a href="{{ route('todo') }}">Inicio</a></li>
                            <li class="{{request()->routeIs('shops.*') ? 'active' : ''}}"><a href="{{ route('shops.index') }}">Tienda</a></li>
                            <li class="{{request()->routeIs('products.*') ? 'active' : ''}}"><a href="#">Otros</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route('products.index') }}">Productos</a></li>
                                    <li><a href="{{route('carrito.index')}}">Carrito de compras</a></li>
                                    <li><a href=".{{route('orders.index')}}">Ordenes</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li ><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                            <li><a href="{{route('carrito.index')}}"><i class="fa fa-shopping-cart"></i> <span>{{$shopping_cart->productsSize()}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Total: <span>$ {{$shopping_cart->total()}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categoréas</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Todas las categorias
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Qué necesitas?">
                                <button type="submit" class="site-btn">Buscar</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><a href="https://msng.link/o/?CT3rroR=tg" target="_blank">Telegram</a></h5>
                                <span>Soporte 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->