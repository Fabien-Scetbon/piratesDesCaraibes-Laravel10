<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tresor extends Model
{
    use HasFactory;

    protected $table = 'tresors';

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'poids',
        'etat',
    ];
}
