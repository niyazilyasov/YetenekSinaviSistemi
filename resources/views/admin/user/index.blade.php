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
              <table id="usersDT" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">kullanıcı adı</th>
                                <th scope="col">resim</th>
                                <th scope="col">email</th>
                                <th scope="col">ad</th>
                                <th scope="col">soyad</th>
                                <th scope="col">telefon</th>
                                <th scope="col">tc_numarasi</th>
                                <th scope="col">yönetici mi</th>
                                <th scope="col">Düzenle</th>
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
            $("#btn-new").attr("href", '{{url('admin/user/create')}}')
            var token = '{{csrf_token()}}';
            $("#usersDT").DataTable({
                "autoWidth": true,
                "processing": true, // for show progress bar
                "serverSide": true, // for process server side
                "filter": true, // this is for disable filter (search box)
                "orderMulti": false, // for disable multiple column at once
                "pagingType": "full_numbers",
                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": "{{url('admin/user/get_data')}}",
                    "type": "POST",
                    "datatype": "json"
                },
                "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                    // {"defaultContent": "-", "targets": "_all"}
                ],
                "language": {
                    "paginate": {
                        "next": '<i class="fa fa-greater-than"></i>',
                        "previous": '<i class="fa fa-less-than"></i>',
                        "first": '<i class="fa fa-less-than"></i><i class="fa fa-less-than"></i>',
                        "last": '<i class="fa fa-greater-than"></i><i class="fa fa-greater-than"></i>',
                    },
                    "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                },
                "columns": [
                    { "data": "id", "name": "id", "autoWidth": true },
                    {

                        "render": function(data, type, full, meta) { return '<a  href="{{url('admin/user/show')}}/' + full.id + '">'+full.name+'</a>'; }
                    },
                    {
                        "render": function(data, type, full, meta) {
                            let image = '{{asset('storage/')}}/thumbnail/'+full.image_url;
                            let imageUrl = '{{asset('storage/')}}/images/'+full.image_url;
                            return '<a class="data-grid-image" href="'+ imageUrl+'"><img src="'+image+'" alt="'+full.name+'"></a>'; }
                    },


                    { "data": "email", "name": "email", "autoWidth": true },
                    { "data": "ad", "name": "ad", "autoWidth": true },
                    { "data": "soyad", "name": "soyad", "autoWidth": true },
                    { "data": "telefon", "name": "telefon", "autoWidth": true },
                    { "data": "tc_numarasi", "name": "tc_numarasi", "autoWidth": true },
                    {
                        "render": function(data, type, full, meta) { return full.is_super_admin?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' }
                    },
                    {
                        "render": function(data, type, full, meta) { return '<a class="btn btn-info" href="{{url('admin/user/edit')}}/' + full.id + '">Düzenle</a>'; }
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
            var url = '{{url('admin/user/delete')}}'+'/'+Id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'DELETE',
                success: function(data) {
                    if (data) {
                        oTable = $('#usersDT').DataTable();
                        oTable.draw();
                    } else {
                        alert("Bir şey yanlış gitti!");
                    }
                }
            });
        }

    </script>
@endpush
