<div class="w-full h-auto pt-2 border-b flex flex-row items-center text-[#437efd] xl:text-base md:text-xs sm:text-xs">
    {{-- The whole world belongs to you. --}}

    @foreach ($pestanias as $pestania)
        <script>
            console.log(@json($pestania))
        </script>
        @if ($pestania == 'pertinencia')
            <div class="delay-100 h-full flex justify-centerborder-sky-200 bg-sky-50 items-center pl-4 pr-4 pb-2 pt-2 rounded-t-lg border-[1px] shadow-sm  text-gray-600 border-sky-200 uppercase cursor-pointer">
                <span>PERTINENCIA</span>
            </div>
        @else
            <div class="delay-100 uppercase h-full flex justify-center items-center pl-4 pr-4 pb-2 pt-2 rounded-t-lg border-[1px] border-transparent hover:border-[1px] hover:border-gray-200 cursor-pointer">
                <span>{{ $pestania }}</span>
            </div>
        @endif  
    @endforeach


</div>
