<div class="w-full h-[90%] flex flex-col rounded-xl border">
	{{-- Be like water. --}}


	{{-- card header --}}
	<div
		class="w-full pt-2 pb-2 pr-4 pl-4 h-auto flex flex-row items-center justify-between border-b-[1px] rounded-t-xl bg-[#f7f7f7] font-semibold text-[#212529] space-x-2 shadow-md">
		<div>
			<span>Código de Proyecto: </span>
			<span> 2024DE0001 - </span>
			<span>PARTICIPACIÓN CAMPEONATOS DEPORTIVOS</span>
		</div>

		<div class="w-auto h-auto flex flex-row items-center justify-center space-x-2">
			<button class="bg-red-100 rounded shadow p-[2px] border border-red-200 active:scale-90 select-none hover:bg-red-200" 
			wire:click="generarPdf()">
				<img src="https://img.icons8.com/?size=100&id=13417&format=png&color=000000" width="25px">
			</button>
			
			<button class="bg-green-100 rounded shadow p-[2px] border border-green-200 active:scale-90 select-none hover:bg-green-200" wire:click="export">
				<img src="https://img.icons8.com/?size=100&id=13654&format=png&color=000000" width="25px">
			</button>
		</div>
	</div>
	{{-- card header --}}


	{{-- card información --}}
	<div class="w-full h-auto border-b-[1px] pt-6 pb-6 pl-4 pr-4 space-y-6">

		<div class="w-full h-auto flex flex-row">
			<div class="flex flex-col w-1/2">
				<span class="font-semibold">INSTITUCIÓN</span>
				<span class="text-sm">{{ $proyecto->institucion }}</span>
			</div>
			<div class="flex flex-col w-1/2">
				<span class="font-semibold">PROYECTO</span>
				<span class="text-sm">{{ $proyecto->proyecto }}</span>
			</div>
		</div>

		<div class="w-full h-auto flex flex-row">
			<div class="flex flex-col w-1/5">
				<span class="font-semibold">RUT</span>
				<span class="text-sm">{{ $proyecto->rut }}</span>
			</div>
			<div class="flex flex-col w-1/5">
				<span class="font-semibold">MONTO</span>
				<span class="text-sm">$ {{ formatear_numero($proyecto->monto) }}</span>
			</div>
			<div class="flex flex-col w-1/5">
				<span class="font-semibold">MONTO POR RENDIR</span>
				@if($proyecto->monto_por_rendir == 0)
					<span class="text-sm text-green-500">$ {{ formatear_numero($montoFaltante) }}</span>
				@else
					<span class="text-sm text-red-500">$ {{ formatear_numero($montoFaltante) }}</span>
				@endif
			</div>
			<div class="flex flex-col w-1/5">
				<span class="font-semibold">ESTADO</span>
				<span class="w-fit border  border-amber-200 bg-amber-50 shadow rounded px-4">{{ $proyecto->estado }}</span>
			</div>
			<div class="flex flex-col w-1/5">
				<span class="font-semibold">DURACIÓN</span>
				<span class="text-sm flex flex-row items-center space-x-2">
					{{ $proyecto->duracion }} 
					Meses
					<img src="https://img.icons8.com/?size=100&id=12776&format=png&color=000000" width="25px" class="ml-2">
				</span>
			</div>
		</div>

		<div class="w-full h-auto flex flex-row ">
			<div class="flex flex-row items-center space-x-4 text-lg p-2 rounded">
				<span class="">FECHA DE PAGO: {{ $proyecto->fecha_pago }}</span>
				<div id="modal" class="flex items-center">
					<livewire:modal-calendario-subvenciones />
				</div>
			</div>
		</div>

	</div>
	{{-- card información --}}

	{{-- card rendiciones --}}
	<div class="w-full h-auto border-b-[1px] pt-6 pb-6 pl-4 pr-4 space-y-6">
		<section class="py-1">
			<div class="w-full">
				<div class="relative flex flex-col min-w-0 break-words bg-white w-full rounded">
					{{-- Modal crear rendición --}}
					<div class="rounded-t mb-0 px-2 py-3 border-0">
						<div class="flex flex-wrap items-center">
							<div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
								<div id="modal">
									<livewire:modal-formulario-rendicion />
								</div>
							</div>
						</div>
					</div>
					{{-- Modal crear rendición --}}

					{{-- Tabla de rendiciones --}}
					<livewire:tabla-subvenciones />
					{{-- Tabla de rendiciones --}}
				</div>
			</div>
		</section>
	</div>

	<div class="w-full p-2 h-auto text-center flex flex-col">
		<span class="text-xs text-gray-600 font-light tracking-wide underline decoration-sky-200">unidad de
			subvenciones</span>
	</div>

	{{-- card rendiciones --}}

</div>