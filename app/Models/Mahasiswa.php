<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = "tb_mahasiswa";
    protected $fillable = ['nama','nim','jurusan']; 
}
