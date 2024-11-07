<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingUniversitas extends Model
{
    use HasFactory;
    protected $table = 'universityadvisor';
    // protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

}
