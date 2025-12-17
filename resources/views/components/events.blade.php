<section id="events" class="py-24 bg-stone-100 dark:bg-stone-950 relative overflow-hidden">

    <div class="container mx-auto px-4">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-14" data-aos="fade-up">

            <div>
                <span class="text-kajang-orange font-bold uppercase tracking-wider text-sm">
                    Agenda Kami
                </span>

                <h2 class="text-3xl md:text-5xl font-bold text-stone-900 dark:text-white mt-2">
                    Kegiatan
                    <span class="text-kajang-orange">Terbaru</span>
                </h2>
            </div>

            {{-- DESKTOP BUTTON --}}
            <a href="#"
                class="hidden md:inline-block text-stone-600 dark:text-stone-300
                      hover:text-kajang-orange font-medium transition-colors">
                Lihat Semua Kegiatan →
            </a>
        </div>

        {{-- EVENTS GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            @foreach ($events as $index => $event)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 120 }}" data-aos-duration="800"
                    class="bg-white dark:bg-stone-900 rounded-2xl overflow-hidden
                           shadow-lg hover:shadow-2xl transition-all duration-300
                           flex flex-col group">

                    {{-- IMAGE --}}
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $event['thumbnail'] }}" alt="{{ $event['title'] }}"
                            class="w-full h-full object-cover
                                    group-hover:scale-110 transition-transform duration-500" />

                        <div
                            class="absolute top-4 left-4 bg-kajang-orange
                                   text-white text-xs font-bold px-3 py-1
                                   rounded-full shadow-md">
                            {{ $event['category']['name'] }}
                        </div>
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-6 flex-1 flex flex-col">

                        {{-- DATE & TIME --}}
                        <div class="flex items-center text-sm text-stone-500 dark:text-stone-400 mb-3 space-x-4">
                            <div class="flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1 text-kajang-orange" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                </svg>
                                {{ $event['event_date'] }}
                            </div>

                            <div class="flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1 text-kajang-orange" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 6v6l4 2"></path>
                                </svg>
                                {{ $event['event_time'] }}
                            </div>
                        </div>

                        {{-- TITLE --}}
                        <h3
                            class="text-xl font-bold text-stone-900 dark:text-white mb-3
                                   line-clamp-2 group-hover:text-kajang-orange transition-colors">
                            {{ $event['title'] }}
                        </h3>

                        {{-- DESCRIPTION --}}
                        <p class="text-stone-600 dark:text-stone-400 text-sm mb-6 line-clamp-3">
                            {{-- {!! $event['description'] !!} --}}
                            {!! strip_tags($event['description'], '<br><strong><em><a>') !!}
                        </p>

                        {{-- FOOTER --}}
                        <div
                            class="mt-auto pt-4 border-t border-stone-100 dark:border-stone-800
                                   flex items-center justify-between">
                            <div class="flex items-center text-xs text-stone-500 dark:text-stone-400">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M21 10c0 6-9 12-9 12S3 16 3 10a9 9 0 1118 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                {{ $event['location'] }}
                            </div>

                            <button class="text-sm font-semibold text-kajang-orange hover:text-kajang-darkOrange">
                                Selengkapnya →
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- MOBILE BUTTON --}}
        <div class="mt-12 text-center md:hidden" data-aos="fade-up">
            <a href="#" class="text-kajang-orange font-medium">
                Lihat Semua Jadwal →
            </a>
        </div>
    </div>
</section>
