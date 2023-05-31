@extends('admin.layout.layout')
@section("head")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .data-grid-image img{
            height: 70px;
        }
    </style>
@endsection
@section('content')
    <div class="car"></div>

    <div class="card mb-4">
        <div class="card-header"><strong>Kullanıcılar</strong></div>
        <div class="card-body table-responsive">
              <table id="guzelSanatlarBasvurusDT" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Profil Resmi</th>
                                <th scope="col">Cinsiyet</th>
                                <th scope="col">Uyruk</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Engel Durumu</th>
                                <th scope="col">Aynı Alan</th>
                                <th scope="col">Durum</th>
                                <th scope="col">Onayla</th>
                                <th scope="col">Reddet</th>
                                <th scope="col">Sil</th>

                            </tr>
                            </thead>
                            <tbody class="list">
                            </tbody>
                        </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        $(document).ready(function() {
            $("#btn-new").attr("href", '{{url('admin/guzelSanatlarBasvuru/create')}}')
            var token = '{{csrf_token()}}';
            $("#guzelSanatlarBasvurusDT").DataTable({
                "processing": true, // for show progress bar
                "serverSide": true, // for process server side
                "filter": true, // this is for disable filter (search box)
                "orderMulti": false, // for disable multiple column at once
                "pagingType": "full_numbers",
                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": "{{url('admin/guzelSanatlarBasvuru/get_data')}}",
                    "type": "POST",
                    "datatype": "json"
                },
                "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                    {"defaultContent": "-", "targets": "_all"}
                ],
                scrollCollapse: true,

                fixedColumns:   {
                    left: 1,

                },

                "language": {
                    "paginate": {
                        "next": '<i class="fa-solid fa-caret-right"></i>',
                        "previous": '<i class="fa-solid fa-caret-left"></i>',
                        "first": '<i class="fa-solid fa-backward"></i>',
                        "last": '<i class="fa-solid fa-forward"></i>',
                    },
                    "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                },
                "columns": [
                    { "data": "id", "name": "id", "autoWidth": true },
                    {
                        "render": function(data, type, full, meta) { return '<a  href="{{url('admin/guzelSanatlarBasvuru/show')}}/' + full.id + '">'+full.isim+' '+full.soy_isim+'</a>'; }
                    },
                    {
                        "render": function(data, type, full, meta) {
                            let image = '{{asset('storage/GuzelSanatlarBasvuru')}}/thumbnail/'+full.profil_resmi;
                            let imageUrl = '{{asset('storage/GuzelSanatlarBasvuru')}}/images/'+full.profil_resmi;
                            return '<a class="data-grid-image" href="'+ imageUrl+'"><img src="'+image+'" alt="'+full.isim+' '+full.soy_isim+'"></a>'; }
                    },

                    { "data": "cinsiyet", "name": "cinsiyet", "autoWidth": true },
                    { "data": "uyruk", "name": "uyruk", "autoWidth": true },
                    { "data": "telefon", "name": "telefon", "autoWidth": true },
                    {
                        "render": function(data, type, full, meta) { return full.engel_durumu?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' }
                    },
                    {
                        "render": function(data, type, full, meta) { return full.ayni_alan?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' }

                    },
                    { "data": "durum", "name": "durum", "autoWidth": true },
                    {
                        "render": function(data, type, full, meta) {
                            let onaylandi = full.durum=='{{\App\Models\GuzelSanatlarBasvuru::ONAYLANDI}}';
                            return '<a class="btn btn-outline-success '+(onaylandi?'disabled':'')+'" href="{{url('admin/guzelSanatlarBasvuru/onayla')}}/' + full.id + '"'+(onaylandi?'disabled':'')+'>Onayla</a>'; }
                    },{
                        "render": function(data, type, full, meta) {
                            let reddedildi = full.durum=='{{\App\Models\GuzelSanatlarBasvuru::REDDEDILDI}}';
                            return '<a class="btn btn-outline-danger '+(reddedildi?'disabled':'')+'" href="{{url('admin/guzelSanatlarBasvuru/reddet')}}/' + full.id + '"'+(reddedildi?'disabled':'')+'>Reddet</a>'; }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return "<button class='btn btn-danger' onclick=DeleteData('" + row.id + "'); >Sil</button>";
                        }
                    },
                ]

            });
        });


        function DeleteData(CustomerID) {
            ConfirmDialog("Öğeyi silmek istediğinizden emin misiniz?").done(function() {
                Delete(CustomerID);
            }).fail(function() {
                // the pressed Cancel
            });

        }


        function Delete(Id) {
            var url = '{{url('admin/guzelSanatlarBasvuru/delete')}}'+'/'+Id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'DELETE',
                success: function(data) {
                    if (data) {
                        oTable = $('#guzelSanatlarBasvurusDT').DataTable();
                        oTable.draw();
                    } else {
                        alert("Bir şey yanlış gitti!");
                    }
                }
            });
        }

    </script>
@endpush
