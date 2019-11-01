<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
      public $incrementing = false;
    protected  $primaryKey = 'id_transaction';
    protected $fillable = [
        'id_transaction',
        // 'id_vehicle',
        'id_peminjam',
        'id_admin',
        // 'id_driver',
        'keperluan',
        'tujuan',
        'status',
        'tgl_pinjam',
        'tgl_kembali'
    ];

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle');
    }
}
