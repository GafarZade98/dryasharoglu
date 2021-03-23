@extends('backend.layout')

@section('title','Yönetici Paneli - Sipariş Ürünleri')

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
                            <th scope="col">Ürün Ismi</th>
                            <th scope="col">Ürün Adedi</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

