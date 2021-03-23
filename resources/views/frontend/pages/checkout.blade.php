@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Ödeme')
@section('content')

    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="row breadcrumbs-row">
                <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                    <div class="page-header">
                        <h1>Sepet Kontrol</h1>
                    </div>
                </div>
                <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                    <ul class="breadcrumb">
                        <li><i class="fa fa-home"></i> -</li>
                        <li>Sepet</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <br><br>

    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn">


            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <form class="card-body" action="@route('checkout.store')" method="post">
                            @csrf
                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6 ">

                                    <!--firstName-->
                                    <div class="md-form ">
                                        <label for="firstName" class="">Ad Soyad</label>
                                        <input type="text" id="firstName" name="name" class="form-control" value="{{Auth::user()->name}}">
                                    </div>

                                </div>

                                <div class="col-md-6 ">

                                    <!--firstName-->
                                    <div class="md-form ">
                                        <label for="firstName" class="">Telefon</label>
                                        <input type="text" id="firstName" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                                    </div>

                                </div>

                            </div>
                            <!--Grid row-->


                            <!--email-->
                            <div class="md-form mb-5">
                                <label for="email" class="">Email Adresi</label>
                                <input type="" id="email" class="form-control" name="email" disabled value="{{Auth::user()->email}}">

                            </div>

                            <!--address-->
                            <div class="md-form mb-5">
                                <label for="address" class="">Adres</label>
                                <input type="text" id="address" class="form-control" name="address" required value="{{Auth::user()->address}}">

                            </div>



                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-12 mb-4">

                                    <label for="country">İl</label>
                                    <input type="text" id="country" class="form-control" name="province" value="{{Auth::user()->province}}">
                                    <div class="invalid-feedback">
                                        Lütfen geçerli il giriniz.
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="state">İlçe</label>
                                    <input type="text" id="state" class="form-control" name="district" value="{{Auth::user()->district}}">
                                    <div class="invalid-feedback">
                                        Lütfen geçerli ilçe giriniz.
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="zip">Posta kodu</label>
                                    <input type="text" class="form-control" id="zip" name="postcode" value="{{Auth::user()->postcode}}" required>
                                    <div class="invalid-feedback">
                                       Posta kodu gereklidir
                                    </div>

                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <hr>

{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="same-address">--}}
{{--                                <label class="custom-control-label" for="same-address">Shipping address is the same as--}}
{{--                                    my billing address</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="save-info">--}}
{{--                                <label class="custom-control-label" for="save-info">Save this information for next--}}
{{--                                    time</label>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div class="d-block my-3">--}}

{{--                                <div class="custom-control custom-radio">--}}
{{--                                   <p>Kart bilgileri</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-6 mb-3">--}}
{{--                                    <label for="cc-name">Name on card</label>--}}
{{--                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>--}}
{{--                                    <small class="text-muted">Full name as displayed on card</small>--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        Name on card is required--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mb-3">--}}
{{--                                    <label for="cc-number">Credit card number</label>--}}
{{--                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        Credit card number is required--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-3 mb-3">--}}
{{--                                    <label for="cc-expiration">Expiration</label>--}}
{{--                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        Expiration date required--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 mb-3">--}}
{{--                                    <label for="cc-expiration">CVV</label>--}}
{{--                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        Security code required--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <hr class="mb-4">--}}
                            <button class="btn btn-primary btn-lg btn-block"  type="submit">Satın al</button>

                        </form>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!-- Heading -->
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
                    </h4>


                    <!-- Cart -->
                    <ul class="list-group mb-3 z-depth-1">
                        @foreach(Cart::content() as $cart_items)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">

                                <div class="media">
                                    <a class="pull-left" href="#"><img width="60"
                                                                       src="{{asset('images/products').'/'.$cart_items->options->files}}"
                                                                       alt=""></a>
                                    <p class="text-success">{{$cart_items->price}} Tl</p>
                                    <div class="media-body">
                                        <h4 class="media-heading item-title"><a href="#">{{$cart_items->qty}}x {{$cart_items->name}} </a>
                                        </h4>

                                    </div>
                                </div>

                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Ürün fiyat</h6>
                            </div>
                            <span class="text-success">{{$cart_items->priceTarget}} Tl</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">KDV</h6>
                            </div>
                            <span class="text-success">{{Cart::tax()}} Tl</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Gönderim ücreti</h6>
                            </div>
                            <span class="text-success">{{$shipping}} Tl</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Toplam</span>
                            <strong>{{intval(str_replace(",","",Cart::total())) +15}} Tl</strong>
                        </li>
                    </ul>
                    <!-- Cart -->


                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->

    <br><br>

@endsection
