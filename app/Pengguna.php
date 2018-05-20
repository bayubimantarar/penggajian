<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    protected $guard = 'pengguna';
    protected $table = 'pengguna';
    
    protected $fillable = ['nama', 'email', 'password'];
    protected $hidden = ['password'];

    public function scopeGetAllPenggunaData($query)
    {
    	return $query->get();
    }

    public function scopeGetSingleDataPengguna($query, $id)
    {
        return $query->findOrFail($id);
    }

    public function scopeStoreDataPengguna($query, $data)
    {
        return $query->create($data);
    }

    public function scopeUpdateDataPengguna($query, $data, $id)
    {
        return $query->where('id', '=', $id)->update($data);
    }

    public function scopeDestroyDataPengguna($query, $id)
    {
        return $query->where('id', '=', $id)->delete();
    }
}
