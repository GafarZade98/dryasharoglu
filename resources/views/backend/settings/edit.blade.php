@extends('backend.layout')
@section('title','Yönetici Paneli - Ayar Düzenle')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>

            <div class="box-body">
                <form action="{{route('settings.Update',['id'=>$settings->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" readonly
                                       value="{{$settings->settings_descriptions}}">
                            </div>
                        </div>
                    </div>

                    @if($settings->settings_type=="file")
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="settings_value" required class="form-control">
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                @if($settings->settings_type=="text")
                                    <input class="form-control" name="settings_value"
                                           value="{{$settings->settings_value}}">
                                @endif

                                @if($settings->settings_type=="textarea")
                                    <textarea class="form-control"
                                              name="settings_value"> {{$settings->settings_value}}</textarea>
                                @endif

                                @if($settings->settings_type=="ckeditor")
                                    <textarea name="settings_value"
                                              id="editor1"> {{$settings->settings_value}}</textarea>
                                @endif
                                    @if($settings->settings_type=="file")
                                        <img width="100" src="/images/settings/{{$settings->settings_value}}" alt="">
                                @endif

                            </div>
                        </div>
                    </div>
{{--                    yuklenen sekli tekar etmemek ucun silme --}}
                    @if($settings->settings_type=="file")
                        <input type="hidden" name="old_file" value="{{$settings->settings_value}}">
                    @endif

                    <div align="right" class="box-footer">
                        <button class="btn btn-success">Güncelle</button>
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
