@extends('backend.layout')
@section('title','Yönetici Paneli - Mesajlar')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Mesajlar</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">Mesaj</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody id="sortable">
                        @foreach($messages as $message)
                            <tr id="item-{{$message->id}}">
                                <td class="sortable">{{$message->name}}</td>
                                <td class="sortable">{{$message->email}}</td>
                                <td class="sortable">{{$message->message}}</td>
                                <td><a href="javascript:void(0)"><i id="{{$message->id}}"
                                                                    class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript">

        // SILME ISLEMI ILK OLARAQ ICONUN CLASINI GIRIRK ID ATRIBUT VERIRIK DUZGUN OLSA LINKE GEDIR OLMASA ALERT VERIRIK

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme İşlemini Onaylayın', 'Bu işlem geri alınamaz',

                function () {
                    location.href = "/nedmin/messages/delete/" + destroy_id;
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
