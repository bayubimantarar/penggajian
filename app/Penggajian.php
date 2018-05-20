<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table = 'penggajian';
    protected $fillable = ['nik', 'gaji_pokok', 'kinerja', 'lembur', 'rapel_iso', 'makan', 'transport', 'bpjs_1', 'bpjs_2', 'pinjaman', 'kehadiran', 'kekurangan_jam_kerja', 'premi_ketenaga_kerjaan_1', 'premi_kesehatan_1', 'premi_ketenaga_kerjaan_2', 'premi_kesehatan_2', 'pembulatan', 'periode', 'status', 'penggajian', 'created_at'];
    protected $dates = ['periode', 'penggajian'];

    public function scopeGetAllPenggajianData($query)
    {
    	return $query->join('karyawan', 'penggajian.nik', '=', 'karyawan.nik')->select('penggajian.*', 'karyawan.nama')->get();
    }

   	public function scopeGetSingleDataPenggajian($query, $id)
   	{
    	return $query->join('karyawan', 'penggajian.nik', '=', 'karyawan.nik')->select('penggajian.*', 'karyawan.nama')->where('penggajian.id', '=', $id)->select('karyawan.*', 'penggajian.*', 'absensi.*')->get();
   	}
}
