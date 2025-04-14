<?php

namespace App\Http\Controllers\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function cekObjek()
    {
        $dosen = new Dosen();
        dd($dosen);
    }

    public function insert()
    {
        $dosen = new Dosen();
        $dosen->name = "aldio";
        $dosen->nik = "1234543";
        $dosen->email = "alsdio@gmail.com";
        $dosen->nohp = "12344211";
        $dosen->alamat = "Pasbar ni bos";
        $dosen->keahlian = "raja java";
        $dosen->save();
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

    public function update()
    {
        $dosen = Dosen::find(2);
        $dosen->keahlian = "mobile programing";
        $dosen->save();
        dd($dosen);
    }

    public function updateWhere()
    {
        $dosen = Dosen::where('nohp', '12344211')->first();
        $dosen->keahlian = "AI";
        $dosen->save();
        dd($dosen);
    }

    public function massUpdate()
    {
        $dosen = Dosen::where('nohp', '12344211')->first()->update([
            'name' => "Yaspindoo",
            'keahlian' => "raja python",
        ]);
        dd($dosen);
    }

    public function delete()
    {
        $dosen = Dosen::find(3);
        $dosen->delete();
        dd($dosen);
    }

    public function destroy()
    {
        $dosen = Dosen::destroy(4);
        dd($dosen);
    }

    public function massDelete()
    {
        $dosen = Dosen::where('keahlian', 'mobile programing')->delete();
        dd($dosen);
    }

    public function all()
    {
        $dosen = Dosen::all();

        foreach ($dosen as $itemDosen) {
            echo $itemDosen->id . '<br>';
            echo $itemDosen->name . '<br>';
            echo $itemDosen->nik . '<br>';
            echo $itemDosen->email . '<br>';
            echo $itemDosen->nohp . '<br>';
            echo $itemDosen->alamat . '<br>';
            echo $itemDosen->keahlian . '<br><br>';
        }

        dd($dosen);
    }

    public function allView()
    {
        $dosens = Dosen::all();
        return view('dosens.index', ['dosens' => $dosens]);
    }


    public function getWhere()
    {
        $dosens = Dosen::where('keahlian', 'raja ular')
            ->orderBy('name', 'asc')
            ->get();

        return view('dosens.index', ['dosens' => $dosens]);
    }


    public function first()
    {
        $dosens = Dosen::where('keahlian', 'raja ular')->get();
        return view('dosens.index', ['dosens' => $dosens]);
    }

    public function find()
    {
        $dosens = Dosen::find(4);
        return view('dosens.index', ['dosens' => $dosens]);
    }
    public function latest()
    {
        $dosens = Dosen::latest()->get();
        return view('dosens.index', ['dosens' => $dosens]);
    }

    public function limit()
    {
        $dosens = Dosen::latest()->limit(2)->get();
        return view('dosens.index', ['dosens' => $dosens]);
    }
    public function skipTake()
    {
        $dosens = Dosen::orderBy("id")->skip(1)->take(4)->get();
        return view('dosens.index', ['dosens' => $dosens]);
    }

    public function softDelete(){
        Dosen::where('id','4')->delete();
        return 'data berhasil dihapus';
    }

    public function withTrashed(){
        $dosens = Dosen::withTrashed()->get();
        return view('dosens.index',['dosens'=>$dosens]);
    }

    public function restore(){
        Dosen::withTrashed()->where('id','2')->restore();
        return"data berhasil di restore";
    }

    public function forceDelete(){
        Dosen::where('id','2')->forceDelete();
        return "data berhasil di hapus";
    }
}
