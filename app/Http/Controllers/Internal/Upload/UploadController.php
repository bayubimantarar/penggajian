<?php

namespace App\Http\Controllers\Internal\Upload;

use App\Http\Requests\Internal\UploadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penggajian;
use Carbon\Carbon;
use App\Absensi;
use App\Upload;
use DataTables;
use Session;
use Excel;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      return view('internal.upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        $temp_periode = $request->temp_periode;
        $penggajian   = Carbon::parse($request->temp_penggajian);
        $periode      = Carbon::parse($temp_periode);

        $file_excel_gaji          = $request->file('excel_gaji');
        $file_excel_rekap_absensi = $request->file('excel_rekap_absensi');

        $file_path_excel_gaji     = $file_excel_gaji->getRealPath();
        $file_path_rekap_absensi  = $file_excel_rekap_absensi->getRealPath();

        $nama_file_excel_gaji           = strtolower($file_excel_gaji->getClientOriginalName());
        $nama_file_excel_rekap_absensi  = strtolower($file_excel_rekap_absensi->getClientOriginalName());

        $sheet_excel_gaji = Excel::load($file_path_excel_gaji)->formatDates(true)->noHeading()->get();
        $sheet_excel_rekap_absensi = Excel::load($file_path_rekap_absensi)->formatDates(true)->noHeading()->get();

        foreach($sheet_excel_gaji->toArray() as $item){
            if($item['0'] != null){$query =
              Penggajian::create([
                  'nik'                       => trim($item['1']),
                  'gaji_pokok'                => base64_encode(date('mY').''.$item['6']),
                  'kinerja'                   => base64_encode(date('mY').''.$item['16']),
                  'makan'                     => base64_encode(date('mY').''.$item['18']),
                  'transport'                 => base64_encode(date('mY').''.$item['17']),
                  'lembur'                    => base64_encode(date('mY').''.$item['19']),
                  'rapel_iso'                 => base64_encode(date('mY').''.$item['20']),
                  'bpjs_1'                    => base64_encode(date('mY').''.$item['13']),
                  'bpjs_2'                    => base64_encode(date('mY').''.$item['14']),
                  'pinjaman'                  => base64_encode(date('mY').''.$item['23']),
                  'kehadiran'                 => base64_encode(date('mY').''.$item['24']),
                  'kekurangan_jam_kerja'      => base64_encode(date('mY').''.$item['25']),
                  'premi_ketenaga_kerjaan_1'  => base64_encode(date('mY').''.$item['26']),
                  'premi_kesehatan_1'         => base64_encode(date('mY').''.$item['27']),
                  'premi_ketenaga_kerjaan_2'  => base64_encode(date('mY').''.$item['28']),
                  'premi_kesehatan_2'         => base64_encode(date('mY').''.$item['29']),
                  'pembulatan'                => base64_encode(date('mY').''.$item['32']),
                  'periode'                   => $periode,
                  'status'                    => 'uploaded',
                  'penggajian'                => $penggajian
              ]);
            }
        }

        foreach($sheet_excel_rekap_absensi->toArray() as $item){
            if($item['0'] != null){
              $query = Absensi::create([
                  'nik'           => trim($item['1']),
                  'cuti'          => $item['3'],
                  'ijin'          => $item['4'],
                  'spj'           => $item['5'],
                  'bolos'         => $item['6'],
                  'jam_lembur'    => $item['7'],
                  'kek_jam_kerja' => $item['8'],
                  'weekday'       => $item['9'],
                  'weekend'       => $item['10'],
                  'holiday'       => $item['11'],
                  'periode'       => $periode,
                  'status'        => 'uploaded',
                  'penggajian'    => $penggajian
              ]);
            }
        }

        $data = [
                  [
                    'nama_file'   => $nama_file_excel_gaji,
                    'periode' => $periode,
                    'created_at'  => Carbon::now(),
                    'status' => 'uploaded'
                  ],
                  [
                    'nama_file'   => $nama_file_excel_rekap_absensi,
                    'periode' => $periode,
                    'created_at'  => Carbon::now(),
                    'status' => 'uploaded'
                  ]
                ];

        $query  = Upload::insert($data);

        Session::flash('notification', 'File berhasil di upload ...');
        return redirect(route('slipgaji.review'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $periode = $request->periode;

      $query_upload = Upload::where('periode', '=', $periode)->delete();
      $query_penggajian = Penggajian::where('periode', '=', $periode)->delete();
      $query_absensi = Absensi::where('periode', '=', $periode)->delete();

      return response()->json([$query_upload, $query_penggajian, $query_absensi]);
    }

    public function data($id)
    {
      $query = Upload::where('id', $id)->first();

      return response()->json($query);
    }

    public function dataupload(Datatables $datatables)
    {
        $query = Upload::GetAllUploadData();

        return DataTables::of($query)
                ->editColumn('periode', function($query){
                    return '<b>'.$query->periode->formatLocalized('%B'.'-'.'%Y').'</b>';
                })
                ->editColumn('created_at', function($query){
                    return '<b>'.$query->created_at->formatLocalized('%d'.'-'.'%B'.'-'.'%Y').'</b>';
                })
                ->addColumn('action', function($query){
                  return '<center><a onclick="delete_data('.$query->id.')" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a></center>';
                })
                ->rawColumns(['periode', 'action', 'created_at'])
                ->make(true);
    }
}
