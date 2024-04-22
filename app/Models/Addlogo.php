<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addlogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'file',
    ];

    // protected $gaurded = [];
}
