<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $fillable  = [
        'nama',
        'deskripsi',
        'foto',
        'harga'
    ];

    public function destinasi(){
        return $this->belongsToMany(Destinasi::class, 'paket_destinasi');
    }
}
