<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Absen;
use App\Models\Championship;
use App\Models\HistoryLevel;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::orderBy('id', 'desc')->get();

        return view ('backend.siswa.index', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('is_admin', '=', 'false')->get();
        
        return view('backend.siswa.create', [
            'user' => $user
        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $orderObj = DB::table('students')->select('nisk')->latest('nisk')->first();
        if ($orderObj) {
            $orderNr = $orderObj->nisk;
            $removed1char = substr($orderNr, 5);
            $no_ak = date('Y') . str_pad($removed1char + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $no_ak = date('Y') . str_pad(1, 4, "0", STR_PAD_LEFT);
        }


        $student = new Student();
        $student->user_id = $request->user_id;
        $student->nisk = $no_ak;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->tempat_lahir = '-';
        $student->tgl_lahir = null;
        $student->tahun_masuk = $request->tahun_masuk;
        $student->no_hp = '-';
        $student->nama_ortu = '-';
        $student->save();

        // dd($student);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->route('datasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function mydata()
    {
        $student = new Student();
        $student = Student::where('user_id', '=', Auth::user()->id )->get();

        $absen = new Absen();
        $absen = Absen::where('user_id', '=', Auth::user()->id )->orderBy('id', 'desc')->take(5)->get();

        $history = new HistoryLevel();
        $history = HistoryLevel::with('student', 'level')->where('student_id', '=', 'student.id' )->get();
        
        $jadwal = Jadwal::all();

        $kejuaraan = Championship::orderBy('id', 'desc')->get();;

        return view('backend.siswa.data', [
                'student' => $student,
                'jadwal' => $jadwal,
                'absen' => $absen,
                'history' => $history,
                'kejuaraan' => $kejuaraan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $student = Student::where('user_id', '=', Auth::user()->id )->findOrFail($id);
        $user = User::where('is_admin', '=', 'false')->get();

         $absen = Absen::where('user_id', '=', Auth::user()->id )->orderBy('id', 'desc')->get();
        
         $history = new HistoryLevel();
        $history = HistoryLevel::with('student', 'level')->where('student_id', '=', $id )->orderBy('id', 'desc')->get();

        return view('backend.siswa.profile', [
                'student' => $student,
                'user' => $user,
                'history' => $history,
                'absen' => $absen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $user = User::where('is_admin', '=', 'false')->get();

        return view('backend.siswa.edit', [
                'student' => $student,
                'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->nisk = $student->nisk;
        $student->user_id = $request->user_id;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->tempat_lahir = $request->tempat_lahir;
        $student->tgl_lahir = $request->tgl_lahir;
        $student->tahun_masuk = $request->tahun_masuk;
        $student->no_hp = $request->no_hp;
        $student->nama_ortu = $request->nama_ortu;
        $student->update();

        $foto = User::findOrFail($request->user_id);
            
            if($request->hasFile('avatar')){
            $request->validate([
              'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('avatar');
            $ext = $path->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $path->move('foto/user',$newName);
                $foto->avatar = $newName;
        }
    //  if ($image = $request->file('avatar')) {
    //         $destinationPath = 'foto/user/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $foto['avatar'] = "$profileImage";
    //     }else{
    //         unset($foto['avatar']);
    //     }
        $foto->update();

        
        Alert::success('Congrats', 'Data Profile Berhasil Diupdate');

        return redirect()->route('datasiswa.index');
    }


    public function ufoto(Request $request, User $user)
    {
        
    
        $user = User::findOrFail(Auth::id());
            
          if($request->hasFile('avatar')){
            $request->validate([
              'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('avatar');
            $ext = $path->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $path->move('foto/user',$newName);
                $user->avatar = $newName;
        }
            // dd($user);
        $user->update();

        Alert::success('Congrats', 'Data Profile Berhasil Diubah');

        return redirect()->back();
    }

    public function downloadKartu($id){
      $student = Student::where('user_id', '=', Auth::user()->id )->findOrFail($id);

    //   $pdf = PDF::loadView('backend.siswa.kartu', compact('student'));
    //   return $pdf->file('kartuAnggota.pdf');

      $pdf = PDF::loadview('backend.siswa.kartu', compact('student'))
        ->setPaper('a5', 'potrait')
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true ,'chroot' => public_path()]);
        $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                ]
            ])
        );
         set_time_limit(1200);

        return $pdf->stream('Kartu Anggota'.'-'.$student->nisk.','.Auth::user()->name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
         $student->delete();

          Alert::warning('Deleted', 'Data Siswa Berhasil di Hapus');
        return redirect()->route('datasiswa.index');
    }
}