<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePelatihRequest;
use App\Models\Instructure;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InstructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatih = Instructure::with('level')->get();

        return view('backend.pelatih.index', compact('pelatih'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = Level::all();

        return view('backend.pelatih.create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelatihRequest $request)
    {
        $orderObj = DB::table('instructures')->select('nisp')->latest('nisp')->first();
        if ($orderObj) {
            $orderNr = $orderObj->nisp;
            $removed1char = substr($orderNr, 10);
            $no_ak = 'NP'.'-'.date('Y').date('n') . str_pad($removed1char + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $no_ak = 'NP'.'-'.date('Y').date('n') . str_pad(1, 4, "0", STR_PAD_LEFT);
        }


        $pelatih = new Instructure();
        $pelatih->user_id = Auth::id();
        $pelatih->level_id = $request->level_id;
        $pelatih->nisp = $no_ak;
        $pelatih->nama = $request->nama;
          if($request->hasFile('foto')){
		$filenameWithExt = $request->file('foto')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('foto')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.date('Ymd').'_'.time().'.'.$extension;
        $path = $request->file('foto')->move('foto/pelatih', $filenameSimpan);
	    }else{
		$filenameSimpan = 'default.png';
	    }
        $pelatih->foto = $filenameSimpan;
        $pelatih->jenis_kelamin = $request->jenis_kelamin;
        $pelatih->tempat_lahir = $request->tempat_lahir;
        $pelatih->tgl_lahir = $request->tgl_lahir;
        $pelatih->no_hp = $request->no_hp;
        $pelatih->fb = $request->fb;
        $pelatih->twitter = $request->twitter;
        $pelatih->ig = $request->ig;
        $pelatih->save();

        // dd($student);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->route('data-pelatih.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructure  $instructure
     * @return \Illuminate\Http\Response
     */
    public function show(Instructure $instructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructure  $instructure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelatih = Instructure::findOrFail($id);
        $level = Level::all();

        return view('backend.pelatih.edit', compact('pelatih','level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructure  $instructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructure $pelatih)
    {
         $request->validate([
            'nama' => 'required',
            'level_id' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'fb' => 'required',
            'twitter' => 'required',
            'ig' => 'required'
        ]);
        
        $pelatih->user_id = $pelatih->user_id;
        $pelatih->nisp = $pelatih->nisp;
        $pelatih->nama = $request->nama;
        $pelatih->level_id = $request->level_id;
        if (empty($request->file('foto'))){
                $pelatih->foto = $pelatih->foto;
            }
        else{
                unlink('foto/pelatih/'.$pelatih->foto); //menghapus file lama
                $foto = $request->file('foto');
                $ext = $foto->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $foto->move('foto/pelatih',$newName);
                $pelatih->foto = $newName;
            }
        $pelatih->jenis_kelamin = $request->jenis_kelamin;
        $pelatih->tempat_lahir = $request->tempat_lahir;
        $pelatih->tgl_lahir = $request->tgl_lahir;
        $pelatih->no_hp = $request->no_hp;
        $pelatih->fb = $request->fb;
        $pelatih->twitter = $request->twitter;
        $pelatih->ig = $request->ig;
        
        $pelatih->update();
        
        Alert::success('Congrats', 'D Beratahasil Diupdate');
        return redirect()->route('data-pelatih.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructure  $instructure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Instructure::find($id);
        $image_path = public_path().'/'.'foto/pelatih/'.$data->foto;
        unlink($image_path);
        $data->delete();


        Alert::warning('Deleted', 'Data Berhasil di Hapus');
       return redirect()->back();
    }
}