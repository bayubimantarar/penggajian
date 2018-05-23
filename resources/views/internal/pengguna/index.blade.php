@extends('internal.layouts.app')

@section('title', 'PT. Techno Multi Utama | Internal &raquo; Pengguna')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengguna</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Pengguna
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a onclick="create()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Tambah data pengguna
                </a>

                <hr />

                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="pengguna-table">
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Email Pengguna</th>
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
                <h4 class="modal-title" id="myModalLabel">Form tambah data pengguna</h4>
            </div>
            <form id="modal-form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div id="form-add-nama" class="form-group">
                        <div class="row">
                            <div class="col-md-7 col-xs-12">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                                <p class="help-block" id="error-add-nama">Nama Pengguna Perlu Diisi!</p>
                            </div>
                        </div>
                    </div>
                    <div id="form-add-email" class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" id="email">
                                <p class="help-block" id="error-add-email">Email Karyawan Perlu Diisi!</p>
                                <p class="help-block" id="error-add-duplicate-email">Email Sudah ada!</p>
                            </div>
                        </div>
                    </div>
                    <div id="form-add-password" class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <p class="help-block" id="error-add-password">Password Perlu Diisi!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary store_button">Simpan</button>
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7 col-xs-12">
                                <label for="">Nama Pengguna</label>
                                <input type="hidden" name="id" id="edit-id">
                                <input type="text" name="nama" class="form-control" id="edit-nama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">email</label>
                                <input type="text" name="email" class="form-control" id="edit-email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <label for="">Kata sandi</label>
                                <input type="password" name="password" class="form-control" id="edit-password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary update_button">Simpan</button>
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
        $("#error-add-nama").hide("true");
        $("#error-add-email").hide("true");
        $("#error-add-password").hide("true");
        $("#error-add-duplicate-email").hide("true");
        var pengguna_table = $('#pengguna-table').DataTable({
                                    serverSide: true,
                                    processing: true,
                                    ajax: '/internal/pengguna/data_pengguna',
                                    columns: [
                                        {data: 'nama'},
                                        {data: 'email'},
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
                url: "/internal/pengguna/single_data_pengguna/"+id,
                type: "get",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $('#edit-modal').modal('show');
                    $('#edit-id').val(data.id);
                    $('#edit-nama').val(data.nama);
                    $('#edit-email').val(data.email);
                }
            });
        }

        function delete_data(id){
            $('#destroy-modal').modal('show');
            $('#destroy-id').val(id);
        }

        $('.store_button').click(function(){
            var nama        = $('#nama').val();
            var email       = $('#email').val();
            var password    = $('#password').val();

            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/internal/pengguna/store",
                type: "post",
                data: {'nama' : nama, 'email' : email, 'password' : password},
                dataType: "json",
                success:function(data){
                    console.log(data);
                    if(data.status == 0){
                      if(data.errors.nama[0] != null){
                        console.log('Error');
                        $("#form-add-nama").addClass("has-error");
                        $("#error-add-nama").show("true");
                      }
                      if(data.errors.email[0] != null){
                        console.log('Error');
                        $("#form-add-email").addClass("has-error");
                        $("#error-add-email").show("true");
                      }
                      if(data.errors.password[0] != null){
                        console.log('Error');
                        $("#form-add-password").addClass("has-error");
                        $("#error-add-password").show("true");
                      }
                    }else if(data.status == 2){
                      if(data.errors == "duplicate"){
                        $("#form-add-email").addClass("has-error");
                        $("#error-add-duplicate-email").show("true");
                      }
                    }else{
                      $('#create-modal').modal('hide');
                      alert('Data berhasil disimpan!');
                      pengguna_table.ajax.reload();
                    }
                    // $('#create-modal').modal('hide');
                    // alert('Data berhasil disimpan!');
                    // pengguna_table.ajax.reload();
                }
            });


        });

        $('.update_button').click(function(){
            var id          = $('#edit-id').val();
            var nama        = $('#edit-nama').val();
            var email       = $('#edit-email').val();
            var password    = $('#edit-password').val();

            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/internal/pengguna/update/"+id,
                type: "put",
                data: {'id' : id, 'nama' : nama, 'email' : email, 'password' : password},
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('#edit-modal').modal('hide');
                    alert('Data berhasil diedit!');
                    pengguna_table.ajax.reload();
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
                url: "/internal/pengguna/destroy/"+id,
                type: "delete",
                data: {'id' : id},
                dataType: 'json',
                success:function(data){
                    console.log(data);
                    $('#destroy-modal').modal('hide');
                    alert('Data berhasil dihapus!');
                    pengguna_table.ajax.reload();
                }
            });
        });
    </script>
@endpush
