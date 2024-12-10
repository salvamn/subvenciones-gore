<?php

// app/Models/Salon.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'aforo'];

    // Relación de salón con reservas
    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class, 'id_salon');
    }
}
