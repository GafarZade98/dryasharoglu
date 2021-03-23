@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Hakkımızda')
@section('content')



    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1>Bizi Tanıyın</h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> - </li>
                            <li>Hakkımızda</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <img class="img-responsive" src="images/settings/{{setting('hakkimizda_file')}}" alt=""/>
                        <hr class="page-divider transparent">
                        <h2 class="section-title sm-margin">Bizim Hakkımızda</h2>
                        <p>{!! setting('about') !!}</p>
                    </div>
                </div>
                <hr class="page-divider">
                <hr class="page-divider transparent">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="section-title sm-margin text-left">Misyonumuz</h2>
                        <p>{!! setting('mission') !!}</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title sm-margin text-left">Vizyonumuz</h2>
                        <p>{!! setting('vision') !!}</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
{{--        <section class="page-section light">--}}
{{--            <div class="container">--}}

{{--                <h2 class="section-title">--}}
{{--                    <span>Our <span class="text-color">Awesome</span> Team</span>--}}
{{--                    <small>meet with our awesome team members</small>--}}
{{--                </h2>--}}

{{--                <div class="row">--}}
{{--                    @foreach($data['teams'] as $team)--}}
{{--                    <div class="col-md-3 col-sm-6">--}}
{{--                        <div class="thumbnail thumbnail-team no-border no-padding">--}}
{{--                            <div class="media">--}}
{{--                                <a href="#"><img src="assets/img/preview/team/team-270x345x1.jpg" alt=""/></a>--}}
{{--                            </div>--}}
{{--                            <div class="caption">--}}
{{--                                <h4 class="caption-title">--}}
{{--                                    <a href="#">{{$team->team_name}}</a>--}}
{{--                                    <small>{{$team->team_mission}}</small>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </section>--}}
        <!-- /PAGE -->

        <!-- PAGE -->
{{--        <section class="page-section no-padding">--}}
{{--            <div class="row half-row">--}}

{{--                <div class="col-sm-6 half-div color">--}}
{{--                    <div class="half-inner">--}}

{{--                        <h2 class="section-title text-left md-margin icon-left">--}}
{{--                            <span>Our Clients</span>--}}
{{--                            <small>some of our great customers who use our templtes</small>--}}
{{--                        </h2>--}}

{{--                        <div class="partners-carousel alt">--}}
{{--                            <div class="owl-carousel" id="partners-alt">--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-1.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-2.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-3.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-4.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-5.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-6.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-1.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-2.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-3.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-4.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-5.jpg" alt=""/></a></div>--}}
{{--                                <div><a href="#"><img src="assets/img/preview/partners/brand-logo-6.jpg" alt=""/></a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div><!-- /.half-div -->--}}


{{--        <div class="col-sm-6 half-div image">--}}
{{--            <div class="half-inner">--}}

{{--                <div class="form-subscribe-wrapper alt">--}}

{{--                    <h4 class="form-subscribe-title">SUBSCRIBE TO OUR NEWSLETTER</h4>--}}
{{--                    <p class="form-subscribe-text">--}}
{{--                        Subscribe to our newsletter for latest News, Updates,--}}
{{--                        Templates directly in your inbox.--}}
{{--                    </p>--}}

{{--                    <!-- Subscribe form -->--}}
{{--                    <form action="#" class="form-subscribe alt" id="form-subscribe">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="formSubscribeEmail" class="sr-only">Enter your email address</label>--}}
{{--                            <input type="email" class="form-control" name="formSubscribeEmail" id="formSubscribeEmail"--}}
{{--                                   placeholder="Enter your email here" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-submit btn-theme">Subscribe Today</button>--}}
{{--                    </form>--}}
{{--                    <!-- Subscribe form -->--}}

{{--                    <p class="form-subscribe-text-sm">* We don’t share any of your information to others</p>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div><!-- /.half-div -->--}}
{{--            </div><!-- /.half-row -->--}}
{{--        </section>--}}
        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->


@endsection
