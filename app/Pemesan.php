<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $table = 'pemesan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'email',
        'nomor_handphone',
    ];
}
