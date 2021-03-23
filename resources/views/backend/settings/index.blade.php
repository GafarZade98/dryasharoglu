@extends('backend.layout')
@section('title','Yönetici Paneli - Ayarlar')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ayarlar</h3>
                <div align="right"><a href="{{route('settings.Create')}}">
                        <button class="btn btn-success">Ekle</button>
                    </a></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">İçerik</th>
                        <th scope="col">Anahtar Değer</th>
                        <th scope="col">Tip</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                    @foreach($data['adminSettings'] as $adminSettings)
                        <tr id="item-{{$adminSettings->id}}">
                            <td>{{$adminSettings->id}}</td>
                            <td class="sortable">{{$adminSettings->settings_descriptions}}</td>
                            <td>
                                @if ($adminSettings->settings_type=="file")
                                <img width="75" src="/images/settings/{{$adminSettings->settings_value}}" alt="">

                                @else
                                    @if(strlen($adminSettings->settings_value)>120)
                                        {!!substr($adminSettings->settings_value,0 ,110)  !!}...
                                        @else
                                        {{ $adminSettings->settings_value}}
                                    @endif

                                @endif
                            </td>
                            <td>{!! $adminSettings->settings_key !!}</td>
                            <td>{!! $adminSettings->settings_keywords !!}</td>
                            <td><a href="{{route('edit.Settings',['id'=>$adminSettings->id])}}"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td>
                                @if($adminSettings->settings_delete)
                                    <a href="javascript:void(0)"><i id="@php echo $adminSettings->id @endphp"
                                                                    class="fa fa-trash-o"></i></a>

                                @endif
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
                        url: "{{route('settings.Sortable')}}",
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
                    location.href = "/nedmin/settings/delete/" + destroy_id;
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
