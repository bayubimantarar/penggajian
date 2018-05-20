@extends('internal.layouts.app')

@section('title', 'PT. Techno Multi Utama | Internal &raquo; Penggajian')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Preview Data Penggajian</h1>
        <p>Data penggajian karyawan</p>
        <p>Periode : {{ $periode->periode->formatLocalized('%B %Y') }} <br /></p>
        <p><a href="{{ route('slipgaji.review.actionpublish') }}" class="btn btn-sm btn-primary" id="publish">
            <i class="fa fa-check" id="iconpublish"></i> Publish Penggajian
        </a>
        <a href="{{ route('slipgaji.review.actioncancelpublish') }}" class="btn btn-sm btn-danger" id="cancelpublish">
            <i class="fa fa-times" id="iconcancelpublish"></i> Batalkan Publish Penggajian
        </a></p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
              Preview data penggajian periode
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" style="overflow-y: scroll; height: 400px; overflow-x: scroll;">
                {{-- <div class="table-responsive"> --}}
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th width="70%" rowspan="4" align="center"><center>NIK</center></th>
                              <th rowspan="4"><center>Nama Lengkap</center></th>
                              <th rowspan="2" colspan="6"><center>Penghasilan</center></th>
                              <th colspan="7"><center>Potongan</center></th>
                              <th rowspan="4"><center>Total Potongan</center></th>
                              <th rowspan="4"><center>Gaji Bersih</center></th>
                              <th rowspan="4"><center>Pembulatan</center></th>
                            </tr>
                            <tr></tr>
                            <tr>
                              <th rowspan="2"><center>Gaji Pokok</center></th>
                              <th colspan="5"><center>Tunjangan Tambahan</center></th>
                              <th rowspan="2">Pinjaman</th>
                              <th rowspan="2">Kehadiran</th>
                              <th rowspan="2">Kekurangan Jam Kerja</th>
                              <th rowspan="2">Premi Ketenagakerjaan *)</th>
                              <th rowspan="2">Premi Kesehatan *)</th>
                              <th rowspan="2">Premi Ketenagakerjaan **)</th>
                              <th rowspan="2">Premi Kesehatan **)</th>
                            </tr>
                            <tr>
                              <th>Kinerja</th>
                              <th>Transport</th>
                              <th>Makan</th>
                              <th>Lembur</th>
                              <th>lain-lain</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($query as $item)
                            <tr>
                              <td>{{ $item->nik }}</td>
                              <td>{{ $item->nama }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->gaji_pokok), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->kinerja), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->transport), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->makan), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->lembur), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->rapel_iso), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->pinjaman), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->kehadiran), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->kekurangan_jam_kerja), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->premi_kesehatan_1), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->premi_kesehatan_2), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6)), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format((round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6)) + round(substr(base64_decode($item->lembur), 6))) - (round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6))), 0, ',', ',') }}</td>
                              <td style="text-align:right">{{ number_format(substr(base64_decode($item->pembulatan), 6), 0, ',', ',') }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection

@push('js')
  <script>

    $('#publish').click(function(){
      $("#publish").attr('disabled', 'disabled');
      $("#iconpublish").removeClass('fa fa-check').addClass('fa fa-refresh fa-spin');
    });

    $('#cancelpublish').click(function(){
      $("#cancelpublish").attr('disabled', 'disabled');
      $("#iconcancelpublish").removeClass('fa fa-times').addClass('fa fa-refresh fa-spin');
    });
  </script>
@endpush
