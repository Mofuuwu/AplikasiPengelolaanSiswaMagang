<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'schools';
    // protected $fillable = [];
    protected $primaryKey = 'npsn';
    public $timestamps = false;
}
