<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Upload;
use DataTables;
use Session;
use Auth;
use Hash;
use PDF;

class KaryawanController extends Controller
{
    public function index()
    {
      return view('karyawan.index');
    }

    public function data(DataTables $datatables)
    {
      $upload = Upload::orderBy('periode', 'desc')->first();

      if($upload == NULL){
        $bulan = NULL;
      }else{
        $bulan  = $upload->periode->toDateString();
      }

      $id = Auth::guard('karyawan')->user()->id;
      $query = Karyawan::GetSingleDataKaryawanWithPayroll($id, $bulan);

      return DataTables::of($query)
              ->addColumn('print', function($query){
                return '<center> <a href="/print_pdf" class="btn btn-primary btn-circle"><i class="fa fa-print"></i></a></center>';
              })
              ->editColumn('periode', function($query){
                return $query->periode->formatLocalized('%B %Y');
              })
              ->rawColumns(['print', 'periode'])
              ->make(true);
    }

    public function exportpdfbyid()
    {
      $upload = Upload::orderBy('periode', 'desc')->first();

      if($upload == NULL){
        $bulan = NULL;
      }else{
        $bulan  = $upload->periode->toDateString();
      }
      $id = Auth::guard('karyawan')->user()->id;

      $query = Karyawan::GetSingleDataKaryawanWithPayroll($id, $bulan);
      $karyawan = Karyawan::find($id);
      $periode = Karyawan::GetSingleDataKaryawanWithPayroll($id, $bulan)->first();
      $temp_periode = $periode->periode->formatLocalized('%B %Y');;

      $pdf = PDF::loadView('internal.penggajian.slip_gaji', compact('query'));
      return $pdf->download('Slip gaji '.$karyawan->nama.' Periode '.$temp_periode.'.pdf');
    }

    public function pengaturan()
    {
      $id = Auth::guard('karyawan')->user()->id;

      $query = Karyawan::where('id', '=', $id)->first();

      return view('karyawan.pengaturan', compact('query'));
    }

    public function pengaturanstore(Request $request)
    {
      $id = $request->id;
      $old_password = $request->old_password;
      $new_password = $request->new_password;
      $confirmation_new_password = $request->confirmation_new_password;
      $karyawan = Karyawan::find($id);
      $password = $karyawan->password;

      if(Hash::check($old_password, $password)){
          if($confirmation_new_password == $new_password){
            Session::flash('class', 'alert-success');
            Session::flash('message', 'Password berhasil diubah');
            $query = karyawan::where('id', $id)->update(['password' => bcrypt($new_password)]);

            return redirect(route('karyawan.karyawan.pengaturan'));
          }else{
              Session::flash('class', 'alert-danger');
              Session::flash('message', 'Password baru tidak sama');

              return redirect(route('karyawan.karyawan.pengaturan'));
          }
      }else{
          Session::flash('class', 'alert-danger');
          Session::flash('message', 'Password lama tidak sama');

          return redirect(route('karyawan.karyawan.pengaturan'));
      }
    }
}
