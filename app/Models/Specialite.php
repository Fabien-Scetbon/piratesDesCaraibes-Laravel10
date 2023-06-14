<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialite extends Model
{
    use HasFactory;

    protected $table = 'specialites';

    protected $fillable = [
        'nom',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'specialite_user');
    }
}
