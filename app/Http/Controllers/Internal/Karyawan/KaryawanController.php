<?php

namespace App\Http\Controllers\Internal\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Karyawan;
use DataTables;
use PDF;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('internal.karyawan.index');
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
    public function store(Request $request)
    {
        $nik        = $request->nik;
        $nama       = $request->nama;
        $jabatan    = $request->jabatan;
        $password   = bcrypt($nik);

        $data = [
                    'nik'       => $nik,
                    'nama'      => $nama,
                    'jabatan'   => $jabatan,
                    'password'  => $password
                ];

        $query = Karyawan::StoreDataKaryawan($data);

        return response()->json(200);
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
        $nik        = $request->nik;
        $nama       = $request->nama;
        $jabatan    = $request->jabatan;

        $data = [
                    'nik'       => $nik,
                    'nama'      => $nama,
                    'jabatan'   => $jabatan,
                ];

        return $query = Karyawan::UpdateDataKaryawan($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Karyawan::DestroyDataKaryawan($id);

        return response()->json(200);
    }

    public function datakaryawan(Datatables $datatables)
    {
        $query = Karyawan::GetAllKaryawanData();

        return DataTables::of($query)
                ->addColumn('action', function($query){
                    return '<center><a onclick="edit('.$query->id.')" class="edit_button btn btn-warning btn-circle"><i class="fa fa-pencil"></i></a> <a onclick="delete_data('.$query->id.')" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a></center>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function singledatakaryawan($id)
    {
        return $query = Karyawan::GetSingleDataKaryawan($id);
    }

    public function printpdf($id)
    {
        $query = Karyawan::GetSingleDataKaryawanWithPayroll($id);

        $pdf = PDF::loadView('internal.penggajian.slip_gaji', compact('query'));
        return $pdf->download('slip_gaji.pdf');
    }
}
