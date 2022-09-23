<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorejadwalRequest;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('backend.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejadwalRequest $request)
    {
        
        $jadwal = new Jadwal();
        $jadwal->user_id = Auth::id();
        $jadwal->hari = $request->hari;
        $jadwal->mulai = $request->mulai;
        $jadwal->berhenti = $request->berhenti;
        $jadwal->keterangan = $request->keterangan;
        $jadwal->save();

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('backend.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->user_id = $jadwal->user_id;
        $jadwal->hari = $request->hari;
        $jadwal->mulai = $request->mulai;
        $jadwal->berhenti = $request->berhenti;
        $jadwal->keterangan = $request->keterangan;
        $jadwal->status = $request->status;
        $jadwal->update();

        Alert::success('Congrats', 'Data Jadwal Berhasil Diupdate');

        return redirect()->route('data-jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        Alert::warning('Deleted', 'Data Jadwal Berhasil di Hapus');
        return redirect()->route('data-jadwal.index');
    }
}