@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Sepet')
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
                        <li><i class="fa fa-home"></i> - </li>
                        <li>Sepet</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@if(Cart::count()>0)
    <div class="wrap cf">

        <div class="heading cf">
            <h1>Ürünlerim</h1>
            <a href="{{route('products')}}" class="continue">Alışveriş et</a>
        </div>
        <div class="special">
            <div class="specialContent">Sepetinizde {{Cart::count()}} adet ürün bulunmaktadır!!<br><br></div>
        </div>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                @if(is_array(session('success_message')))
                    <ul>
                        @foreach (session('success_message') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success_message') }}
                @endif

            </div>
        @endif
        <div class="cart">
            <ul class="cartWrap">
                @foreach(Cart::content() as $cart_items)
                    <li class="items even">
                        <div class="infoWrap">
                            <div class="cartSection info">

                                <img src="{{asset('images/products').'/'.$cart_items->options->files}}" alt="" class="itemImg"/>

                                <p class="itemNumber">#QUE-007544-{{$cart_items->id}}</p>
                                <h3>{{$cart_items->name}}</h3>

                                <select class="quantity" data-id="{{ $cart_items->rowId }}" data-productQuantity="{{ $cart_items->quantity }}">
                                    @for ($i = 1; $i < 20 + 1 ; $i++)
                                        <option {{ $cart_items->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <p> x {{$cart_items->price}} Tl</p>

                                <p class="stockStatus">Stokta var</p>

                            </div>


                            <div class="prodTotal cartSection">
                                <p>{{$cart_items->priceTarget }} Tl</p>
                            </div>

                            <div class="cartSection removeWrap">
                                <form action="{{route('cart.destroy',$cart_items->rowId)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Sil</button>

                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>

        {{--        <div class="promoCode"><label for="promo">Have A Promo Code?</label><input type="text" name="promo"--}}
{{--                                                                                   placeholder="Enter Code"/>--}}
{{--            <a href="#" class="btn"></a></div>--}}

        <div class="subtotal cf">
            <ul>
                <li class="totalRow"><span class="label">Ürün fiyatı+KDV</span><span class="value">{{Cart::subtotal()}} Tl</span></li>
                <li class="totalRow"><span class="label">Kdv</span><span class="value">{{Cart::tax()}} Tl</span></li>
                <li class="totalRow"><span class="label">Gönderim ücreti</span><span class="value">{{(int)$shipping}} Tl</span></li>
                <li class="totalRow final"><span class="label">Toplam</span><span class="value">{{intval(str_replace(",","",Cart::total()))+(int)$shipping}}   Tl</span></li>
                <li class="totalRow"><a href="{{route('checkout')}}" class="btn-b continue">Ödeme</a></li>
            </ul>
        </div>
    </div>


@else
    <div class="heading cf">
        <h1>Ürünlerim</h1>
        <a href="{{route('products')}}" class="continue">Alışveriş et</a>
    </div>
    <div class="special">
        <div class="specialContent">Sepetinizde ürün bulunmamaktadır!!<br><br></div>
    </div>
@endif

    <h1 class="projTitle">Diğer Ürünler</h1>
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

                                        <div class="wcf-right"><button type="submit"><span class="shop-button-border">
                                    <i class="fa fa-shopping-cart"></i></span></button></div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function () {

                    const id = element.getAttribute('data-id')
                    // const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        // productQuantity: productQuantity
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart') }}'
                        })
                        .catch(function (error) {
                            console.log(error);
                            {{--window.location.href = '{{ route('cart.index') }}'--}}
                        });
                })
            })
        })();
    </script>

@endsection
