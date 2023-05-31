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
        <div class="card-header"><strong>Duyururlar</strong></div>
        <div class="card-body table-responsive">
              <table id="duyurusDT" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Baslık</th>
                                <th scope=col>created_at</th>
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
            $("#btn-new").attr("href", '{{url('admin/duyuru/create')}}')
            var token = '{{csrf_token()}}';
            $("#duyurusDT").DataTable({
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
                    "url": "{{url('admin/duyuru/get_data')}}",
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

                        "render": function(data, type, full, meta) { return '<a  href="{{url('admin/duyuru/show')}}/' + full.id + '">'+full.baslik+'</a>'; }
                    },
                    { "data": "created_at", "name": "created_at", "autoWidth": true },

                    {
                        "render": function(data, type, full, meta) { return '<a class="btn btn-outline-success" href="{{url('admin/duyuru/edit')}}/' + full.id + '">Düzenle</a>'; }
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
            var url = '{{url('admin/duyuru/delete')}}'+'/'+Id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'DELETE',
                success: function(data) {
                    if (data) {
                        oTable = $('#duyurusDT').DataTable();
                        oTable.draw();
                    } else {
                        alert("Bir şeyler yanlış gitti!");
                    }
                }
            });
        }

    </script>
@endpush
