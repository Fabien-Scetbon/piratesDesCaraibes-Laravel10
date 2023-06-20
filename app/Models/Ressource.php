<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ressource extends Model
{
    use HasFactory;

    protected $table = 'ressources';

    protected $fillable = [
        'nom',
        'quantite',
        'type',
        'navire_id',
    ];

    public function navireRessource(): BelongsTo
    {
        return $this->belongsTo(Navire::class, 'navire_id');
    }
}
