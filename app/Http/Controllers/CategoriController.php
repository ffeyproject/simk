<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categori = Categori::all();

        return view('backend.categori.index', compact('categori'));
        
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
         $request->validate([
            'nama_categori' => 'required',
            'keterangan' => 'required'
        ]);

        $categori = new Categori();
        $categori->user_id = Auth::id();
        $categori->nama_categori = $request->nama_categori;
        $categori->keterangan = $request->keterangan;
        $categori->save();

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function show(Categori $categori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function edit(Categori $categori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categori $categori)
    {
         $request->validate([
            'nama_categori' => 'required',
            'keterangan' => 'required'
        ]);

         $categori->nama_categori = $request->nama_categori;
        $categori->keterangan = $request->keterangan;
        $categori->update();

        Alert::success('Congrats', 'Data Categori Berhasil Diupdate');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categori $categori)
    {
         $categori->delete();

          Alert::warning('Deleted', 'Data Categori Berhasil di Hapus');
        return redirect()->back();
    }
}