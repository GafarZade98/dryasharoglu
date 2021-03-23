@extends('backend.layout')
@section('title','Yönetici Paneli - Kullanıcılar')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Users</h3>
                <div align="right"><a href="{{route('user.create')}}">
                        <button class="btn btn-success">Ekle</button>
                    </a></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th scope="col">Görsel</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Kullanıcı Adı</th>
                        <th scope="col"></th>
{{--                        <th scope="col"></th>--}}
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    @foreach($data['user'] as $user)
                        <tr id="item-{{$user->id}}">
                            <td class="sortable" width="150"><img width="125" src="/images/user/{{$user->user_file}}" alt=""></td>
                            <td class="sortable">{{$user->name}}</td>
                            <td class="sortable">{{$user->email}}</td>

                            <td width="10"><a href="{{route('user.edit',$user->id)}}"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
{{--                            <td width="10"><a href="javascript:void(0)"><i id="{{$user->id}}"--}}
{{--                                                                           class="fa fa-trash-o"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    const data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('user.Sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem başarılı...");
                            } else {
                                alertify.error("İşlem başarısız...");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });

        // SILME ISLEMI ILK OLARAQ ICONUN CLASINI GIRIRK ID ATRIBUT VERIRIK DUZGUN OLSA LINKE GEDIR OLMASA ALERT VERIRIK

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme İşlemini Onaylayın', 'Bu işlem geri alınamaz',

                function () {

                    //routumuz resource oldugu ucun silmeni ajax ile edirik
                    $.ajax({
                        type: "DELETE",
                        url: "user/" + destroy_id,
                        success: function (msg) {
                            if (msg) {
                                $("#item-" + destroy_id).remove();
                                alertify.success("Silme İşlemi Başarılı");

                            } else {
                                alertify.error("İşlem Tamamlanamadı");
                            }
                        }
                    });

                },
                function () {
                    alertify.error('Silme işlemi iptal edildi.')
                }
            )
        });


    </script>




@endsection
@section('css')@endsection
@section('js')@endsection
