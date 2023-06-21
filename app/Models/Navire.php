<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'canons'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function ressources(): HasMany
    {
        return $this->hasMany(Ressource::class);
    }

    public function tresors(): HasMany
    {
        return $this->hasMany(Tresor::class);
    }
}
