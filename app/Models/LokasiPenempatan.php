<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiPenempatan extends Model
{
    use HasFactory;
    protected $table = 'placementlocations';
    // protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
