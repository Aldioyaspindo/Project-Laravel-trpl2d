<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Dosen extends Model
{
    protected $fillable = ['name','nik','email','nohp','alamat','keahlian',];
    use softDeletes;
}


