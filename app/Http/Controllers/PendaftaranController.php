<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;


class PendaftaranController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pendaftaran.index');
    }

    public function lokasi()
    {
        return view('frontend.lokasi');
    }

    public function data()
    {
        $daftar = Pendaftaran::orderBy('id', 'desc')->get();;
        return view('backend.pendaftaran.index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //penomeran no_keluhan
          $romawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
            $cc = Pendaftaran::whereYear("created_at",Carbon::now()->year)->count();
            $no = 0;
            if($cc) {
                $no_daftar = sprintf("%02s", $cc+1). '/' . $romawi[date('n')] .'/' . date('Y');
            }
            else {
                $no_daftar = sprintf("%02s", $cc+1). '/' . $romawi[date('n')] .'/' . date('Y');
            }

        $pendaftaran = new Pendaftaran();
        $pendaftaran->no_pendaftaran = $no_daftar;
        $pendaftaran->tgl_pendaftaran = date('Y-m-d');
        $pendaftaran->nama_pendaftaran = $request->nama_pendaftaran;
        $pendaftaran->no_telp = $request->no_telp;
        $pendaftaran->email = $request->email;
        $pendaftaran->metode_pembayaran = $request->metode_pembayaran;
         if($request->hasFile('bukti_pembayaran')){
		$filenameWithExt = $request->file('bukti_pembayaran')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('bukti_pembayaran')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.date('Ymd').'_'.time().'.'.$extension;
        $path = $request->file('bukti_pembayaran')->move('image/pendaftaran', $filenameSimpan);
	    }else{
		$filenameSimpan = '/image/pendaftaran/default.png';
	    }
        $pendaftaran->bukti_pembayaran = $filenameSimpan;
        $pendaftaran->status = 'PENDING';
        $pendaftaran->save();

        Alert::success('Congrats', 'Pendaftaran Berhasil, Silahkan Hubungi Nomer WA yang tertera !!!');

        return redirect()->back();
    }


    public function status(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->tgl_verifikasi = Carbon::today();
        $pendaftaran->status = 'TERVERIFIKASI';
        $pendaftaran->update();

        // $complaint->email = Auth::user()->email;

        // $complaint->notify(new UpdateProsesEmailComplaint($complaint));

        Alert::info('Info', 'Data Pendaftaran telah Terverifikasi...');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
         $pendaftaran->delete();

        Alert::warning('Deleted', 'Data Pendaftaran di Hapus');
        return redirect()->route('datapendaftaran.index');
    }
}