<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::all();
        return view('backend.sabuk.index', compact('level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sabuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLevelRequest $request)
    {
        $orderObj = DB::table('levels')->select('kode_sabuk')->latest('kode_sabuk')->first();
        if ($orderObj) {
            $orderNr = $orderObj->kode_sabuk;
            $removed1char = substr($orderNr, 3);
            $no_ak = 'S' . str_pad($removed1char + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $no_ak = 'S' . str_pad(1, 4, "0", STR_PAD_LEFT);
        }


        $level = new Level();
        $level->user_id = Auth::id();
        $level->kode_sabuk = $no_ak;
        $level->nama_sabuk = $request->nama_sabuk;
        $level->keterangan = $request->keterangan;
        $level->save();

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->route('data-sabuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $level = Level::findOrFail($id);

        return view('backend.sabuk.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->kode_sabuk = $level->kode_sabuk;
        $level->user_id = $level->user_id;
        $level->nama_sabuk = $request->nama_sabuk;
        $level->keterangan = $request->keterangan;
        $level->status = $request->status;
        $level->update();

        Alert::success('Congrats', 'Data Sabuk Berhasil Diupdate');

        return redirect()->route('data-sabuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
         $level->delete();

        Alert::warning('Deleted', 'Data Sabuk Berhasil di Hapus');
        return redirect()->route('data-sabuk.index');
    }
}