<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <button  wire:click="openModal"
    class="bg-[#198754] shadow-md shadow-gray-400 text-white active:bg-sky-600 hover:bg-green-600 active:scale-90 text-xs font-bold uppercase p-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
    type="button">RENDICIONES +</button>
    
    @if ($isOpen)
        <div id="modal-formulario-crear-rendicion" class=" relative z-10" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <form action="{{ route('rendicion.submit') }}" method="POST" wire:submit.prevent="submit"  class="w-full h-full flex flex-col space-y-2 pt-4">
                                    @csrf
                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="dias">Numero de rendición</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="number" name="numero_de_rendicion" placeholder="1" wire:model="numero_de_rendicion">
                                            @error('numero_de_rendicion') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="dias">Días</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="number" name="dias" placeholder="2" wire:model="dias">
                                            @error('dias') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="monto-rendido">Monto rendido</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="number" name="monto-rendido" placeholder="1000000"
                                            wire:model="monto_rendido">
                                            @error('monto_rendido') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="monto-aprobado">Monto aprobado</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="number" name="monto_aprobado" placeholder="1000000"
                                            wire:model="monto_aprobado">
                                            @error('monto_aprobado') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="monto-observado">Monto observado</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="number" name="monto-observado" placeholder="1000000"
                                            wire:model="monto_observado">
                                            @error('monto_observado') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="fecha_de_ingreso">Fecha de ingreso</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="date" name="fecha_de_ingreso" 
                                            wire:model="fecha_de_ingreso">
                                            @error('fecha_de_ingreso') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="fecha_de_cierre">Fecha de cierre</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="date" name="fecha_de_ingreso" 
                                            wire:model="fecha_de_cierre">
                                            @error('fecha_de_cierre') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="analista">Analista</label>
                                        <input
                                            class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border border-gray-200"
                                            type="text" name="fecha_de_ingreso" 
                                            wire:model="analista">
                                            @error('analista') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="proyecto_id">Proyecto ID</label>
                                        <input type="number" placeholder="1" disabled class="w-1/2 rounded-lg outline-none focus:ring-2 focus:ring-sky-200 p-2 border text-gray-500 border-gray-200" name="proyecto_id" wire:model='proyecto_id' value="1">
                                    </div>

                                    <div class="w-full flex flex-row items-center justify-between">
                                        <label class="font-bold" for="correo">Adjuntar</label>
                                        <input class="w-1/2 rounded-lg p-2" type="file" name="correo"
                                            id="">
                                    </div>


                                    <div class="w-full flex flex-row items-center justify-end py-3 space-x-4">
                                        <button
                                            class="p-2 bg-[#0ea5e9] cursor-pointer rounded-md text-white shadow-md text-sm hover:bg-sky-300 active:scale-95"
                                            type="submit">crear rendición</button>
                                        <button id="btn-cerrar-modal-crear-rendicion" type="button"
                                            class="rounded-md p-2 text-sm font-semibold text-white shadow-md bg-red-500 hover:bg-red-400"
                                            wire:click="closeModal">cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>
