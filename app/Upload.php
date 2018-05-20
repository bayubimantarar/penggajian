<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Upload extends Model
{
    protected $table    = 'upload';
    protected $fillable = ['nama_file', 'status'];
    protected $dates = ['periode'];

    public function scopeGetAllUploadData($query)
    {
      return $query
        ->orderBy('periode', 'DESC')
        ->select(DB::raw('GROUP_CONCAT(nama_file separator ", ") as file'), 'id', 'periode', 'created_at')
        ->groupBy('periode')
        ->get();
    }
}
