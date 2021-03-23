@extends('backend.layout')
@section('title','Yönetici Paneli - Siparişler')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Siparişler</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>


                        <th scope="col">Id</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Kullanıcı Mail</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Adres</th>
                        <th scope="col">İl</th>
                        <th scope="col">İlçe</th>
                        <th scope="col">Toplam Fiyat</th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                    </thead>

                    <tbody id="sortable">
                    @foreach($orders as $order)
                        <tr id="item-{{$order->user_id}}">
                            <td>{{$order->id}}</td>
                            <td>{{$order->billing_name}}</td>
                            <td>{{$order->billing_email}}</td>
                            <td>{{$order->billing_phone}}</td>
                            <td>{{$order->billing_address}}</td>
                            <td>{{$order->billing_province}}</td>
                            <td>{{$order->billing_district}}</td>
                            <td>{{$order->billing_subtotal}}</td>
                            <td></td>

                            <td width="10"><a href="{{route('order.product',$order->id)}}">Ürünler</a></td>
                            <td width="10"><a href="javascript:void(0)"><i id="{{$order->id}}"
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

                    //routumuz resource oldugu ucun silmeni ajax ile edirik
                    $.ajax({
                        type: "DELETE",
                        url: "category/" + destroy_id,
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
