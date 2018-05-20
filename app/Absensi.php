<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['nik', 'cuti', 'ijin', 'spj', 'bolos', 'jam_lembur', 'kek_jam_kerja', 'weekday', 'weekend', 'holiday', 'periode', 'status', 'penggajian', 'created_at'];
    protected $dates = ['periode', 'penggajian'];

    public function scopeGetAllAbsensiData($query)
    {
    	return $query->join('karyawan', 'absensi.nik', '=', 'karyawan.nik')->select('absensi.*', 'karyawan.nama')->get();
    }
}
