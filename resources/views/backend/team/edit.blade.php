@extends('backend.layout')
@section('title','Yönetici Paneli - Team Düzenle')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Team Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="{{route('team.update',$teams->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @isset($teams->team_file)
                    <div class="form-group">
                        <label>Yüklü Resim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/team/{{$teams->team_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="team_file" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="team_name" value="{{$teams->team_name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="team_slug"value="{{$teams->team_slug}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Görev</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="team_mission" value="{{$teams->team_mission}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="team_status" class="form-control" id="">
                                    <option {{$teams->team_status=='1' ? 'selected=""' : ''}} value="1">Aktif</option>
                                    <option {{$teams->team_status=='0' ? 'selected=""' : ''}} value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="old_file" value="{{$teams->team_file}}">

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
