@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu')
@section('content')

{{--slider--}}
    <section class="page-section no-padding slider">
        <div class="container full-width">
            <div class="main-slider">
                <div class="owl-carousel" id="main-slider">
                    @foreach($data['slider'] as $slider)
                        <div class="item slide3 jumbotron-section jb3 with-overlay" style=" background: #e9e9e9 url(/images/slider/{{$slider->slider_file}}) center center no-repeat;">
                            <div class="caption">
                                <div class="container">
                                    <div class="div-table">
                                        <div class="div-cell">
                                            <div class="caption-content">
                                                <div class="jumbotron text-center">

                                                    <h1 class="jumbotron-title">{{$slider->slider_title}}</h1>
                                                    <p class="jumbotron-text">
                                                        {!! substr($slider->slider_content,0,150) ."..." !!}
                                                    </p>
                                                    <p class="btn-row">
                                                        <a class="btn btn-theme btn-rounded btn-theme-lg" href="@if(strlen($slider->slider_url)>0 )  {{$slider->slider_url}} @else javascript:void(0)  @endif">Daha Fazla</a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

<!-- PAGE -->


<section class="page-section call-to-action border-bottom with-overlay">
    <div class="container">

        <div class="message-box alt2">
            <div class="message-box-inner">
                <a class="btn btn-theme btn-theme-green btn-rounded pull-right" href="{{route('reservation')}}">Randevu al</a>
                <h2>Sağlığınız ile ilgili endişeniz varsa hemen randevu alın</h2>
            </div>
        </div>

    </div>
</section>

<div class="shell">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
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
                                <p>{!! $product->description !!}</p>
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

<!-- PAGE -->
<section class="page-section image call-to-action with-overlay">
    <div class="container">

        <div class="message-box alt">
            <div class="message-box-inner">
                <a class="btn btn-theme btn-theme-green btn-rounded pull-right" href="{{route('reservation')}}">Randevu Al</a>
                <h2>Sağlığınız ile ilgili endişeniz varsa hemen randevu alın</h2>
            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->

<!-- /PAGE -->


<!-- /CONTENT AREA -->
@endsection
