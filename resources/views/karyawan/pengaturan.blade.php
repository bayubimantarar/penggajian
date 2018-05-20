@extends('layouts.app')

@section('title', 'PT. Techno Multi Utama | Internal &raquo; Penggajian')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Slip Gaji</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('message'))
          <div class="alert {{ Session::get('class') }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
          </div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                Pengaturan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <form action="{{ route('karyawan.karyawan.pengaturan.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <label for="">NIK</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $query->id }}" readonly />
                      <input type="text" name="nik" class="form-control" value="{{ $query->nik }}" readonly />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <label for="">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="{{ $query->nama }}" readonly />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <label for="">Password Lama</label>
                      <input type="password" name="old_password" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <label for="">Password Baru</label>
                      <input type="password" name="new_password" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <label for="">Konfirmasi Password Baru</label>
                      <input type="password" name="confirmation_new_password" class="form-control" />
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
              </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection=
