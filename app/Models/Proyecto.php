<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si es diferente del plural del modelo
    protected $table = 'proyectos';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'institucion',
        'rut',
        'monto',
        'monto_por_rendir',
        'proyecto',
        'estado',
        'duracion',
        'fecha_pago',
    ];

    // Relación: Un proyecto tiene muchas rendiciones
    public function rendiciones()
    {
        return $this->hasMany(Rendicion::class);
    }
}
