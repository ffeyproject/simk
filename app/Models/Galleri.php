<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galleri extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','categorie_id','nama_gambar','image', 'keterangan', 'status'];

    public $table = "galleries";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function categori(): BelongsTo
    {
        return $this->belongsTo(Categori::class, 'categorie_id');
    }
}