<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','jadwal_id','tgl_hadir','foto', 'keterangan', 'status'];

    public $table = "absens";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class);
    }
    
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}