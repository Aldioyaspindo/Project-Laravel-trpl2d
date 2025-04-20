<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosens";
    protected $fillable = ['name','nik','email','nohp','alamat','keahlian',];
    use softDeletes;
}


