<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
        $data = Transaksi::with('pemesan', 'destinasi','paket')->get();
        return view('admin.transaksi.index',['transaksi'=>$data]);
    }

    public function delete($id){
        Transaksi::where('id', $id)->delete();
        return redirect('/transaksi')->with('success', 'Berhasil hapus transaksi!');
    }
}
