@extends('backend.layout')
@section('title','Yönetici Paneli - Rezervasyonlar')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Rezervasyonlar</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>


                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Mesaj</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    @foreach($reservations as $reservation)
                        <tr id="item-{{$reservation->id}}">
                            <td class="sortable">{{$reservation->name}}</td>
                            <td class="sortable">{{$reservation->number}}</td>
                            <td class="sortable">{{$reservation->created_at}}</td>
                            <td class="sortable">{{$reservation->message}}</td>
                            <td ><a href="javascript:void(0)"><i id="{{$reservation->id}}"
                                                                 class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        // SILME ISLEMI ILK OLARAQ ICONUN CLASINI GIRIRK ID ATRIBUT VERIRIK DUZGUN OLSA LINKE GEDIR OLMASA ALERT VERIRIK

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme İşlemini Onaylayın', 'Bu işlem geri alınamaz',

                function () {
                    location.href = "/nedmin/reservations/delete/" + destroy_id;
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
