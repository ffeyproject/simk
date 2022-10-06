<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Image;


class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $student = Student::where('user_id', '=', Auth::user()->id )->findOrFail($id);
        $user = User::where('is_admin', '=', 'false')->get();
        $jadwal = Jadwal::all();

         $absen = Absen::with('student','jadwal')->where('student_id', '=', $id  )->get();
        
         return view('backend.absen.index', compact('student','user','jadwal','absen'));
    }
    
    public function indexutama()
    {
        // $student = Student::where('user_id', '=', Auth::user()->id )->findOrFail($id);
        // $user = User::where('is_admin', '=', 'false')->get();
        // $jadwal = Jadwal::all();

         $absen = Absen::with('student','jadwal')->where('status', '=' , 'HADIR')->orWhere('status', '=', 'TIDAK HADIR')->orderBy('id', 'desc')->get();
         $pending = Absen::with('student','jadwal')->where('status', '=', 'PENDING')->orderBy('id', 'desc')->get();
        
         return view('backend.absen.index', compact('absen','pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         $student = Student::where('user_id', '=', Auth::user()->id )->findOrFail($id);
        $user = User::where('is_admin', '=', 'false')->get();
        $jadwal = Jadwal::all();

         $absen = Absen::with('student','jadwal')->where('student_id', '=', $id  )->get();
        
         return view('backend.absen.create', compact('student','user','jadwal','absen'));
    }
    public function history($id)
    {
         $student = Student::where('user_id', '=', Auth::user()->id )->findOrFail($id);
        $user = User::where('is_admin', '=', 'false')->get();
        $jadwal = Jadwal::all();

         $absen = Absen::with('student','jadwal')->where('student_id', '=', $id  )->get();
        
         return view('backend.absen.index', compact('student','user','jadwal','absen'));
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
            'student_id' => 'required',
            'tgl_hadir' => 'required',
            'jadwal_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1500'
        ]);
        
      $image = $request->file('foto');
        $input['foto'] = time() . '.' . $image->extension();

        // Get path folder from /public
        // $thumbnailFilePath = public_path('foto/absen');

        // $img = Image::make($image->path());

        // $img->resize(450, 150, function ($const) {
        //     $const->aspectRatio();
        // })->save($thumbnailFilePath . '/' . $input['product_image']);

        $destinationPath = public_path('foto/absen');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(450, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['foto']);
        $destinationPath = public_path('foto/absen');
        $image->move($destinationPath, $input['foto']);


        $absen = new Absen();

       $absen->user_id = Auth::id();
       $absen->student_id = $request->student_id;
        $absen->tgl_hadir = $request->tgl_hadir;
        $absen->jadwal_id = $request->jadwal_id;
        $absen->keterangan = $request->keterangan;
        $absen->foto = $input['foto'];

        $absen->save();
        Alert::success('Congrats', 'Data Berhasil Ditambahkan');
        return redirect()->route('mydata.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
         $absen->status = 'HADIR';
         $absen->update();
         Alert::success('Congrats', 'Data Berhasil Ditambahkan');
         return redirect()->back();
    }
    
    public function hadir(Absen $absen ,Request $request )
    {
         $absen->status = 'HADIR';
        //  dd($absen);
         $absen->update();
         Alert::success('Congrats', 'Absen Telah Di setujui');
          return redirect()->back();
    }
    
    public function non(Request $request, Absen $absen)
    {
        $absen->status = 'TIDAK HADIR';
        $absen->update();  
         Alert::success('Congrats', 'Absen Telah Di Tolak');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Absen::find($id);
        $image_path = public_path().'/'.'foto/absen/'.$data->foto;
        unlink($image_path);
        $data->delete();

        Alert::warning('Deleted', 'Absen Berhasil di Hapus');
       return redirect()->back();
    }
}