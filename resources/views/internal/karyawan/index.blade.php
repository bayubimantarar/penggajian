@extends('internal.layouts.app')

@section('title', 'PT. Techno Multi Utama | Internal &raquo; Karyawan')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Karyawan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Karyawan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a onclick="create()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Tambah data karyawan
                </a>

                <hr />

                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="karyawan-table">
                        <thead>
                            <tr>
                                <th width="100">NIK</th>
                                <th>Nama Karyawan</th>
                                <th width="100">Opsi</th>
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
                <h4 class="modal-title" id="myModalLabel">Form tambah data karyawan</h4>
            </div>
            <form id="modal-form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group" data-toggle="validator">
                        <div class="row">
                            <div class="col-md-5 col-xs-12">
                                <label for="">Nomor Induk Karyawan</label>
                                <input type="text" name="nik" class="form-control" id="nik">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7 col-xs-12">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary store_button">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form edit data karyawan</h4>
            </div>
            <form id="edit-modal-form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group" data-toggle="validator">
                        <div class="row">
                            <div class="col-md-5 col-xs-12">
                                <label for="">Nomor Induk Karyawan</label>
                                <input type="hidden" name="id" id="edit-id">
                                <input type="text" name="nik" class="form-control" id="edit-nik">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7 col-xs-12">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="edit-nama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="edit-jabatan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_button">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form edit data karyawan</h4>
            </div>
            <form id="destroy-modal-form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5 col-xs-12">
                                Yakin akan menghapus data ini?
                                <input type="hidden" name="_method" value="DELETE" id="destroy-method">
                                <input type="hidden" name="id" id="destroy-id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger destroy_button">Hapus</button>
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
        var karyawan_table = $('#karyawan-table').DataTable({
                                    serverSide: true,
                                    processing: true,
                                    ajax: '/internal/karyawan/data_karyawan',
                                    columns: [
                                        {data: 'nik'},
                                        {data: 'nama'},
                                        {data: 'action', orderable: false, searchable: false}
                                    ]
                                });

        function create()
        {
            $('#modal-form')[0].reset();
            $('#create-modal').modal('show');
        }

        function edit(id)
        {
            $.ajax({
                url: "/internal/karyawan/single_data_karyawan/"+id,
                type: "get",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $('#edit-modal').modal('show');
                    $('#edit-id').val(data.id);
                    $('#edit-nik').val(data.nik);
                    $('#edit-nama').val(data.nama);
                    $('#edit-jabatan').val(data.jabatan);
                }
            });
        }

        function delete_data(id){
            $('#destroy-modal').modal('show');
            $('#destroy-id').val(id);
        }

        function printpdf(id)
        {
            var id = id;
            console.log(id);

            $.ajax({
                url: "/internal/karyawan/print_pdf/"+id,
                type: "get",
                data: {'id' : id},
                dataType: 'json',
                success:function(data){
                    console.log(data);
                }
            });
        }

        $('.store_button').click(function(){
            var nik         = $('#nik').val();
            var nama        = $('#nama').val();
            var jabatan     = $('#jabatan').val();

            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/internal/karyawan/store",
                type: "post",
                data: {'nik' : nik, 'nama' : nama, 'jabatan' : jabatan},
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('#create-modal').modal('hide');
                    alert('Data berhasil disimpan!');
                    karyawan_table.ajax.reload();
                }
            });


        });

        $('.update_button').click(function(){
            var id          = $('#edit-id').val();
            var nik         = $('#edit-nik').val();
            var nama        = $('#edit-nama').val();
            var jabatan     = $('#edit-jabatan').val();

            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/internal/karyawan/update/"+id,
                type: "put",
                data: {'id' : id, 'nik' : nik, 'nama' : nama, 'jabatan' : jabatan},
                dataType: "json",
                success:function(data){
                    $('#edit-modal').modal('hide');
                    alert('Data berhasil diedit!');
                    karyawan_table.ajax.reload();
                }
            });


        });

        $('.destroy_button').click(function(){
            var id = $('#destroy-id').val();
            var token = $('meta[name="csrf-token').attr('content');

            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/internal/karyawan/destroy/"+id,
                type: "delete",
                data: {'id' : id},
                dataType: 'json',
                success:function(data){
                    console.log(data);
                    $('#destroy-modal').modal('hide');
                    alert('Data berhasil dihapus!');
                    karyawan_table.ajax.reload();
                }
            });
        });
    </script>
@endpush
