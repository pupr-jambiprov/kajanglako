<section id="gallery" x-data="{ filter: 'all' }" class="py-20 bg-stone-100 dark:bg-stone-950">
    <div class="container mx-auto px-4">

        {{-- Heading & Filter --}}
        <div class="flex flex-col items-center mb-12">
            <h2 class="text-3xl md:text-5xl font-bold text-stone-900 dark:text-white mb-8 text-center">
                Galeri <span class="text-kajang-orange">Karya & Momen</span>
            </h2>

            <div class="flex p-1 bg-white dark:bg-stone-800 rounded-full shadow-sm">
                @foreach (['all' => 'Semua', 'photo' => 'Foto', 'video' => 'Video'] as $key => $label)
                    <button @click="filter = '{{ $key }}'"
                        :class="filter === '{{ $key }}'
                            ?
                            'bg-kajang-orange text-white shadow-md' :
                            'text-stone-600 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-700'"
                        class="px-6 py-2 rounded-full text-sm font-medium transition-all">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 auto-rows-[200px]">
            @foreach ($galleryItems as $index => $item)
                <div x-show="filter === 'all' || filter === '{{ $item['type'] }}'" x-transition
                    class="relative group overflow-hidden rounded-xl cursor-pointer
                        {{ in_array($index, [2, 5]) ? 'md:row-span-2 md:h-full' : '' }}">
                    <img src="{{ $item['thumbnailUrl'] }}" alt="{{ $item['title'] }}"
                        class="w-full h-full object-cover transition-transform
                               duration-700 group-hover:scale-110" />

                    {{-- Overlay --}}
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0
                               group-hover:opacity-100 transition-opacity
                               duration-300 flex flex-col items-center
                               justify-center p-4 text-center">
                        @if ($item['type'] === 'video')
                            {{-- Play Icon --}}
                            <div
                                class="w-12 h-12 rounded-full bg-kajang-orange
                                       flex items-center justify-center text-white
                                       mb-2 shadow-lg transform translate-y-4
                                       group-hover:translate-y-0 transition-transform">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <polygon points="5,3 19,12 5,21"></polygon>
                                </svg>
                            </div>
                        @else
                            {{-- Image Icon --}}
                            <div
                                class="w-12 h-12 rounded-full bg-white/20
                                       backdrop-blur-sm flex items-center
                                       justify-center text-white mb-2
                                       shadow-lg transform translate-y-4
                                       group-hover:translate-y-0 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <path d="M21 15l-5-5L5 21"></path>
                                </svg>
                            </div>
                        @endif

                        <h4
                            class="text-white font-bold text-lg
                                   translate-y-4 group-hover:translate-y-0
                                   transition-transform delay-75">
                            {{ $item['title'] }}
                        </h4>
                    </div>

                    {{-- Type Badge --}}
                    <div
                        class="absolute top-3 right-3 bg-black/50
                               backdrop-blur-md px-2 py-1 rounded-md
                               text-xs text-white uppercase font-bold
                               tracking-wider">
                        {{ $item['type'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
