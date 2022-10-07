<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\Galleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class GalleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $galleri = Galleri::with('categori')->orderBy('id', 'desc')->get();
        return view('backend.galleri.index', compact('galleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Categori::all();
        
        
        return view('backend.galleri.create', compact('categori'));
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
            'categorie_id' => 'required',
            'nama_gambar' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3500',
            'keterangan' => 'required'
        ]);

        $galleri = new Galleri();
        $galleri->user_id = Auth::id();        
        $galleri->categorie_id = $request->categorie_id;
        $galleri->nama_gambar = $request->nama_gambar;
         if($request->hasFile('image')){
		$filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.date('Ymd').'_'.time().'.'.$extension;
        $path = $request->file('image')->move('image/galeri', $filenameSimpan);
	    }else{
		$filenameSimpan = 'default.png';
	    }
        $galleri->image = $filenameSimpan;
        $galleri->keterangan = $request->keterangan;
        $galleri->save();

        Alert::success('Congrats', 'Image Berhasil Ditambahkan');
        return redirect()->route('data-galeri.index');
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function show(Galleri $galleri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleri = Galleri::findOrFail($id);
        $categori = Categori::where('status', '=', '1')->get();
        // $categori = Categori::all();

        return view('backend.galleri.edit', [
                'galleri' => $galleri,
                'categori' => $categori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galleri $galleri)
    {
         $request->validate([
            'categorie_id' => 'required',
            'nama_gambar' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3500',
            'status' => 'required',
            'keterangan' => 'required'
        ]);

        $galleri->categorie_id = $request->categorie_id;
        $galleri->nama_gambar = $request->nama_gambar;
        if (empty($request->file('image'))){
                $galleri->image = $galleri->image;
            }
        else{
                public_path('image/galeri/'.$galleri->image); //menghapus file lama
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $image->move('image/galeri',$newName);
                $galleri->image = $newName;
            }
        $galleri->keterangan = $request->keterangan;
        $galleri->status = $request->status;
        
        $galleri->update();
        Alert::success('Congrats', 'Image Berhasil Diupdate');
        return redirect()->route('data-galeri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Galleri::find($id);
        $image_path = public_path().'/'.'image/galeri/'.$data->image;
        unlink($image_path);
        $data->delete();


        Alert::warning('Deleted', 'Galeri Berhasil di Hapus');
       return redirect()->back();
    }
}