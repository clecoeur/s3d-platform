<x-app-layout>
    <div
        x-data="{openPopoverProjects: false, openPopoverDownloads: false, overlayIsOpen: false, currentMatterport: '{{ $currentProject->firstRoom()->link }}'}">
        <nav class="fixed top-0 px-49 z-[50] flex justify-center w-full py-32 bg-gradient-to-b from-foreground/60 to-transparent">
            <img src="{{ asset('images/logo.svg') }}" class="h-[40px]" alt="">
        </nav>
        <div class="w-full h-screen min-h-screen">
            <div x-show="overlayIsOpen" x-cloak class="bg-overlay/80 backdrop-blur-sm absolute top-0 left-0 w-full h-full"></div>
                <iframe :src="currentMatterport" allow="xr-spatial-tracking"
                        class="w-full h-[calc(100%_-_69px)] object-cover aspect-video"></iframe>
        </div>
        <div class="fixed bottom-0 left-0 w-full px-32 bg-foreground flex items-start justify-between">
            <div class="flex flex-col py-20">
                <h1 class="text-gray-200 font-bold font-title text-lg">{{ $currentProject->post_title }}</h1>
                @php($address = unserialize($currentProject->meta->projectLocation))
                <p class="text-gray-600 flex gap-4 items-center">
                    <svg width="16" height="16" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_219_2175)">
                            <path
                                d="M5 10C5 10 8.75 6.44625 8.75 3.75C8.75 2.75544 8.35491 1.80161 7.65165 1.09835C6.94839 0.395088 5.99456 0 5 0C4.00544 0 3.05161 0.395088 2.34835 1.09835C1.64509 1.80161 1.25 2.75544 1.25 3.75C1.25 6.44625 5 10 5 10ZM5 5.625C4.50272 5.625 4.02581 5.42746 3.67417 5.07583C3.32254 4.72419 3.125 4.24728 3.125 3.75C3.125 3.25272 3.32254 2.77581 3.67417 2.42417C4.02581 2.07254 4.50272 1.875 5 1.875C5.49728 1.875 5.97419 2.07254 6.32583 2.42417C6.67746 2.77581 6.875 3.25272 6.875 3.75C6.875 4.24728 6.67746 4.72419 6.32583 5.07583C5.97419 5.42746 5.49728 5.625 5 5.625Z"
                                fill="#6F84AD"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_219_2175">
                                <rect width="10" height="10" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    @if($address)
                        {{ $address['city'] }}
                    @else
                        Non spécifié
                    @endif
                </p>
            </div>
            @if($currentProject->rooms())
                <ul class="flex gap-32 items-center">
                    @foreach($currentProject->rooms() as $room)
                        <li :class="[
                            'cursor-pointer pt-20 border-t-4 group',
                            currentMatterport === '{{ $room->link }}' ? 'border-secondary text-secondary' : 'border-transparent text-gray-600'
                          ]">
                            <span class="font-title font-semiBold group-hover:text-gray-200 cursor-pointer" @click="currentMatterport = '{{ $room->link }}'">{{ $room->name }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="flex gap-24 items-center py-20">
                <!-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex gap-8 text-gray-600 text-[14px] font-bold font-title transition-all ease-in duration-300 group hover:text-gray-200">
                        Se déconnecter
                    </button>
                </form>-->

                <a href="https://www.s3dengineeringsolutions.com/"
                   class="flex gap-8 text-gray-600 text-[14px] font-bold font-title transition-all ease-in duration-300 group hover:text-gray-200">
                    Retour au site
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="transition-all ease-in duration-300 group-hover:text-gray-200">
                        <g clip-path="url(#clip0_219_2187)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.636 3.5C8.636 3.36739 8.58332 3.24021 8.48955 3.14645C8.39579 3.05268 8.26861 3 8.136 3H1.5C1.10218 3 0.720644 3.15804 0.43934 3.43934C0.158035 3.72064 0 4.10218 0 4.5L0 14.5C0 14.8978 0.158035 15.2794 0.43934 15.5607C0.720644 15.842 1.10218 16 1.5 16H11.5C11.8978 16 12.2794 15.842 12.5607 15.5607C12.842 15.2794 13 14.8978 13 14.5V7.864C13 7.73139 12.9473 7.60421 12.8536 7.51045C12.7598 7.41668 12.6326 7.364 12.5 7.364C12.3674 7.364 12.2402 7.41668 12.1464 7.51045C12.0527 7.60421 12 7.73139 12 7.864V14.5C12 14.6326 11.9473 14.7598 11.8536 14.8536C11.7598 14.9473 11.6326 15 11.5 15H1.5C1.36739 15 1.24021 14.9473 1.14645 14.8536C1.05268 14.7598 1 14.6326 1 14.5V4.5C1 4.36739 1.05268 4.24021 1.14645 4.14645C1.24021 4.05268 1.36739 4 1.5 4H8.136C8.26861 4 8.39579 3.94732 8.48955 3.85355C8.58332 3.75979 8.636 3.63261 8.636 3.5Z"
                                  fill="currentColor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M16.0001 0.5C16.0001 0.367392 15.9475 0.240215 15.8537 0.146447C15.7599 0.0526784 15.6328 0 15.5001 0L10.5001 0C10.3675 0 10.2404 0.0526784 10.1466 0.146447C10.0528 0.240215 10.0001 0.367392 10.0001 0.5C10.0001 0.632608 10.0528 0.759785 10.1466 0.853553C10.2404 0.947322 10.3675 1 10.5001 1H14.2931L6.14614 9.146C6.09966 9.19249 6.06278 9.24768 6.03762 9.30842C6.01246 9.36916 5.99951 9.43426 5.99951 9.5C5.99951 9.56574 6.01246 9.63084 6.03762 9.69158C6.06278 9.75232 6.09966 9.80751 6.14614 9.854C6.19263 9.90049 6.24782 9.93736 6.30856 9.96252C6.3693 9.98768 6.4344 10.0006 6.50014 10.0006C6.56589 10.0006 6.63099 9.98768 6.69173 9.96252C6.75247 9.93736 6.80766 9.90049 6.85414 9.854L15.0001 1.707V5.5C15.0001 5.63261 15.0528 5.75979 15.1466 5.85355C15.2404 5.94732 15.3675 6 15.5001 6C15.6328 6 15.7599 5.94732 15.8537 5.85355C15.9475 5.75979 16.0001 5.63261 16.0001 5.5V0.5Z"
                                  fill="currentColor"/>
                        </g>
                    </svg>
                </a>
                <div class="flex gap-12 border-l border-[#30374F] pl-24">
                    @if($currentProject->files())
                        <div x-data="{ tooltip: 'Télécharger' }">
                            <button @click="openPopoverDownloads = !openPopoverDownloads; overlayIsOpen = false; overlayIsOpen = true" x-tooltip.top="tooltip"
                                    class="p-8 text-gray-600 hover:text-gray-200 transition-all ease-in duration-300">
                                <svg width="24" height="24" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.625 12.375C0.79076 12.375 0.949732 12.4408 1.06694 12.5581C1.18415 12.6753 1.25 12.8342 1.25 13V16.125C1.25 16.4565 1.3817 16.7745 1.61612 17.0089C1.85054 17.2433 2.16848 17.375 2.5 17.375H17.5C17.8315 17.375 18.1495 17.2433 18.3839 17.0089C18.6183 16.7745 18.75 16.4565 18.75 16.125V13C18.75 12.8342 18.8158 12.6753 18.9331 12.5581C19.0503 12.4408 19.2092 12.375 19.375 12.375C19.5408 12.375 19.6997 12.4408 19.8169 12.5581C19.9342 12.6753 20 12.8342 20 13V16.125C20 16.788 19.7366 17.4239 19.2678 17.8928C18.7989 18.3616 18.163 18.625 17.5 18.625H2.5C1.83696 18.625 1.20107 18.3616 0.732233 17.8928C0.263392 17.4239 0 16.788 0 16.125V13C0 12.8342 0.065848 12.6753 0.183058 12.5581C0.300269 12.4408 0.45924 12.375 0.625 12.375Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M9.55731 14.8175C9.61537 14.8757 9.68434 14.9219 9.76027 14.9534C9.8362 14.9849 9.9176 15.0011 9.99981 15.0011C10.082 15.0011 10.1634 14.9849 10.2394 14.9534C10.3153 14.9219 10.3843 14.8757 10.4423 14.8175L14.1923 11.0675C14.3097 10.9501 14.3756 10.791 14.3756 10.625C14.3756 10.459 14.3097 10.2999 14.1923 10.1825C14.075 10.0651 13.9158 9.99921 13.7498 9.99921C13.5838 9.99921 13.4247 10.0651 13.3073 10.1825L10.6248 12.8663V1.875C10.6248 1.70924 10.559 1.55027 10.4418 1.43306C10.3245 1.31585 10.1656 1.25 9.99981 1.25C9.83405 1.25 9.67508 1.31585 9.55787 1.43306C9.44066 1.55027 9.37481 1.70924 9.37481 1.875V12.8663L6.69231 10.1825C6.57496 10.0651 6.41578 9.99921 6.24981 9.99921C6.08384 9.99921 5.92467 10.0651 5.80731 10.1825C5.68995 10.2999 5.62402 10.459 5.62402 10.625C5.62402 10.791 5.68995 10.9501 5.80731 11.0675L9.55731 14.8175Z"
                                        fill="currentColor"/>
                                </svg>
                            </button>
                        </div>
                    @endif
                    @if($projects)
                        <div x-data="{ tooltip: 'Projets' }">
                            <button @click="openPopoverProjects = !openPopoverProjects; overlayIsOpen = true" x-tooltip.top="tooltip"
                                    class="p-8 text-gray-600 hover:text-gray-200 transition-all ease-in duration-300">
                                <svg width="24" height="24" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.25 3.125C1.25 2.62772 1.44754 2.15081 1.79917 1.79917C2.15081 1.44754 2.62772 1.25 3.125 1.25H6.875C7.37228 1.25 7.84919 1.44754 8.20083 1.79917C8.55246 2.15081 8.75 2.62772 8.75 3.125V6.875C8.75 7.37228 8.55246 7.84919 8.20083 8.20083C7.84919 8.55246 7.37228 8.75 6.875 8.75H3.125C2.62772 8.75 2.15081 8.55246 1.79917 8.20083C1.44754 7.84919 1.25 7.37228 1.25 6.875V3.125ZM11.25 3.125C11.25 2.62772 11.4475 2.15081 11.7992 1.79917C12.1508 1.44754 12.6277 1.25 13.125 1.25H16.875C17.3723 1.25 17.8492 1.44754 18.2008 1.79917C18.5525 2.15081 18.75 2.62772 18.75 3.125V6.875C18.75 7.37228 18.5525 7.84919 18.2008 8.20083C17.8492 8.55246 17.3723 8.75 16.875 8.75H13.125C12.6277 8.75 12.1508 8.55246 11.7992 8.20083C11.4475 7.84919 11.25 7.37228 11.25 6.875V3.125ZM1.25 13.125C1.25 12.6277 1.44754 12.1508 1.79917 11.7992C2.15081 11.4475 2.62772 11.25 3.125 11.25H6.875C7.37228 11.25 7.84919 11.4475 8.20083 11.7992C8.55246 12.1508 8.75 12.6277 8.75 13.125V16.875C8.75 17.3723 8.55246 17.8492 8.20083 18.2008C7.84919 18.5525 7.37228 18.75 6.875 18.75H3.125C2.62772 18.75 2.15081 18.5525 1.79917 18.2008C1.44754 17.8492 1.25 17.3723 1.25 16.875V13.125ZM11.25 13.125C11.25 12.6277 11.4475 12.1508 11.7992 11.7992C12.1508 11.4475 12.6277 11.25 13.125 11.25H16.875C17.3723 11.25 17.8492 11.4475 18.2008 11.7992C18.5525 12.1508 18.75 12.6277 18.75 13.125V16.875C18.75 17.3723 18.5525 17.8492 18.2008 18.2008C17.8492 18.5525 17.3723 18.75 16.875 18.75H13.125C12.6277 18.75 12.1508 18.5525 11.7992 18.2008C11.4475 17.8492 11.25 17.3723 11.25 16.875V13.125Z"
                                        fill="currentColor"/>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if($projects)
            <div x-show="openPopoverProjects" x-cloak @click.away="openPopoverProjects = false;overlayIsOpen =  false"
                 class="bg-foreground rounded-2xl px-32 py-40 lg:w-[690px] fixed bottom-[116px] right-24 flex flex-col gap-48">
                <div class="flex items-center justify-between">
                    <h2 class="font-title font-bold text-gray-200 text-[28px] leading-[32px]">Liste des projets</h2>
                    <a href="https://www.s3dengineeringsolutions.com/contact" class="bg-secondary font-title font-bold py-12 px-16 rounded-lg transition-all duration-300 ease-in border-2 border-secondary hover:bg-foreground hover:text-secondary">Nouveau projet</a>
                </div>
                <div class="grid grid-cols-2 gap-x-32 gap-y-48">
                    @foreach($projects as $project)
                        <div class="flex flex-col gap-16 w-full group">
                            <a href="{{ route('detail', $project->ID) }}" class="overflow-hidden">
                                @if(!empty($project->meta->_thumbnail_id))
                                    <img src="{{ \Corcel\Model\Attachment::find($project->meta->_thumbnail_id)->guid }}"
                                         class="rounded-lg w-full h-full object-cover aspect-video group-hover:scale-110 transition-all duration-150 ease-in-out"
                                         alt="">
                                @else
                                    <img src="{{ asset('images/no-media.jpg') }}"
                                         class="rounded-lg w-full h-full object-cover aspect-video group-hover:scale-110 transition-all duration-150 ease-in-out"
                                         alt="">
                                @endif
                            </a>
                            <div class="flex flex-col gap-4 w-full">
                                <a href="{{ route('detail', $project->ID) }}">
                                    <h3 class="font-title font-bold text-lg text-gray-400 group-hover:text-secondary transition-all duration-150 ease-in">{{ \Illuminate\Support\Str::limit($project->post_title, 40) }}</h3>
                                </a>
                                @php($address = unserialize($currentProject->meta->projectLocation))
                                @if($address)
                                    <p class="text-gray-600 text-base">{{ $address['name'] }}, {{ $address['city']}}</p>
                                @endif
                            </div>
                            <a href="{{ route('detail', $project->ID) }}"
                               class="font-title font-bold text-[14px] leading-[19px] text-secondary flex items-center gap-4 hover:gap-8 transition-all duration-150 ease-in">
                                Lancer le projet
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if($currentProject->files())
            <div x-show="openPopoverDownloads" x-cloak @click.away="openPopoverDownloads = false;overlayIsOpen = false"
                 class="bg-foreground rounded-2xl px-32 py-40 lg:w-[490px] fixed bottom-[116px] right-24 flex flex-col gap-40 max-h-[calc(100vh_-_150px)] overflow-y-auto">
                <h2 class="font-title font-bold text-gray-200 text-[28px] leading-[32px]">Fichiers de
                    téléchargement</h2>
                <div class="flex flex-col gap-40">
                    @if($currentProject->files())
                        @foreach($currentProject->files() as $file)
                            @php($file = json_decode(json_encode($file)))
                            @include('components.blocks.' . $file->type, ['file' => $file->data, 'content' => $file->content ?? null ])
                        @endforeach
                    @endif

                    <div class="flex flex-col gap-8">
                        <span class="font-bold text-gray-300">Conditions générales :</span>
                        <div class="text-gray-600 text-sm">En raison d’une taille importante des fichiers, S3D
                            ENGINEERING se réserve le droit de d’archiver ou supprimer les données au bout d’1 ans. Si
                            vous souhaitez prolonger l'accès au-delà de 6 mois, contactez-nous.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
