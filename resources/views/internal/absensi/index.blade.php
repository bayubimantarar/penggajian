@extends('internal.layouts.app')

@section('title', 'PT. Techno Multi Utama | Internal &raquo; Absensi')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Absensi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a onclick="create()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Tambah data absensi
                </a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="absensi-table">
                        <thead>
                            <tr>
                                <th width="100">NIK</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form tambah data absensi</h4>
            </div>
            <form id="modal-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">Upload file (xls, xlsx, csv)</label>
                                <input type="file" name="excel" id="excel">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary store_button">Upload</button>
                </div>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@push('js')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

    <script>
        var absensi_table = $('#absensi-table').DataTable({
                                    serverSide: true,
                                    processing: true,
                                    ajax: '/internal/absensi/data_absensi',
                                    columns: [
                                        {data: 'nik'}
                                    ]
                                });

        function create()
        {
            $('#modal-form')[0].reset();
            $('#create-modal').modal('show');
        }

        $('.store_button').click(function(){
            var file_data = $('#excel').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                },
                url: "/internal/absensi/store",
                type: "post",
                data: form_data,
                dataType: 'json',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success:function(data){
                    console.log(data);
                }
            });

            $('#create-modal').modal('hide');
            alert('Data berhasil disimpan!');
            absensi_table.ajax.reload();
        })
    </script>
@endpush