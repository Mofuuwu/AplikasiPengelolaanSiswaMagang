<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingSekolah extends Model
{
    use HasFactory;
    protected $table = 'schooladvisors';
    // protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
