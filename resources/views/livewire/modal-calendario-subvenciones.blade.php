<div class="flex flex-row items-center">
    {{-- Stop trying to control. --}}
    <style>
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1rem;
        }

        .day {
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .day-header {
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 10px;
        }
    </style>
    
    <button id="fecha-pago"
        class="rounded-full shadow active:scale-90 hover:bg-green-200 bg-green-50 border border-green-200 text-black text-sm px-2"
        wire:click="openModal">ver
    </button>

    @if ($isOpen)
    <div id="modal-calendario" class="relative z-50" style="padding: 0" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Fondo del modal -->
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <!-- Contenido del modal -->
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <!-- Contenido del modal -->
                    <div class="bg-white px-4 pb-4 pt-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center w-full sm:mt-0 sm:text-left">
                                <h3 class="font-semibold text-gray-900 text-lg" id="modal-title">Fecha de pago</h3>
                                <div class="mt-4">

                                    <div class="calendar">
                                        @foreach ($dias as $dia)
                                            @if ($dia == 'Dom')
                                                <div class="day day-header border rounded h-5 flex items-center justify-center border-red-500 text-red-500 shadow-md">
                                                    {{ $dia }}
                                                </div>
                                            @else
                                                <div class="day day-header border rounded h-5 flex items-center justify-center border-green-500 text-green-500 shadow-md">
                                                    {{ $dia }}
                                                </div>
                                            @endif
                                        @endforeach

                                        <!-- Días vacíos antes del inicio del mes -->
                                        @for ($i = 0; $i < $diasVacios; $i++)
                                            <div class="day"></div>
                                        @endfor

                                        <!-- Días del mes -->
                                        @for ($day = 1; $day <= $diasMes; $day++)
                                            @if ($day == 20)
                                                <div class="day px-1 w-14 flex justify-center items-center border border-red-500 text-white bg-red-500 rounded cursor-pointer shadow-md">
                                                    {{ $day }}
                                                </div>
                                            @else
                                                <div class="day border border-gray-200 rounded shadow-md">
                                                    {{ $day }}
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Botón de cierre -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button id="btnCerrarModal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-sky-300 sm:mt-0 sm:w-auto bg-[#0ea5e9]" wire:click="closeModal">
                            Ok
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

</div>