<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['nama_buku','penerbit','jenis_buku','thn_terbit'];


    public function dbook() {
        return $this->hasOne(Dbook::class);
    }
}
