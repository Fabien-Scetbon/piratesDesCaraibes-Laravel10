<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialite extends Model
{
    use HasFactory;

    protected $table = 'specialites';

    protected $fillable = [
        'nom',
    ];

    public function matelots(): HasMany
    {
        return $this->hasMany(Matelot::class);
    }

}
