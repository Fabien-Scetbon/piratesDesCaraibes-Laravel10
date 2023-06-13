<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navire extends Model
{
    use HasFactory;

    protected $table = 'navires';

    protected $fillable = [
        'nom',
        'bois',
        'coque',
        'misaine',
        'mat',
        'cachots',
        'cabines',
        'gouvernail',
        'voiles',
        'pavillon',
        'pont',
    ];
}
