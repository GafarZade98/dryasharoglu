@extends('backend.layout')
@section('title','Yönetici Paneli - Kategori düzenle')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kategori Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="{{route('category.update',$categories->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label>İsim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" value="{{$categories->name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slug" value="{{$categories->slug}}" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Sayfada Yayınlama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="featured" class="form-control" id="">
                                    <option {{$categories->featured=='1' ? 'selected=""' : ''}} value="1">Göster</option>
                                    <option {{$categories->featured=='0' ? 'selected=""' : ''}} value="0">Gösterme</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="status" class="form-control" id="">
                                    <option {{$categories->status=='1' ? 'selected=""' : ''}} value="1">Aktif</option>
                                    <option {{$categories->status=='0' ? 'selected=""' : ''}} value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Düzenle</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
@section('css')@endsection
@section('js')@endsection
