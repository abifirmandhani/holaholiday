<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable  = [
        'user_id',
        'paket_id',
        'destinasi_id',
        'pemesan_id',
        'harga_total',
        'tanggal',
        'foto_pembayaran',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function destinasi(){
        return $this->belongsTo(Destinasi::class);
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }

    public function pemesan(){
        return $this->belongsTo(Pemesan::class);
    }
}
