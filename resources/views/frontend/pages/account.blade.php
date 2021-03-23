@extends('frontend.layout')
@section('title','Dr. Saddam Yaşaroğlu - Hesabım')
@section('content')



    <hr>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1>{{$data->name}}</h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->


                <ul class="list-group">

                    <li class="list-group-item text-right"><a href=" {{route('cart')}}"><span class="pull-left"><strong>Sepetim</strong></span> {{Cart::count()}}
                        </a></li>
{{--                    <li class="list-group-item text-right"><span--}}
{{--                            class="pull-left"><strong>Aldığım Ürünler</strong></span> 0--}}
{{--                    </li>--}}
                    {{--                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> -</li>--}}
                    <li class="list-group-item text-right"><span class="pull-left"><strong>
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Çıkış Yap') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                        </strong></span> -
                    </li>
                </ul>


            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">

                    {{--                <li class="active"><a data-toggle="tab" href="#messages">Genel Ayar</a></li>--}}
                    <li class="active"><a data-toggle="tab" href="#settings">Teslimat Adresi</a></li>
                </ul>


                <div class="tab-content">


                    {{--                <div class="tab-pane active" id="messages">--}}

                    {{--                    <h2></h2>--}}

                    {{--                    <hr>--}}
                    {{--                    <form class="form" action="@route('user.info.update',$data->id)" method="post" id="registrationForm">--}}
                    {{--                        @csrf--}}
                    {{--                        @method('PUT')--}}

                    {{--                        <div class="form-group">--}}

                    {{--                            <div class="col-xs-6">--}}
                    {{--                                <label for="first_name"><h4>Ad Soyad</h4></label>--}}
                    {{--                                <input type="text" class="form-control" name="name" value="{{$data->name}}" id="first_name" placeholder="first name" title="enter your first name if any.">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="form-group">--}}

                    {{--                            <div class="col-xs-6">--}}
                    {{--                                <label for="email"><h4>Email</h4></label>--}}
                    {{--                                <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" disabled title="Mail adresi değişemez">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="form-group">--}}

                    {{--                            <div class="col-xs-6">--}}
                    {{--                                <label for="password"><h4>Şifre</h4></label>--}}
                    {{--                                <input type="password" class="form-control" name="password" id="password" placeholder="Şifreniz..." title="Değişrimek istediğiniz şifreyi girin">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="form-group">--}}

                    {{--                            <div class="col-xs-6">--}}
                    {{--                                <label for="password2"><h4>Şifre tekar</h4></label>--}}
                    {{--                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Şifreyi tekrarla..." title="Şifreyi tekrar girin">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <input type="hidden" name="role" value="user">--}}
                    {{--                        <input type="hidden" name="email" value="{{$data->email}}">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <div class="col-xs-12">--}}
                    {{--                                <br>--}}
                    {{--                                <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Kaydet</button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                    </form>--}}

                    {{--                </div><!--/tab-pane-->--}}


                    <div class="tab-pane active" id="settings">
                        <form class="form" action="@route('user.address.update',$data->id)" method="post"
                              id="registrationForm">
                            @csrf

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Ad Soyad</h4></label>
                                    <input type="text" class="form-control" name="name" id="first_name"
                                           value="{{$data->name}}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Telefon</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           value="{{$data->phone}}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>İl</h4></label>
                                    <input type="text" class="form-control" id="location" name="province"
                                           value="{{$data->province}}" title=" Lütfen geçerli il giriniz.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>İlçe</h4></label>
                                    <input type="text" class="form-control" name="district" id="password"
                                           value="{{$data->district}}" title=" Lütfen geçerli ilçe giriniz.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Adres</h4></label>
                                    <input type="text" class="form-control" name="address" id="password2"
                                           value="{{$data->address}}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="text"><h4>Posta Kodu</h4></label>
                                    <input type="text" class="form-control" name="postcode" id="password2"
                                           value="{{$data->postcode}}" title="Lütfen geçerli posta kodu giriniz.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Kaydet
                                    </button>
                                    <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

    <br><br>
    @if(session()->has('success'))
        <script>
            alertify.success('{{session('success')}}')
        </script>
    @endif
    @if(session()->has('error'))
        <script>
            alertify.error('{{session('error')}}')
        </script>
    @endif

    @foreach($errors->all() as $error)
        <script>
            alertify.error('{{$error}}');
        </script>
    @endforeach

    <script>
        $(document).ready(function () {


            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function () {
                readURL(this);
            });
        });
    </script>
@endsection
