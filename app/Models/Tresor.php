<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'navire_id',
    ];

    public function navireTresor(): BelongsTo
    {
        return $this->belongsTo(Navire::class);
    }
}
