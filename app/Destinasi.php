<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasi';
    protected $primaryKey = 'id';
    protected $fillable  = [
        'nama',
        'deskripsi',
        'foto',
        'harga'
    ];
}
