<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instructure extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','level_id','nisp', 'nama','foto','jenis_kelamin','tempat_lahir','tgl_lahir','no_hp','fb','twitter','ig'];

    public $table = "instructures";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    
    
}