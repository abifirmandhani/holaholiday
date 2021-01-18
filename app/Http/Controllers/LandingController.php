<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Destinasi;
use App\Transaksi;
use App\Pemesan;
use Auth;

class LandingController extends Controller
{
    public function index(){
        $paket = Paket::limit(3)->get();
        $destinasi = Destinasi::limit(3)->get();
        return view('landing.home',['paket'=>$paket, 'destinasi'=>$destinasi]);
    }

    public function transaksi(){
        $data = Transaksi::with('pemesan', 'destinasi','paket')->where('user_id', Auth::user()->id)->get();
        return view('landing.transaksi',['transaksi'=>$data]);
    }

    public function paket(){
        $paket = Paket::paginate(15);
        return view('landing.paket',['paket'=>$paket]);
    }

    public function destinasi(){
        $destinasi = Destinasi::paginate(15);
        return view('landing.destinasi',['destinasi'=>$destinasi]);
    }

    public function detailPaket($id){
        $paket = Paket::with('destinasi')->where('id', $id)->first();
        return view('landing.detailPaket',['paket'=>$paket]);
    }

    public function detailDestinasi($id){
        $destinasi = Destinasi::where('id', $id)->first();
        return view('landing.detailDestinasi',['destinasi'=>$destinasi]);
    }

    public function pemesananPaket($id){
        $paket = Paket::with('destinasi')->where('id', $id)->first();
        return view('landing.pemesananPaket',['paket'=>$paket]);
    }

    public function pemesananDestinasi($id){
        $destinasi = Destinasi::where('id', $id)->first();
        return view('landing.pemesananDestinasi',['destinasi'=>$destinasi]);
    }

    public function pemesanan(Request $request, $id){
        $request->validate([
            'email' => 'required|email:rfc',
            'nama' => 'required|string|max:255',
            'nomor_handphone' => 'required|string|min:10',
            'tanggal' => 'required|date',
        ]);

        if($request->type == "destinasi"){
            $data = Destinasi::find($id);
        }else{
            $data = Paket::find($id);
        }
        $pemesan = Pemesan::create($request->all());

        $transaksi = new Transaksi;
        $transaksi->user_id = Auth::user()->id;
        if($request->type == "destinasi"){
            $transaksi->destinasi_id = $id;
        }else{
            $transaksi->paket_id = $id;
        }
        $transaksi->pemesan_id = $pemesan->id;
        $transaksi->harga_total = $data->harga;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->save();

        return redirect('landing/transaksi')->with('success','Berhasil melakukan pemesanan!');
    }

    public function pembayaran($id){
        $transaksi = Transaksi::find($id);
        return view('landing.pembayaran',['transaksi'=>$transaksi]);
    }

    public function buktiPembayaran(Request $request, $id){
        $request->validate([
            'foto' => 'file|mimes:jpg,bmp,png|max:10000'
        ]);

        $path = null;
        if($request->has('foto') && $request->foto != "undefined"){
            $foto = $request->file('foto');
            $filename = 'Pembayaran-' . time() . '.' . $foto->getClientOriginalExtension();
            $extension = $foto->getClientOriginalExtension();

            $path = 'Pembayaran/'.$filename;
            $foto->move(getcwd().'/Pembayaran',$filename);
        }
        if(Transaksi::find($id)->update([
            'foto_pembayaran'   => $path,
            'status'    => "Sudah Dibayar"
        ])){
            return redirect('landing/transaksi')->with('success','Berhasil melakukan pembayaran!');
        }
        return redirect('landing/transaksi')->with('error','Gagal melakukan pembayaran!');
    }

    public function kontak(){
        return view('landing.kontak');
    }
}
