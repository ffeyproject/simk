<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoryLevelRequest;
use App\Models\HistoryLevel;
use App\Models\Level;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HistoryLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = HistoryLevel::with('student', 'level')->orderBy('id', 'desc')->get();
        $student = Student::all();
        $level = Level::all();
        return view('backend.history.index', compact('history', 'student', 'level'));
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
    public function store(StoreHistoryLevelRequest $request)
    {
        $history = new HistoryLevel();
        $history->user_id = Auth::id();
        $history->student_id = $request->student_id;
        $history->level_id = $request->level_id;
        $history->tgl_level = $request->tgl_level;
        $history->keterangan = $request->keterangan;
        $history->save();

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryLevel  $historyLevel
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryLevel $historyLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryLevel  $historyLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryLevel $historyLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryLevel  $historyLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryLevel $historyLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryLevel  $historyLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryLevel $historyLevel)
    {
        //
    }
}