@extends('backend.layout')
@section('title','Yönetici Paneli - Ürünler')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products</h3>
                <div align="right"><a href="{{route('products.create')}}">
                        <button class="btn btn-success">Ekle</button>
                    </a></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th scope="col">Id</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Resim</th>
                        <th scope="col">Özellik</th>
                        <th scope="col">Fiyat</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    @foreach($data['products'] as $products)
                        <tr id="item-{{$products->id}}">
                            <td class="sortable">{{$products->id}}</td>
                            <td class="sortable">{{$products->name}}</td>
                            <td ><img width="50" src="{{asset('images/products').'/'.$products->file}}" alt=""></td>
                            <td>{{$products->details}}</td>
                            <td>{{$products->price}}</td>

                            <td width="10"><a href="{{route('products.edit',$products->id)}}"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
                            <td width="10"><a href="javascript:void(0)"><i id="@php echo $products->id @endphp"
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
                        url: "{{route('products.Sortable')}}",
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
                        url: "products/" + destroy_id,
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
