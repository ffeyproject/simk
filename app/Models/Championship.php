<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Championship extends Model
{
    use HasFactory;

     protected $fillable = ['user_id', 'kode_kejuaraan', 'tgl_kejuaraan', 'nama_kejuaraan', 'tingkatan_kejuaraan', 'keterangan', 'status'];

    public $table = "championships";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}