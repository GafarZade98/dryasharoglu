@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Gizlilik Politikası')
@section('content')

    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="row breadcrumbs-row">
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-push-4 col-page-header">
                        <div class="page-header">
                            <h1>Gizlilik Koşulları</h1>
                        </div>
                    </div>
                    <div class="col-xs-8 col-xs-push-2 col-md-4 col-md-pull-4 col-md-push-0 col-breadcrumb">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i> -</li>
                            <li>Gizlilik Koşulları</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p>
                            {!!setting('privacy')!!}
                        </p>
                    </div>
                </div>
            </div>
        </section>


@endsection
