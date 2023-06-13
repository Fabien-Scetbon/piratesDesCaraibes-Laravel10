<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matelot extends Model
{
    use HasFactory;

    protected $table = 'matelots';

    protected $fillable = [
        'nom',
        'prenom',
        'pseudo',
        'age',
        'description',
        'specialites',
    ];
}
