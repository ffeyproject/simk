<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChampionshipRequest;
use App\Http\Requests\UpdateChampionshipRequest;
use App\Models\Championship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejuaraan = Championship::all();
        return view('backend.kejuaraan.index', compact('kejuaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kejuaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChampionshipRequest $request)
    {
          $orderObj = DB::table('championships')->select('kode_kejuaraan')->latest('kode_kejuaraan')->first();
        if ($orderObj) {
            $orderNr = $orderObj->kode_kejuaraan;
            $removed1char = substr($orderNr, 3);
            $no_ak = 'K' . str_pad($removed1char + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $no_ak = 'K' . str_pad(1, 4, "0", STR_PAD_LEFT);
        }


        $kejuaraan = new Championship();
        $kejuaraan->user_id = Auth::id();
        $kejuaraan->kode_kejuaraan = $no_ak;
        $kejuaraan->tgl_kejuaraan = $request->tgl_kejuaraan;
        $kejuaraan->nama_kejuaraan = $request->nama_kejuaraan;
        $kejuaraan->tempat_kejuaraan = $request->tempat_kejuaraan;
        $kejuaraan->tingkatan_kejuaraan = $request->tingkatan_kejuaraan;
        $kejuaraan->keterangan = $request->keterangan;
        $kejuaraan->save();

        // dd($kejuaraan);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->route('data-kejuaraan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function show(Championship $championship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kejuaraan = Championship::findOrFail($id);

        return view('backend.kejuaraan.edit', [
                'kejuaraan' => $kejuaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChampionshipRequest $request, Championship $kejuaraan)
    {
        
        $kejuaraan->kode_kejuaraan = $kejuaraan->kode_kejuaraan;
        $kejuaraan->user_id = $kejuaraan->user_id;
        $kejuaraan->nama_kejuaraan = $request->nama_kejuaraan;
        $kejuaraan->tgl_kejuaraan = $request->tgl_kejuaraan;
        $kejuaraan->tingkatan_kejuaraan = $request->tingkatan_kejuaraan;
        $kejuaraan->tempat_kejuaraan = $request->tempat_kejuaraan;
        $kejuaraan->keterangan = $request->keterangan;
        $kejuaraan->status = $request->status;
        $kejuaraan->update();

        Alert::success('Congrats', 'Data Kejuaraan Berhasil Diupdate');

        return redirect()->route('data-kejuaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Championship  $championship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championship $kejuaraan)
    {
         $kejuaraan->delete();

          Alert::warning('Deleted', 'Data Kejuaraan Berhasil di Hapus');
        return redirect()->route('data-kejuaraan.index');
    }
}