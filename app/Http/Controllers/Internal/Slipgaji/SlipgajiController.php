<?php

namespace App\Http\Controllers\Internal\Slipgaji;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penggajian;
use Carbon\Carbon;
use App\Karyawan;
use App\Absensi;
use App\Upload;
use DataTables;
use Terbilang;
use PDF;
use DB;

class SlipgajiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('internal.slipgaji.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function review()
    {
      $query      = Karyawan::GetAllKaryawanDataWithPayrollReview();
      $periode    = Upload::orderBy('created_at', 'desc')->first();

      return view('internal.penggajian.review_data', compact('query', 'periode'));
    }

    public function publish()
    {
      $query_penggajian = Penggajian::where('status', '=', 'uploaded')->update(['status' => 'published']);
      $query_absensi = Absensi::where('status', '=', 'uploaded')->update(['status' => 'published']);
      $query_upload = Upload::where('status', '=', 'uploaded')->update(['status' => 'published']);

      $periode    = Carbon::now()->formatLocalized('%B'.'-'.'%Y');
      $bulan      = Carbon::now()->month;
      $tahun      = Carbon::now()->year;

      return view('internal.slipgaji.index', compact('periode', 'bulan', 'tahun'));
    }

    public function cancelpublish()
    {
      $query_penggajian = Penggajian::where('status', '=', 'uploaded')->delete();
      $query_absensi = Absensi::where('status', '=', 'uploaded')->delete();
      $query_upload = Upload::where('status', '=', 'uploaded')->delete();

      $periode    = Carbon::now()->formatLocalized('%B'.'-'.'%Y');
      $bulan      = Carbon::now()->month;
      $tahun      = Carbon::now()->year;

      return view('internal.slipgaji.index', compact('periode', 'bulan', 'tahun'));
    }

    public function data(DataTables $datatables)
    {
        $upload = Upload::orderBy('periode', 'desc')->first();

        if($upload == NULL){
          $bulan = NULL;
        }else{
          $bulan  = $upload->periode->toDateString();
        }

        $query = Karyawan::GetAllKaryawanDataWithPayroll($bulan);

        return DataTables::of($query)
                ->addColumn('print', function($query){
                  return '<center> <a href="/internal/slipgaji/print_pdf/'.$query->id.'/'.$query->periode.'" class="btn btn-primary btn-circle"><i class="fa fa-print"></i></a></center>';
                })
                ->editColumn('periode', function($query){
                  return $query->periode->formatLocalized('%B %Y');
                })
                ->rawColumns(['print', 'periode'])
                ->make(true);
    }

    public function datafilter($bulan, $tahun, DataTables $datatables)
    {
        $query = Karyawan::GetFilterAllKaryawanDataWithPayroll($bulan, $tahun);

        return DataTables::of($query)
                ->addColumn('print', function($query){
                    return '<center> <a href="/internal/slipgaji/print_pdf/'.$query->id.'/'.$query->periode.'" class="btn btn-primary btn-circle"><i class="fa fa-print"></i></a></center>';
                })
                ->editColumn('periode', function($query){
                  return $query->periode->formatLocalized('%B %Y');
                })
                ->rawColumns(['print', 'periode'])
                ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return data into pdf using blade
     */
    public function exportpdfbyid($id, $date)
    {
        $query = Karyawan::GetSingleDataKaryawanWithPayroll($id, $date);
        $karyawan = Karyawan::find($id);
        $periode = Karyawan::GetSingleDataKaryawanWithPayroll($id, $date)->first();
        $temp_periode = $periode->periode->formatLocalized('%B %Y');

        $pdf = PDF::loadView('internal.penggajian.slip_gaji', compact('query'));
        return $pdf->download('Slip gaji '.$karyawan->nama.' Periode '.$temp_periode.'.pdf');
    }

    /**
    * Export all data to pdf.
    * @return data into pdf using blade
    */
    public function exportpdfall(Request $request)
    {
        $bulan = $request->temp_bulan;
        $tahun = $request->temp_tahun;

        $query = Karyawan::GetFilterAllKaryawanDataWithPayroll($bulan, $tahun);

        $pdf = PDF::loadView('internal.penggajian.slip_gaji', compact('query'));
        return $pdf->download('Semua Slip Gaji Karyawan.pdf');
    }
}
