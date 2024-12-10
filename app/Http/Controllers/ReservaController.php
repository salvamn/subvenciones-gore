<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Usuario;
use App\Models\Salon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservaController extends Controller
{
    // Crear reserva
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_salon' => 'required|exists:salones,id',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'fecha' => 'required|date|after_or_equal:today',
        ]);

        $reserva = Reserva::create($request->all());
        return response()->json($reserva, 201);
    }

    // Editar reserva
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        // Verificar que el usuario es el mismo que el de la reserva (si corresponde)
        if ($reserva->id_usuario != $request->id_usuario) {
            return response()->json(['error' => 'No puedes editar esta reserva'], 403);
        }

        $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'fecha' => 'required|date|after_or_equal:today',
        ]);

        $reserva->update($request->all());
        return response()->json($reserva);
    }

    // Eliminar reserva
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return response()->json(['message' => 'Reserva eliminada con éxito']);
    }
}
