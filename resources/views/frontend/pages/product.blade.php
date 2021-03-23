@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Ürünler')
@section('content')

    <style>
        .img-div {
            width: 600px;
            height: 600px;
        }

        .img-div img {
            width: 100%;
            height: 700px;
            object-fit: contain;
        }
    </style>
    <section id="services" class="services section-bg">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <div class="img-div img-responsive">
                        <img src="{{asset('images/products').'/'.$product->file}}"
                             class="img-responsive" alt="">
                    </div>

                </div>
                <div class="col-md-6">
                    <form action="{{route('cart.store')}}" method="post" accept-charset="utf-8">
                        <div class="_product-detail-content">
                            <p class="_p-name">{{$product->name}} </p>
                            <div class="_p-price-box">
                                <div class="p-list">
                                    <span class="price">  Ücret : </span> <span><del style="color: red;font-size: 22px"> {{$product->price * 1.23}} TL   </del></span>
                                    <span class="price">   {{ $product->price}} <i
                                            class="fa fa-turkish-lira"></i> </span>
                                </div>
                                <div class="_p-add-cart">
                                    <div class="_p-qty">
                                        <span>Say</span>
                                        <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                                        <input type="number" name="qty" id="number" value="1"/>
                                        <div class="value-button increase_" id="" value="Increase Value">-</div>
                                    </div>
                                </div>
                                <div class="_p-features">
                                    <span> Ürün Açıklaması </span>
                                    {!! $product->description !!}
                                </div>

                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <input type="hidden" name="file" value="{{$product->file}}">
                                <input type="hidden" name="description" value="{{$product->description}}">

                                <ul class="spe_ul"></ul>
                                <div class="_p-qty-and-cart">
                                    <div class="_p-add-cart">
                                        <button class="btn-theme btn buy-btn" tabindex="0">
                                            <i class="fa fa-shopping-cart"></i> Satın Al
                                        </button>
                                        <button class="btn-theme btn btn-success" type="submit" tabindex="0">
                                            <i class="fa fa-shopping-cart"></i> Sepete Ekle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <section class="sec bg-light">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 title_bx ">
                    <h3 class="title "> Diğer Ürünler</h3>
                </div>
            </div>
        </div>
    </section>
    {{--    Benzer urunler--}}
    <div class="shell">
        <div class="container">
            <div class="row">
                @foreach($likealsothat as $product)
                    <div class="col-md-3">
                        <div class="wsk-cp-product">
                            <div class="wsk-cp-img">
                                <a href="{{route('product',$product->slug)}}"><img
                                        src="{{asset('images/products').'/'.$product->file}}"
                                        alt="Product" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="wsk-cp-text">
                                <div class="category">
                                    <span>{{$product->name}}</span>
                                </div>
                                <div class="title-product">
                                    <a href="#"><h3>{{$product->details}}</h3></a>
                                </div>
                                <div class="description-prod">
                                    <p>{!!$product->description!!}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="wcf-left"><span class="price">{{$product->price}} Tl</span></div>
                                    <form action="{{route('cart.store')}}" method="post" accept-charset="utf-8">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <input type="hidden" name="file" value="{{$product->file}}">
                                        <input type="hidden" name="description" value="{{$product->description}}">
                                        <input type="hidden" name="qty" value="1">

                                        <div class="wcf-right">
                                            <button type="submit"><span class="shop-button-border">
                                    <i class="fa fa-shopping-cart"></i></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
