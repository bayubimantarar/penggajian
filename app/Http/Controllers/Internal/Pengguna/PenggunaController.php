<?php

namespace App\Http\Controllers\Internal\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengguna;
use DataTables;
use Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('internal.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama'        => 'required',
            'email'       => 'required',
            'password'    => 'required'
        ];

        $messages = [
          'nama.required'     => 'Nama Pengguna perlu diisi!',
          'email.required'    => 'Email perlu diisi!',
          'password.required' => 'Password perlu diisi!'
        ];

        $validation = Validator::make($request->all(), $rules, $messages);

        if($validation->fails()){
          return response()->json(['status' => 0, 'errors' => $validation->errors()], 200);
        }else{
          $email      = $request->email;

          $checkdata  = Pengguna::where('email', '=', $email)->first();
          if(!empty($checkdata)){
            return response()->json(['status' => 2, 'errors' => 'duplicate'], 200);
          }else{
            $nama       = $request->nama;
            $email      = $request->email;
            $password   = bcrypt($request->password);

            $data = [
                        'nama'      => $nama,
                        'email'     => $email,
                        'password'  => $password
                    ];

            $query = Pengguna::StoreDataPengguna($data);

            return response()->json(['status' => 1], 200);
          }
        }
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
        $nama        = $request->nama;
        $email       = $request->email;
        $password    = $request->password;

        if($password == NULL){
            $data = [
                        'nama'       => $nama,
                        'email'      => $email,
                ];
        }else{
            $data = [
                        'nama'       => $nama,
                        'email'      => $email,
                        'password'   => bcrypt($password),
                    ];
        }

        return $query = Pengguna::UpdateDataPengguna($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Pengguna::DestroyDataPengguna($id);

        return response()->json(200);
    }

    public function singledatapengguna($id)
    {
        return $query = Pengguna::GetSingleDataPengguna($id);
    }

    public function datapengguna(DataTables $datatables)
    {
        $query = Pengguna::GetAllPenggunaData();

        return DataTables::of($query)
                ->addColumn('action', function($query){
                    return '<center><a onclick="edit('.$query->id.')" class="edit_button btn btn-warning btn-circle"><i class="fa fa-pencil"></i></a> <a onclick="delete_data('.$query->id.')" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a></center>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
