<section id="gallery"
    x-data="galleryModal()"
    class="py-20 bg-stone-100 dark:bg-stone-950">

    <div class="container mx-auto px-4">

        {{-- HEADING --}}
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-12
                   text-stone-900 dark:text-white">
            Galeri <span class="text-kajang-orange">Kegiatan</span>
        </h2>

        {{-- COVER GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($galleries as $gallery)
                <div
                    @click="open({{ $gallery['id'] }})"
                    class="group cursor-pointer rounded-xl overflow-hidden
                           relative shadow-lg bg-black">

                    <img src="{{ $gallery['cover'] }}"
                        class="w-full h-64 object-cover
                               group-hover:scale-110 transition duration-700">

                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-black/40
                                flex flex-col justify-end p-5">
                        <h3 class="text-white text-xl font-bold">
                            {{ $gallery['title'] }}
                        </h3>
                        <p class="text-sm text-white/80">
                            {{ $gallery['itemsCount'] }} item
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- MODAL DETAIL --}}
    @include('components.gallery-modal')

</section>
