<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbook extends Model
{
    use HasFactory;
    protected $table = 'dbooks';
    protected $fillable = ['jenis_buku'];


    public function book() {
        return $this->hasMany(Book::class);
    }
}
