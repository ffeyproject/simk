<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftaran extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = ['no_pendaftaran','tgl_pendaftaran', 'nama_pendaftaran', 'email', 'metode_pembayaran', 'bukti_pembayaran', 'status'];

    public $table = "registrations";
}