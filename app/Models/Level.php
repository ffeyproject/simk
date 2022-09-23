<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','kode_sabuk','nama_sabuk','keterangan'];

    public $table = "levels";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 
}