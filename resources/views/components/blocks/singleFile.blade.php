@if($file->link)
    <div class="pb-16 border-b border-[#30374F]">
        <div class="flex gap-12">
            <div class="rounded-md bg-sandyBrown-200 text-sandyBrown-500 p-8 h-[32px]">
                @include('components.icons.' . $file->type ?? 'pdf')
            </div>
            <div class="flex flex-col gap-8 w-full">
                <div class="flex justify-between items-center gap-16">
                    <h4 class="font-bold font-title text-gray-400 text-md">{{ $file->name ?? 'Aucun nom' }}</h4>
                    <a href="{{ $file->link }}" target="_blank"
                       class="flex gap-4 items-center text-secondary font-title font-bold text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                        </svg>
                        <span class="is-underline">Télécharger</span>
                    </a>
                </div>
                @if($file->content)
                    <div class="text-gray-600 text-sm entry-content">
                        {!! $file->content !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
