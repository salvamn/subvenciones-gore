<?php

// app/Models/Reserva.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'id_salon', 'hora_inicio', 'hora_fin', 'fecha'];

    // Relación con Usuario
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación con Salon
    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'id_salon');
    }
}
