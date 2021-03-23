<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <meta name="geo.position" content="latitude; longitude">
    <meta name="geo.placename" content="place name">
    <meta name="geo.region" content="country subdivision code">
    <meta name="description" content="{{setting('description')}}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <link href="@asset('/assets/plugins/bootstrap/css/bootstrap.min.css' )" rel="stylesheet">
    <link href="@asset('/assets/plugins/bootstrap-select/css/bootstrap-select.min.css')" rel="stylesheet">
    <link href="@asset('/assets/plugins/fontawesome/css/font-awesome.min.css')" rel="stylesheet">
    <link href="@asset('/assets/plugins/prettyphoto/css/prettyPhoto.css')" rel="stylesheet">
    <link href="@asset('/assets/plugins/owl-carousel2/assets/owl.carousel.min.css')" rel="stylesheet">
    <link href="@asset('/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css')" rel="stylesheet">
    <link href="@asset('/assets/plugins/animate/animate.min.css')" rel="stylesheet">
    <link href="@asset('/assets/plugins/swiper/css/swiper.min.css')" rel="stylesheet">
    <link href="@asset('/assets/css/theme.css')" rel="stylesheet">
    <link href="@asset('/assets/css/cart.css')" rel="stylesheet">
    <link href="@asset('/assets/css/product-detail.css')" rel="stylesheet">
    <link href="@asset('/assets/css/theme-color.css')" rel="stylesheet" id="theme-config-link">
    <link href="@asset('/assets/css/product-cart.css')" rel="stylesheet">

    <script src="@asset('/assets/plugins/modernizr.custom.js')"></script>
    <script src="@asset('/assets/plugins/iesupport/html5shiv.js')"></script>
    <script src="@asset('/assets/plugins/iesupport/respond.min.js')"></script>

</head>
<body id="home" class="wide">

<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Yükleniyor</div>
    </div>
</div>


<!-- WRAPPER -->
<div class="wrapper">

    <!-- Popup: Login -->
    <div class="modal fade popup-login" id="popup-login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="container">
                <div class="popup-login-items">
                    <div class="popup-login-items-inner">
                        @guest()
                            <div class="row">
                                <div class="col-md-12 hello-text-wrap">
                                    <span
                                        class="hello-text text-thin">Yeni hesap açmak için kayıt ol tuşuna tıklayın</span>
                                </div>

                                <div class="col-md-12">
                                    <a class="btn btn-theme btn-block btn-icon-left twitter"
                                       href="@route('register')">Kayıt Ol</a>
                                </div>
                                <div class="col-md-12 hello-text-wrap">
                                    <span
                                        class="hello-text text-thin">Bir hesabınız varsa Giriş Yap Butonuna tıklayın</span>
                                </div>
                                <div class="col-md-12">
                                    <a class="btn btn-theme  btn-block btn-icon-left facebook"
                                       href="@route('login') ">Giriş Yap</a>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="container">
            <div class="cart-items">
                <div class="cart-items-inner">
                    @foreach(Cart::content() as $cart_items)
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image"
                                                               src="@asset('images/products/'.$cart_items->options->files)"
                                                               alt=""></a>
                            <p class="pull-right item-price">{{$cart_items->price}} Tl</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title"><a href="#">{{$cart_items->qty}}
                                        x {{$cart_items->name}} </a></h4>
                                <p class="item-desc">{!!substr($cart_items->options->description,0,60) !!}...</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="media">
                        <p class="pull-right item-price">{{Cart::subtotal()}} Tl</p>
                        <div class="media-body">
                            <h4 class="media-heading item-title summary">Toplam ürün fiyatı:</h4>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Kapat</a>
                                        <a href="@route('cart')"
                                          class="btn btn-theme btn-theme-transparent btn-call-checkout">Sepete git</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="header fixed">
    <div class="header-wrapper">
        <div class="container">


            <div class="logo">
                <a href="@route('homepage')"><img src="@asset('images/settings/'.setting('logo'))"
                                                  alt="DrSaddamYasharoglu"/></a>
            </div>

            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>

            <nav class="navigation closed clearfix">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        <ul class="nav sf-menu">
                            <li class="active"><a href="@route('homepage')">Ana Sayfa</a></li>
                            <li><a href="@route('products')">Ürünler</a>
                                <ul>
                                    <x-category/>
                                </ul>
                            </li>
                            <li><a href="@route('about')">Hakkımızda</a></li>
                            <li><a href="@route('contact')">İletişim</a></li>
                            <li>
                                    <span class="shop-button" data-toggle="modal" data-target="#popup-cart">
                                        <span class="shop-button-border">
                                            <span class="shop-item-number">{{Cart::count()}}</span>
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                    </span>
                            </li>
                            @guest()
                                <li>
                                    <span class="sign-in-button icon">
                                        <a href="#" class="" data-toggle="modal" data-target="#popup-login"><i
                                                class="fa fa-user"></i></a>
                                    </span>
                                </li>
                            @endguest

                            @auth()
                                <li>
                                        <span class="sign-in-button icon">
                                        <a href="@route('account')" class="" data-toggle="modal"><i
                                                class="fa fa-user"></i></a>
                                        </span>
                                </li>
                            @endauth

                        </ul>

                    </div>
                </div>
                <div class="swiper-scrollbar"></div>
            </nav>
        </div>
    </div>

</header>
<div class="content-area">
@yield('content')
    <footer class="footer dark">
        <div class="footer-widgets md-padding-top md-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-about">
                            <div class="logo--footer">
                                <a href="@route('homepage')"><img width="200"
                                                                  src="@asset('images/settings/'.setting('logo'))"
                                                                  alt=""></a>
                            </div>
                            <p>{!! setting('address') !!}</p>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Kategoriler</h4>
                            <ul>
                                <x-category/>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Faydalı Linkler</h4>
                            <ul>
                                <li><a href="@route('about')">Hakkımızda</a></li>
                                <li><a href="@route('contact')">İletişim</a></li>
                                <li><a href="@route('reservation')">Randevu</a></li>
                                <li><a href="@route('contract')">Satış Sözleşmesi</a></li>
                                <li><a href="@route('withdrawal')">Cayma Hakkı</a></li>
                                <li><a href="@route('privacy')">Gizlilik Koşulları</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">İletişim Adresi</h4>
                            <p>
                                <strong>Email:</strong> {{setting('mail')}}<br>
                                <strong>Phone:</strong> +{{setting('phone')}}
                            </p>
                            <ul class="social-icons">
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-meta">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="copyright">&copy; Telif Hakkı 2020 <br>Gafar Zade tarafından tasarlanmıştır</div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>

<script src="@asset('/assets/plugins/jquery/jquery-1.11.1.min.js')"></script>
<script src="@asset('/assets/plugins/bootstrap/js/bootstrap.min.js')"></script>
<script src="@asset('/assets/plugins/bootstrap-select/js/bootstrap-select.min.js')"></script>
<script src="@asset('/assets/plugins/superfish/js/superfish.min.js')"></script>
<script src="@asset('/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js')"></script>
<script src="@asset('/assets/plugins/owl-carousel2/owl.carousel.min.js')"></script>
<script src="@asset('/assets/plugins/jquery.sticky.min.js')"></script>
<script src="@asset('/assets/plugins/jquery.easing.min.js')"></script>
<script src="@asset('/assets/plugins/jquery.smoothscroll.min.js')"></script>
<script src="@asset('/assets/plugins/swiper/js/swiper.jquery.min.js')"></script>
<script src="@asset('/assets/js/theme-ajax-mail.js')"></script>
<script src="@asset('/assets/js/theme.js')"></script>
<script src="https://js.stripe.com/v3/"></script>
</body>
</html>
