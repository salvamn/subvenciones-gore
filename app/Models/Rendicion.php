<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendicion extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si es diferente del plural del modelo
    protected $table = 'rendiciones';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'numero_de_rendicion',
        'fecha_de_ingreso',
        'fecha_de_cierre',
        'dias',
        'monto_rendido',
        'monto_aprobado',
        'monto_observado',
        'analista',
        'proyecto_id', // Este es el campo que conecta la rendición con el proyecto
    ];

    // Relación: Una rendición pertenece a un proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class); // Relación inversa
    }
}
