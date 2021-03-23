@extends('backend.layout')
@section('title','Yönetici Paneli - Kullanıcı Düzenle')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="{{route('user.update',$users->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @isset($users->user_file)
                    <div class="form-group">
                        <label>Yüklü Resim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/user/{{$users->user_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="user_file" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>AD Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" value="{{$users->name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="email" name="email"value="{{$users->email}}" class="form-control">
                            </div>
                        </div>
                    </div> <div class="form-group">
                        <label>Parola</label>
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
                                    <option {{$users->role=='admin' ? 'selected=""' : ''}} value="1">Admin</option>
                                    <option {{$users->role=='user' ? 'selected=""' : ''}} value="0">User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="{{$users->user_file}}">

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Düzenle</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
@section('css')@endsection
@section('js')@endsection
