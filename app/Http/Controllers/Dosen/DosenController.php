<?php

namespace App\Http\Controllers\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
        public function cekObjek(){
            $dosen = new Dosen();
            dd($dosen);
        }

        public function insert(){
            $dosen = new Dosen();
            $dosen -> name = "aldio";
            $dosen -> nik = "1234543";
            $dosen -> email = "alsdio@gmail.com";
            $dosen -> nohp = "12344211";
            $dosen -> alamat = "Pasbar ni bos";
            $dosen -> keahlian = "raja java";
            $dosen -> save();
            dd($dosen);

        }

        public function massAssignment() // ✅ sesuai dengan route
        {
            $dosen = Dosen::create([
                'name' => "aldio lagi",
                'nik' => "1232123",
                'email' => "alsdi1o@gmail.com",
                'nohp' => "123422211",
                'alamat' => "Pasbar bos",
                'keahlian' => "raja ular"
            ]);
            dd($dosen);
        }

        public function update(){
            $dosen = Dosen::find(2);
            $dosen -> keahlian = "mobile programing";
            $dosen -> save();
            dd($dosen);
        }
        
        public function updateWhere(){
            $dosen = Dosen::where('nohp','12344211')->first();
            $dosen -> keahlian = "AI";
            $dosen -> save();
            dd($dosen);
        }
        
        public function massUpdate(){
            $dosen = Dosen::where('nohp','12344211')->first()->update([
                'name' => "Yaspindoo",
                'keahlian' => "raja python",
            ]);
            dd($dosen);
        }
}
