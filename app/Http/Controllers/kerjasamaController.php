<?php

namespace App\Http\Controllers;

use App\Models\kerjasama;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class kerjasamaController extends Controller
{
    public function index(){
        $kerjasama = Kerjasama::paginate(10);
        return view('kerjasama.index', compact('kerjasama'));
    }

    public function tambah(){

        return view('kerjasama.form');
    }

    public function simpan(Request $request){
        $data = [
            'id' => $request->id,
            'judul' => $request->judul,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status_pengisian' => $request->status_pengisian,
            'status_berkas' => $request->status_berkas,
        ];

        kerjasama::create($data);

        return redirect()->route('kerjasama');
    }

    public function edit($id){
            $kerjasama = kerjasama::find($id);

            return view('kerjasama.form',['kerjasama' => $kerjasama]);
    }

    public function update($id, Request $request){
        $data = [
            'id' => $request->id,
            'judul' => $request->judul,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status_pengisian' => $request->status_pengisian,
            'status_berkas' => $request->status_berkas,
        ];

        $kerjasama = kerjasama::find($id)->update($data);

        return redirect()->route('kerjasama');
    }

    public function hapus($id){
        kerjasama::find($id)->delete();
        return redirect()->route('kerjasama');
    }
}
