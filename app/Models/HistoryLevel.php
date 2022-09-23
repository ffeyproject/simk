<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryLevel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','student_id','level_id','tgl_level', 'keterangan'];

    public $table = "history_levels";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}