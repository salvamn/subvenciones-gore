<div>
	{{-- Close your eyes. Count to one. That is how long forever feels. --}}
	{{-- overflow-x-scroll --}}


	
	<div class="block w-full ">
		<table class="items-center bg-transparent w-full border-collapse border rounded-t-lg">
			<thead class="rounded-t-lg">
				<tr class="">
					<th class="w-auto px-6 align-middle  bg-[#f7f7f7] py-3 text-sm uppercase border text-nowrap text-left font-semibold">
						n° rendición
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border text-nowrap text-left font-semibold">
						fecha de ingreso
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border text-nowrap text-left font-semibold">
						fecha de cierre
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border  text-left font-semibold">
						días
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border  text-left font-semibold">
						monto rendido
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border  text-left font-semibold">
						monto aprobado
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border  text-left font-semibold">
						monto observado
					</th>
					<th class="px-6 align-middle bg-[#f7f7f7] py-3 text-sm uppercase border  text-left font-semibold">
						acciones
					</th>
				</tr>
			</thead>

			<tbody>
				@foreach($rendiciones as $rendicion)
				<tr class=" h-auto odd:bg-white even:bg-slate-100 divide-x ">
					<th class="group relative border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs  p-4 text-left ">
						# {{ $rendicion->numero_de_rendicion }}
						{{-- group relative --}}
						{{-- tooltip --}}
						<div class="absolute bottom-[calc(100% + 0.5rem)] top-[30%] left-[-30%] -translate-x-[75%] hidden group-hover:block w-auto ">
							<div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap animate-bounce">
								{{ $rendicion->analista }}
								<svg class="absolute left-[55%] top-[35%] h-2 w-full -rotate-90  text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0" /></svg>
							</div>
						</div>
						{{-- tooltip --}}
					</th>
					<td class=" border-t-0 px-6 align-middle whitespace-nowrap border-l-0 border-r-0 text-xs p-4 ">
						{{ $rendicion->fecha_de_ingreso }}
					</td>
					<td class="border-t-0 px-6 align-center whitespace-nowrap border-l-0 border-r-0 text-xs p-4">
						{{ $rendicion->fecha_de_cierre }}
					</td>
					<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs text-center p-4">
						{{ $rendicion->dias }}
					</td>
					<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
						<i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
						$ {{ formatear_numero($rendicion->monto_rendido) }}
					</td>
					<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
						<i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
						$ {{ formatear_numero($rendicion->monto_aprobado) }}
					</td>
					<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
						<i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
						$ {{ formatear_numero($rendicion->monto_observado) }}
					</td>
					<td
						class="border-t-0 px-2 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex flex-row space-x-2">

						<div
							class="group relative rounded border shadow-sm cursor-pointer w-1/3 flex items-center justify-center border-amber-200 bg-amber-100 active:scale-90 select-none hover:bg-amber-200">
							<button id="corregir-monto-rendicion" class=" w-full h-[30px] flex items-center justify-center" wire:click=''
							wire:model='{{ $rendicion->id }}'>
								<img src="https://img.icons8.com/?id=11678&format=png&color=000000" class="w-[80%]">
							</button>
							{{-- tooltip --}}
							<div
								class="absolute bottom-[calc(100% + 0.5rem)] top-[10%] left-[-30%] -translate-x-[100%] hidden group-hover:block w-auto">
								<div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
									corregir monto
									<svg class="absolute left-[55%] top-[35%] h-2 w-full -rotate-90 text-black" x="0px" y="0px"
										viewBox="0 0 255 255" xml:space="preserve">
										<polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
									</svg>
								</div>
							</div>
							{{-- tooltip --}}

						</div>
						<div
							class="group relative rounded border shadow-sm cursor-pointer w-1/3 flex items-center justify-center bg-sky-100 border-sky-200 active:scale-90 select-none hover:bg-sky-200">
							<button class=" w-full h-[30px] flex items-center justify-center">
								<img src="https://img.icons8.com/office/40/information.png" class="w-[80%] ">
							</button>
							{{-- tooltip --}}
							<div
							class="absolute bottom-[calc(100% + 0.5rem)] top-[10%] left-[-30%] -translate-x-[100%] hidden group-hover:block w-auto">
							<div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
								información
								<svg class="absolute left-[55%] top-[35%] h-2 w-full -rotate-90 text-black" x="0px" y="0px"
									viewBox="0 0 255 255" xml:space="preserve">
									<polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
								</svg>
							</div>
						</div>
						{{-- tooltip --}}
						</div>
						<div
							class="group relative rounded border shadow-sm cursor-pointer w-1/3 flex items-center justify-center bg-blue-200 border-blue-300 active:scale-90 select-none hover:bg-blue-300">
							<button class=" w-full h-[30px] flex items-center justify-center">
								<img src="https://img.icons8.com/?id=13758&format=png&color=000000" class="w-[80%] ">
							</button>
							{{-- tooltip --}}
							<div
								class="absolute bottom-[calc(100% + 0.5rem)] top-[10%] left-[-30%] -translate-x-[100%] hidden group-hover:block w-auto">
								<div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white whitespace-nowrap">
									respaldo financiero
									<svg class="absolute left-[55%] top-[35%] h-2 w-full -rotate-90 text-black" x="0px" y="0px"
										viewBox="0 0 255 255" xml:space="preserve">
										<polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
									</svg>
								</div>
							</div>
							{{-- tooltip --}}
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>

