<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosenTi extends Model
{
    //
    use HasFactory;
    protected $table = "dosen_tis";
    protected $fillable = ['name','nik','email','nohp','alamat','bidang',];
    use softDeletes;
}
