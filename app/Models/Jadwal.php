<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','hari','mulai','berhenti', 'keterangan'];

    public $table = "jadwals";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 
}