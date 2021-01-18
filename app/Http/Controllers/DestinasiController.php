<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destinasi;

class DestinasiController extends Controller
{
    public function index(){
        $destinasi = Destinasi::all();
        return view('admin.destinasi.index',['destinasi'=> $destinasi]);
    }

    public function create(){
        return view('admin.destinasi.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:1',
            'foto' => 'required|file|mimes:jpg,bmp,png|max:10000',
        ]);
        $path = null;
        if($request->has('foto') && $request->foto != "undefined"){
            $foto = $request->file('foto');
            $filename = 'Destinasi-' . time() . '.' . $foto->getClientOriginalExtension();
            $extension = $foto->getClientOriginalExtension();

            $path = 'fotoDestinasi/'.$filename;
            $foto->move(getcwd().'/fotoDestinasi',$filename);
        }
        $data = $request->all();
        $data['foto'] = $path;
        Destinasi::create($data);

        return redirect('/destinasi')->with('success', 'Berhasil tambah destinasi!');
    }

    public function delete($id){
        Destinasi::where('id', $id)->delete();
        return redirect('/destinasi')->with('success', 'Berhasil hapus destinasi!');
    }

    public function edit($id){
        $data = Destinasi::find($id);
        return view('admin.destinasi.edit',['destinasi'=> $data]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'string|max:255',
            'deskripsi' => 'string',
            'harga' => 'integer|min:1',
            'foto' => 'file|mimes:jpg,bmp,png|max:10000',
        ]);
        $path = null;
        if($request->has('foto') && $request->foto != "undefined"){
            $foto = $request->file('foto');
            $filename = 'Destinasi-' . time() . '.' . $foto->getClientOriginalExtension();
            $extension = $foto->getClientOriginalExtension();

            $path = 'fotoDestinasi/'.$filename;
            $foto->move(getcwd().'/fotoDestinasi',$filename);
        }
        $data = $request->all();
        if($path != null){
            $data['foto'] = $path;
        }
        Destinasi::find($id)->update($data);

        return redirect('/destinasi')->with('success', 'Berhasil edit destinasi!');
    }
    
}
