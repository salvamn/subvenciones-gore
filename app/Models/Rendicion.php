<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendicion extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_de_rendicion',
        'analista',
        'fecha_de_ingreso',
        'fecha_de_cierre',
        'dias',
        'monto_rendido',
        'monto_aprobado',
        'monto_observado',
    ];

    public static $rules = [
        'numero_de_rendicion' => 'nullable|numeric',
        'analista' => 'nullable|string|max:255',
        'fecha_de_ingreso' => 'nullable|date',
        'fecha_de_cierre' => 'nullable|date',
        'dias' => 'nullable|integer',
        'monto_rendido' => 'nullable|numeric',
        'monto_aprobado' => 'nullable|numeric',
        'monto_observado' => 'nullable|numeric',
    ];
}
