@extends('backend.layout')
@section('title','Yönetici Paneli - Kullanıcı Ekle')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Ekle</h3>
            </div>

            <div class="box-body">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="user_file" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                       <div class="form-group">
                        <label>Şifre</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="role" class="form-control" id="">
                                    <option value="admin">Admin</option>
                                    <option value="user">Kullanıcı</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Ekle</button>
                    </div>

                </form>
            </div>
        </div>
    </section>


@endsection
@section('css')@endsection
@section('js')@endsection
