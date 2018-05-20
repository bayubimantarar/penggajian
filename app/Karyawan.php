<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Karyawan extends Authenticatable implements JWTSubject
{
    protected $table = 'karyawan';
    protected $hidden = ['password'];
    protected $guard = 'karyawan';
    protected $fillable = ['nik', 'nama', 'jabatan', 'password'];
    protected $dates = ['periode', 'penggajian'];

    public function scopeGetAllKaryawanData($query)
    {
    	return $query->orderBy('nik', 'desc')->get();
    }

    public function scopeGetAllKaryawanDataWithPayroll($query, $bulan)
    {
    	return $query
        ->join('penggajian', 'karyawan.nik', '=', 'penggajian.nik')
        ->join('absensi', 'karyawan.nik', '=', 'absensi.nik')
        ->select('karyawan.id', 'karyawan.nik', 'karyawan.nama', 'karyawan.jabatan', 'penggajian.gaji_pokok', 'penggajian.kinerja', 'penggajian.makan', 'penggajian.transport', 'penggajian.bpjs_1', 'penggajian.bpjs_2', 'penggajian.pinjaman', 'penggajian.kehadiran', 'penggajian.kekurangan_jam_kerja', 'penggajian.premi_ketenaga_kerjaan_1', 'penggajian.premi_kesehatan_1', 'penggajian.premi_ketenaga_kerjaan_2', 'penggajian.premi_kesehatan_2', 'penggajian.pembulatan', 'penggajian.created_at', 'penggajian.lembur', 'penggajian.rapel_iso', 'penggajian.periode', 'penggajian.penggajian', 'absensi.cuti', 'absensi.ijin', 'absensi.spj', 'absensi.bolos', 'absensi.jam_lembur', 'absensi.kek_jam_kerja', 'absensi.weekday', 'absensi.weekend', 'absensi.holiday')
        ->whereDate('penggajian.periode', '=', $bulan)
        ->whereDate('absensi.periode', '=', $bulan)
        ->where('penggajian.status', '=', 'published')
        ->where('absensi.status', '=', 'published')
        ->groupBy('karyawan.id')
        ->get();
    }

    public function scopeGetFilterAllKaryawanDataWithPayroll($query, $bulan, $tahun)
    {
        return $query
          ->join('penggajian', 'karyawan.nik', '=', 'penggajian.nik')
          ->join('absensi', 'karyawan.nik', '=', 'absensi.nik')
          ->select('karyawan.id', 'karyawan.nik', 'karyawan.nama', 'karyawan.jabatan', 'penggajian.gaji_pokok', 'penggajian.kinerja', 'penggajian.makan', 'penggajian.transport', 'penggajian.bpjs_1', 'penggajian.bpjs_2', 'penggajian.pinjaman', 'penggajian.kehadiran', 'penggajian.kekurangan_jam_kerja', 'penggajian.premi_ketenaga_kerjaan_1', 'penggajian.premi_kesehatan_1', 'penggajian.premi_ketenaga_kerjaan_2', 'penggajian.premi_kesehatan_2', 'penggajian.pembulatan', 'penggajian.created_at', 'penggajian.lembur', 'penggajian.rapel_iso','penggajian.periode', 'penggajian.penggajian', 'absensi.cuti', 'absensi.ijin', 'absensi.spj', 'absensi.bolos', 'absensi.jam_lembur', 'absensi.kek_jam_kerja', 'absensi.weekday', 'absensi.weekend', 'absensi.holiday')
          ->whereMonth('penggajian.periode', $bulan)
          ->whereMonth('absensi.periode', $bulan)
          ->whereYear('penggajian.periode', $tahun)
          ->whereYear('absensi.periode', $tahun)
          ->where('penggajian.status', '=', 'published')
          ->where('absensi.status', '=', 'published')
          ->groupBy('karyawan.id')
          ->get();
    }

    public function scopeAPIGetFilterAllKaryawanDataWithPayroll($query, $id, $bulan)
    {
        return $query
          ->join('penggajian', 'karyawan.nik', '=', 'penggajian.nik')
          ->join('absensi', 'karyawan.nik', '=', 'absensi.nik')
          ->select('karyawan.id', 'karyawan.nik', 'karyawan.nama', 'karyawan.jabatan', 'penggajian.gaji_pokok', 'penggajian.kinerja', 'penggajian.makan', 'penggajian.transport', 'penggajian.bpjs_1', 'penggajian.bpjs_2', 'penggajian.pinjaman', 'penggajian.kehadiran', 'penggajian.kekurangan_jam_kerja', 'penggajian.premi_ketenaga_kerjaan_1', 'penggajian.premi_kesehatan_1', 'penggajian.premi_ketenaga_kerjaan_2', 'penggajian.premi_kesehatan_2', 'penggajian.pembulatan', 'penggajian.created_at', 'penggajian.lembur', 'penggajian.rapel_iso', 'penggajian.periode', 'absensi.cuti', 'absensi.ijin', 'absensi.spj', 'absensi.bolos', 'absensi.jam_lembur', 'absensi.kek_jam_kerja', 'absensi.weekday', 'absensi.weekend', 'absensi.holiday')
          ->whereDate('penggajian.periode', '=', $bulan)
          ->whereDate('absensi.periode', '=', $bulan)
          ->where('penggajian.status', '=', 'published')
          ->where('absensi.status', '=', 'published')
          ->where('karyawan.id', '=', $id)
          ->groupBy('karyawan.id')
          ->get();
    }

    public function scopeGetSingleDataKaryawan($query, $id)
    {
        return $query->findOrFail($id);
    }

    public function scopeGetSingleDataKaryawanWithPayroll($query, $id, $date)
    {
        return $query
          ->join('penggajian', 'karyawan.nik', '=', 'penggajian.nik')
          ->join('absensi', 'karyawan.nik', '=', 'absensi.nik')
          ->select('karyawan.id', 'karyawan.nik', 'karyawan.nama', 'karyawan.jabatan', 'penggajian.gaji_pokok', 'penggajian.kinerja', 'penggajian.makan', 'penggajian.transport', 'penggajian.bpjs_1', 'penggajian.bpjs_2', 'penggajian.pinjaman', 'penggajian.kehadiran', 'penggajian.kekurangan_jam_kerja', 'penggajian.premi_ketenaga_kerjaan_1', 'penggajian.premi_kesehatan_1', 'penggajian.premi_ketenaga_kerjaan_2', 'penggajian.premi_kesehatan_2', 'penggajian.pembulatan', 'penggajian.created_at', 'penggajian.lembur', 'penggajian.rapel_iso', 'penggajian.periode', 'penggajian.penggajian', 'absensi.periode', 'absensi.cuti', 'absensi.ijin', 'absensi.spj', 'absensi.bolos', 'absensi.jam_lembur', 'absensi.kek_jam_kerja', 'absensi.weekday', 'absensi.weekend', 'absensi.holiday', 'absensi.created_at')
          ->where('penggajian.periode', '=', $date)
          ->where('absensi.periode', '=', $date)
          ->where('karyawan.id', '=', $id)
          ->where('penggajian.status', '=', 'published')
          ->where('absensi.status', '=', 'published')
          ->groupBy('karyawan.id')
          ->get();
    }

    public function scopeGetAllKaryawanDataWithPayrollReview($query)
    {
      return $query
        ->join('penggajian', 'karyawan.nik', '=', 'penggajian.nik')
        ->join('absensi', 'karyawan.nik', '=', 'absensi.nik')
        ->select('karyawan.id', 'karyawan.nik', 'karyawan.nama', 'karyawan.jabatan', 'penggajian.gaji_pokok', 'penggajian.kinerja', 'penggajian.makan', 'penggajian.transport', 'penggajian.bpjs_1', 'penggajian.bpjs_2', 'penggajian.pinjaman', 'penggajian.kehadiran', 'penggajian.kekurangan_jam_kerja', 'penggajian.premi_ketenaga_kerjaan_1', 'penggajian.premi_kesehatan_1', 'penggajian.premi_ketenaga_kerjaan_2', 'penggajian.premi_kesehatan_2', 'penggajian.pembulatan', 'penggajian.created_at', 'penggajian.lembur', 'penggajian.rapel_iso', 'absensi.cuti', 'absensi.ijin', 'absensi.spj', 'absensi.bolos', 'absensi.jam_lembur', 'absensi.kek_jam_kerja', 'absensi.weekday', 'absensi.weekend', 'absensi.holiday', 'absensi.created_at')
        ->where('penggajian.status', '=', 'uploaded')
        ->where('absensi.status', '=', 'uploaded')
        ->get();
    }

    public function scopeStoreDataKaryawan($query, $data)
    {
        return $query->create($data);
    }

    public function scopeUpdateDataKaryawan($query, $data, $id)
    {
        return $query->where('id', '=', $id)->update($data);
    }

    public function scopeDestroyDataKaryawan($query, $id)
    {
        return $query->where('id', '=', $id)->delete();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
