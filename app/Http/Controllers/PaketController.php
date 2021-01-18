<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Destinasi;

class PaketController extends Controller
{
    public function index(){
        $paket = Paket::all();
        return view('admin.paket.index',['paket'=>$paket]);
    }

    public function create(){
        $destinasi = Destinasi::all();
        return view('admin.paket.create',['destinasi'=> $destinasi]);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:1',
            'foto' => 'required|file|mimes:jpg,bmp,png|max:10000',
            'destinasi' => 'required|array',
            'destinasi.*' => 'exists:destinasi,id'
        ]);
        $path = null;
        if($request->has('foto') && $request->foto != "undefined"){
            $foto = $request->file('foto');
            $filename = 'Paket-' . time() . '.' . $foto->getClientOriginalExtension();
            $extension = $foto->getClientOriginalExtension();

            $path = 'fotoPaket/'.$filename;
            $foto->move(getcwd().'/fotoPaket',$filename);
        }
        $data = $request->all();
        $data['foto'] = $path;
        $paket = Paket::create($data);
        $paket->destinasi()->attach($request->destinasi);

        return redirect('/paket')->with('success', 'Berhasil tambah paket!');
    }

    public function delete($id){
        Paket::where('id', $id)->delete();
        return redirect('/paket')->with('success', 'Berhasil hapus paket!');
    }

    public function edit($id){
        $data = Paket::with('destinasi')->where('id', $id)->first();
        $destinasi = Destinasi::all();
        return view('admin.paket.edit',['paket'=> $data, 'destinasi'=>$destinasi]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'string|max:255',
            'deskripsi' => 'string',
            'harga' => 'integer|min:1',
            'foto' => 'file|mimes:jpg,bmp,png|max:10000',
            'destinasi' => 'array',
            'destinasi.*' => 'exists:destinasi,id'
        ]);
        $path = null;
        if($request->has('foto') && $request->foto != "undefined"){
            $foto = $request->file('foto');
            $filename = 'Paket-' . time() . '.' . $foto->getClientOriginalExtension();
            $extension = $foto->getClientOriginalExtension();

            $path = 'fotoPaket/'.$filename;
            $foto->move(getcwd().'/fotoPaket',$filename);
        }
        $data = $request->all();
        if($path != null){
            $data['foto'] = $path;
        }
        Paket::find($id)->update($data);
        $paket = Paket::find($id);
        $paket->destinasi()->detach();
        $paket->destinasi()->attach($request->destinasi);

        return redirect('/paket')->with('success', 'Berhasil edit paket!');
    }
}
