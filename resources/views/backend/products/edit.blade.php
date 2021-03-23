@extends('backend.layout')
@section('title','Yönetici Paneli - Ürün Düzenle')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="{{route('products.update',$products->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @isset($products->file)
                        <div class="form-group">
                            <label>Yüklü Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="75" src="{{asset('images/products').'/'.$products->file}}" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <label>Kategori</label>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <select name="status" class="form-control" id="">--}}
{{--                                    @foreach($categories as $categories)--}}
{{--                                        <option value="">{{$categories->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label>İsim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="name" value="{{$products->name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="slug" value="{{$products->slug}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Özellik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="details">{{$products->details}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fiyat</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="number" name="price" value="{{$products->price}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1"
                                          name="description">{{$products->description}}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="status" class="form-control" id="">
                                    <option {{$products->status=='1' ? 'selected=""' : ''}} value="1">Aktif</option>
                                    <option {{$products->status=='0' ? 'selected=""' : ''}} value="0">Pasif</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="{{$products->file}}">

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Düzenle</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
@section('css')@endsection
@section('js')@endsection
