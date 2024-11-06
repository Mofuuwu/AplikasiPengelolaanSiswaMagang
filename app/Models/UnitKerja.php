<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'workunits';
    // protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
