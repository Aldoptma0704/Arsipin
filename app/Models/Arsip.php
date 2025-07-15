<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_path',
        'kategori_arsip_id',
        'user_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriArsip::class, 'kategori_arsip_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
