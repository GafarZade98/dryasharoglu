@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Ürünler')
@section('content')
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1>Arama Sonuçları</h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> -</li>
                            <li>Ürünler</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">
                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar" id="sidebar">
                        <!-- widget search -->
                        <form action="{{ route('search') }}" method="GET" class="search-form">
                            <div class="widget">
                                <div class="widget-search">
                                    <input class="form-control" type="text" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Ara">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <!-- /widget search -->
                        <!-- widget theme categories -->
                        <div class="widget shadow car-categories">
                            <h4 class="widget-title">Kategoriler</h4>
                            <div class="widget-content">
                                <ul class="sidebar">
                                    @foreach($categories as $category)
                                        <li class="{{ request()->category==$category->slug ? 'active' : ''}}">
                                            <a href="{{route('products',['category' => $category->slug])}}">{{$category->name}}</a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- /widget theme categories -->
                        <!-- widget helping center -->
                        <div class="widget shadow widget-helping-center">
                            <h4 class="widget-title">Yardım İste</h4>
                            <div class="widget-content">
                                <p>Ürünler hakkında bilgi almak için bizimle iletişime geçin</p>
                                <h5 class="widget-title-sub">{{setting('phone')}}</h5>
                                <p><a href="mailto:{{setting('mail')}}">{{setting('mail')}}</a></p>
                                <div class="button">
                                    <a href="{{route('contact')}}"
                                       class="btn btn-block btn-theme btn-theme-dark">Destek</a>
                                </div>
                            </div>
                        </div>
                        <!-- /widget helping center -->
                        <!-- widget tabs -->
                        <div class="widget widget-tabs alt">
                            <div class="widget-content">
                                <ul id="tabs" class="nav nav-justified">
                                    <li><a href="#tab-s1" data-toggle="tab">Recent posts</a></li>
                                    <li class="active"><a href="#tab-s2" data-toggle="tab">Popular post</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!-- tab 1 -->
                                    <div class="tab-pane fade" id="tab-s1">
                                        <div class="recent-post">
                                            @foreach($likealsothat as $recentpost)
                                                <div class="media">

                                                    <a class="pull-left media-link" href="#">
                                                        <img class="media-object" width="100"
                                                             src="@asset('images/products/'.$recentpost->file)"
                                                             alt="">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="media-meta">
                                                            {{ $recentpost->created_at}}

                                                        </div>
                                                        <div>
                                                            {{ $recentpost->name}}
                                                        </div>
                                                        <h4 class="media-heading"><a
                                                                href="#">{!! substr($recentpost->description,0,50)  !!}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- tab 2 -->
                                    <div class="tab-pane fade in active" id="tab-s2">
                                        <div class="recent-post">
                                            <div class="media">
                                                @foreach($likealsothat as $recentpost)
                                                    <div class="media">

                                                        <a class="pull-left media-link" href="#">
                                                            <img class="media-object" width="100"
                                                                 src="@asset('images/products/'.$recentpost->file)"
                                                                 alt="">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-meta">
                                                                {{ $recentpost->created_at}}

                                                            </div>
                                                            <div>
                                                                {{ $recentpost->name}}
                                                            </div>
                                                            <h4 class="media-heading"><a
                                                                    href="#">{!! substr($recentpost->description,0,50)  !!}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /widget tabs -->
                                    <!-- widget archives -->
                                    <!-- /widget twitter -->
                                    <!-- widget tag cloud -->
{{--                                    <div class="widget widget-tag-cloud" style="padding-top: 25px">--}}
{{--                                        <h4 class="widget-title"><span>Tags</span></h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#">Clean</a></li>--}}
{{--                                            <li><a href="#">Modern</a></li>--}}
{{--                                            <li><a href="#">Business</a></li>--}}
{{--                                            <li><a href="#">Corporate</a></li>--}}
{{--                                            <li><a href="#">Minimal</a></li>--}}
{{--                                            <li><a href="#">Photography</a></li>--}}
{{--                                            <li><a href="#">Fashion</a></li>--}}
{{--                                            <li><a href="#">One Page</a></li>--}}
{{--                                            <li><a href="#">Personal</a></li>--}}
{{--                                            <li><a href="#">Shop</a></li>--}}
{{--                                            <li><a href="#">Elegant</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                                    <!-- /widget tag cloud -->

                                </div>
                            </div>
                        </div>
                    </aside>


                    <!-- /SIDEBAR -->

                    <!-- CONTENT -->
                    <div class=" content" id="content" style="margin-left: 150px">

                        <div class=" content-area">
                            <div class="shell">
                                <div class=" container">

                                    <div class="row">

                                        <p class="search-results-count"> '{{ request()->input('query') }}' araması için {{ $products->total() }} sonuç bulundu. </p>

                                        @if ($products->total() > 0)
                                            <div class="table-responsive">


                                            <table id="products-table" class="table table-bordered table-striped table-sm" style="overflow-y:scroll">
                                                <thead>
                                                <tr>
                                                    <th scope="row">Ürün Adı</th>
                                                    <th>Ürün detayı</th>
                                                    <th>Ürün Açıklaması</th>
                                                    <th>Fiyat</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <th ><a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a></th>
                                                        <td>{{ substr($product->details,0,20) }}</td>
                                                        <td >{{ substr($product->description,0, 50) }}</td>
                                                        <td>{{ $product->price}} Tl</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pagination-wrapper">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->

    </div>

    <style>
        #products-table
        {
            width: 800px;
            overflow:scroll;
        }
        .sidebar li.active {
            font-weight: 500;
        }

        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 10px;
            border-radius: 4px;
        }

        .pagination > li {
            display: inline;
        }

        .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
            background-color: #f4f4f4;
            border-color: #DDDDDD;
            color: inherit;
            cursor: default;
            z-index: 2;
        }

        .pagination > li:first-child > a, .pagination > li:first-child > span {
            margin-left: 10px;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination > li > a, .pagination > li > span {
            background-color: #FFFFFF;
            border: 1px solid #DDDDDD;
            color: inherit;
            float: left;
            line-height: 1.42857;
            margin: 5px;
            padding: 16px 22px;
            position: relative;
            text-decoration: none;
        }

        .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover {
            z-index: 2;
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }</style>
@endsection
