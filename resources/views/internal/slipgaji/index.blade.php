@extends('internal.layouts.app')

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
        <div class="panel panel-primary">
            <div class="panel-heading">
                Slip Gaji Karyawan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                        <div class="form-group">
                            <label>Cari periode slip gaji :</label>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="input-group date" id="periode">
                                            <input type="text" name="periode" class="form-control" readonly />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                          </div>
                                          <input type="hidden" name="temp_periode" id="temp_periode">
                                          <button type="submit" class="btn btn-sm btn-primary" id="filter"><i class="fa fa-search"></i> Temukan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('slipgaji.printpdfall') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                            </div>
                        </div>
                      </form>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="slipgaji-table">
                        <thead>
                            <tr>
                                <th width="100">NIK</th>
                                <th>Nama</th>
                                <th>Periode Slip Gaji</th>
                                <th width="5">Print</th>
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
@endsection

@push('js')
    <!-- DataTables JavaScript -->
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/locale/id.js"></script>

    <script>
        // $(document).ready(function(){
            var slipgaji_table = $('#slipgaji-table').DataTable({
                                serverSide: true,
                                processing: true,
                                ajax: '/internal/slipgaji/data',
                                columns: [
                                    {data: 'nik'},
                                    {data: 'nama'},
                                    {data: 'periode'},
                                    {data: 'print', orderable: false, searchable: false}
                                ]
                            });
        // })

        // $('#printall').click(function(){
        //     var bulan = $('#temp_bulan').val();
        //     var tahun = $('#temp_tahun').val();

        //     $.ajax({
        //         url: '/slipgaji/print_pdf/'+bulan+'/'+tahun,
        //         type: "get",
        //         data: {'bulan' : bulan, 'tahun' : tahun},
        //         dataType: 'json',
        //         success:function(data){
        //             console.log(data);
        //         }
        //     });
        // });

        $('#periode').datepicker({
          locale: 'id',
          format: {
            toDisplay: function (date, format, language) {
                var mm     = date.getMonth()+1;
                var yyyy   = date.getFullYear();

                if(mm == 01){
                  return today = 'Januari'+'-'+yyyy;
                }else if(mm == 02){
                  return today = 'Februari'+'-'+yyyy;
                }else if(mm == 03){
                  return today = 'Maret'+'-'+yyyy;
                }else if(mm == 04){
                  return today = 'April'+'-'+yyyy;
                }else if(mm == 05){
                  return today = 'Mei'+'-'+yyyy;
                }else if(mm == 06){
                  return today = 'Juni'+'-'+yyyy;
                }else if(mm == 07){
                  return today = 'Juli'+'-'+yyyy;
                }else if(mm == 08){
                  return today = 'Agustus'+'-'+yyyy;
                }else if(mm == 09){
                  return today = 'September'+'-'+yyyy;
                }else if(mm == 10){
                  return today = 'Oktober'+'-'+yyyy;
                }else if(mm == 11){
                  return today = 'November'+'-'+yyyy;
                }else if(mm == 12){
                  return today = 'Desember'+'-'+yyyy;
                }
            },
            toValue: function (date, format, language) {
              var mm     = date.getMonth()+1;
              var yyyy   = date.getFullYear();
                return mm;
            }
          },
          minViewMode: "months"
        });

        $('#periode').change(function(){
          console.log('Running');
          $('#temp_periode').val(moment($('#periode').datepicker('getDate')).format('YYYY/MM/DD'));
        });

        $('#filter').click(function(){
          var temp_periode = $('#temp_periode').val();
          var split_periode = temp_periode.split('/');
          $('#filter').attr('disabled', 'disabled');
          console.log(split_periode['1']);

          var bulan = split_periode['1'];
          var tahun = split_periode['0'];
          var url_ajax = '/internal/slipgaji/datafilter/'+bulan+'/'+tahun;
          console.log(url_ajax);
          //
          $.ajax({
              url: url_ajax,
              type: "get",
              dataType: 'json',
              success:function(data){
                  $("#filter").removeAttr('disabled');
                  console.log(data);
                  $('#slipgaji-table').DataTable({
                      serverSide: true,
                      processing: true,
                      destroy: true,
                      ajax: url_ajax,
                      columns: [
                          {data: 'nik'},
                          {data: 'nama'},
                          {data: 'periode'},
                          {data: 'print', orderable: false, searchable: false}
                      ]
                  });
              }
          });
        });
    </script>
@endpush
