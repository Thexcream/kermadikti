<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kerjasama extends Model
{
    use HasFactory;
    
    protected $table = 'kerjasama';

    protected $fillable = ['id','judul','tanggal_pengajuan','status_pengisian','status_berkas'];

    
}
