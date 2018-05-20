<?php

namespace App\Http\Controllers\Api;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Karyawan;
use App\Upload;
use Validator;
use JWTAuth;
use Config;
use Hash;
use PDF;

class KaryawanController extends Controller
{
    public function __construct()
    {
    	Config(['auth.defaults.guard' => 'karyawan']);
    }

    public function checktoken($token)
    {
        return response()->json(['success' => 1, 'message' => 'token still valid and fresh!']);
    }

    public function login(Request $request)
    {
        $nik        = $request->nik;
        $password   = $request->password;

        $karyawan   = Karyawan::where('nik', $nik)->first();
        $id         = $karyawan->id;
        $nama       = $karyawan->nama;

        $start = microtime(true);
        // Execute the query
        $time = $start - LARAVEL_START;

        try {
          // attempt to verify the credentials and create a token for the user
          if (!$token = JWTAuth::attempt(['nik' => $nik, 'password' => $password])) {
              return response()->json(['success' => 0, 'message' => 'We cant find an account with this credentials.', 'execution' => $time], 401);
          }
        } catch (JWTException $e) {
          // something went wrong whilst attempting to encode the token
          return response()->json(['success' => 0, 'message' => 'Failed to login, please try again.', 'execution' => $time], 500);
        }
        // all good so return the token
        return response()->json(['success' => 1, 'token' => $token, 'data' => ['id' => $id, 'nama' => $nama], 'execution' => $time]);
    }

    public function logout(Request $request)
    {
      $this->validate($request, ['token' => 'required']);

      try {
          JWTAuth::invalidate($request->input('token'));
          $start = microtime(true);
          // Execute the query
          $time = $start - LARAVEL_START;
          return response()->json(['success' => 1, 'message'=> "You have successfully log out.", 'execution' => $time]);
      }catch(JWTException $e){
          $start = microtime(true);
          // Execute the query
          $time = $start - LARAVEL_START;
          return response()->json(['success' => 0, 'message' => 'Failed to logout, please try again.', 'execution' => $time], 500);
      }
    }

  public function getslipgaji($token, $id)
  {
      try{
          JWTAuth::parseToken()->authenticate();

          $upload = Upload::orderBy('periode', 'desc')->first();

          if($upload == NULL){
            $bulan = NULL;
          }else{
            $bulan  = $upload->periode->toDateString();
          }

          $karyawan = Karyawan::APIGetFilterAllKaryawanDataWithPayroll($id, $bulan);

          if(!$karyawan->isEmpty()){
              foreach ($karyawan as $item) {
              $data = [
                          'identitas' => [
                              'nik' => $item->nik
                          ],
                          'penghasilan' => [
                              'gaji_pokok' => number_format(round(substr(base64_decode($item->gaji_pokok), 6)), 0, ",", ","),
                              'kinerja' => number_format(round(substr(base64_decode($item->kinerja), 6)), 0, ",", ","),
                              'makan' => number_format(round(substr(base64_decode($item->makan), 6)), 0, ",", ","),
                              'transport' => number_format(round(substr(base64_decode($item->transport), 6)), 0, ",", ","),
                              'bpjs_1' => number_format(round(substr(base64_decode($item->bpjs_1), 6)), 0, ",", ","),
                              'bpjs_2' => number_format(round(substr(base64_decode($item->bpjs_2), 6)), 0, ",", ","),
                          ],
                          'tunjangan' => [
                              'lembur' => number_format(round(substr(base64_decode($item->lembur), 6)), 0, ",", ","),
                          ],
                          'potongan' => [
                              'pinjaman' => number_format(round(substr(base64_decode($item->pinjaman), 6)), 0, ",", ","),
                              'kehadiran' => number_format(round(substr(base64_decode($item->kehadiran), 6)), 0, ",", ","),
                              'kekurangan_jam_kerja' => number_format(round(substr(base64_decode($item->kekurangan_jam_kerja), 6)), 0, ",", ","),
                              'premi_ketenaga_kerjaan_1' => number_format(round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)), 0, ",", ","),
                              'premi_kesehatan_1' => number_format(round(substr(base64_decode($item->premi_kesehatan_1), 6)), 0, ",", ","),
                              'premi_ketenaga_kerjaan_2' => number_format(round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)), 0, ",", ","),
                              'premi_kesehatan_2' => number_format(round(substr(base64_decode($item->premi_kesehatan_2), 6)), 0, ",", ","),
                          ],
                          'total' => [
                              'total_penghasilan' => number_format(round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6)), 0, ',', ','),
                              'total_tunjangan' => number_format(round(substr(base64_decode($item->lembur), 6)), 0, ",", ","),
                              'total_potongan' => number_format(round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6)), 0, ',', ','),
                              'total_gaji' => number_format((round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6)) + round(substr(base64_decode($item->lembur), 6))) - (round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6))), 0, ',', ','),
															'total_penghasilan_dan_tunjangan' => number_format((round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6))) + round(substr(base64_decode($item->lembur), 6)), 0, ',', ','),
															'total_penghasilantunjangan_dan_potongan' => number_format((round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6))) + round(substr(base64_decode($item->lembur), 6)) - (round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6))), 0, ',', ','),
                              'total_pembulatan' => number_format(substr(base64_decode($item->pembulatan), 6), 0, ',', ',')
                          ],
                          'periode' => $item->periode->formatLocalized('%B %Y'),
                          'absensi' => [
                              'cuti' => round($item->cuti),
                              'ijin' => round($item->ijin),
                              'bolos' => round($item->bolos),
                              'kek_jam_kerja' => round($item->kek_jam_kerja),
                              'weekday' => round($item->weekday),
                              'weekend' => round($item->weekend),
                              'holiday' => round($item->holiday),
                          ]
                      ];
          }
            $start = microtime(true);
            // Execute the query
            $time = $start - LARAVEL_START;
            return response()->json(['execution' => $time, $data, 'status' => 1]);

        }else{
            $start = microtime(true);
            // Execute the query
            $time = $start - LARAVEL_START;
            return response()->json(['execution' => $time, 'status' => 0]);
        }

        }catch(JWTException $e){
            return response()->json(['success' => 0, 'error' => 'Token is not valid.'], 500);
        }
  }


    public function exportpdfbyid($token, $id)
    {
        try{
            JWTAuth::parseToken()->authenticate();
            $upload = Upload::orderBy('periode', 'desc')->first();

              if($upload == NULL){
                $bulan = NULL;
              }else{
                $bulan  = $upload->periode->toDateString();
              }

            $query = Karyawan::APIGetFilterAllKaryawanDataWithPayroll($id, $bulan);
            $karyawan   = Karyawan::find($id);
            $nama       = $karyawan->nama;

            $start      = microtime(true);
            // Execute the query
            $time       = $start - LARAVEL_START;

            $pdf = PDF::loadView('internal.penggajian.api_slip_gaji', compact('query'));
            $pdf->save(public_path('assets/download/file.pdf'));
            $file = public_path('assets/download/file.pdf');
            return response()->file($file);
            // return $pdf->with(['execution' => $time]);
        }catch(JWTException $e){
            return response()->json(['success' => 0, 'error' => 'Token is not valid.'], 500);
        }
    }

    public function changeprofile(Request $request)
    {
      try {
            JWTAuth::parseToken()->authenticate();
            $id = $request->id;
            $old_password = $request->old_password;
            $new_password = $request->new_password;
            $confirmation_new_password = $request->confirmation_new_password;
            $karyawan = Karyawan::find($id);
            $password = $karyawan->password;

            if(Hash::check($old_password, $password)){
                if($confirmation_new_password == $new_password){
                    $start = microtime(true);
                    // Execute the query
                    $time = $start - LARAVEL_START;
                    $query = karyawan::where('id', $id)->update(['password' => bcrypt($new_password)]);

                    return response()->json(['success' => 1, 'message' => 'Old password match, confirmation password match', 'execution' => $time]);
                }else{
                    $start = microtime(true);
                    // Execute the query
                    $time = $start - LARAVEL_START;
                    return response()->json(['success' => 0, 'message' => 'Kata Sandi baru tidak sama', 'execution' => $time]);
                }
            }else{
                $start = microtime(true);
                // Execute the query
                $time = $start - LARAVEL_START;
                return response()->json(['success' => 0, 'message' => 'Kata sandi lama tidak sama', 'execution' => $time]);
            }
      }catch(JWTException $e){
          $start = microtime(true);
          // Execute the query
          $time = $start - LARAVEL_START;
          return response()->json(['success' => 0, 'message' => 'Failed to logout, please try again.', 'execution' => $time], 500);
      }
    }
}
