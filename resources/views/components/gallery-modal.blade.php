<div x-show="openModal" x-transition.opacity @keydown.escape.prevent.stop tabindex="0"
    class="fixed inset-0 z-50 bg-black/70 backdrop-blur flex items-start justify-center">

    <div class="absolute inset-0"></div>

    <div class="relative max-w-6xl mx-auto mt-16 bg-white dark:bg-stone-900
                rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="flex justify-between items-center p-5 border-b">
            <h3 class="text-xl font-bold" x-text="gallery.title"></h3>
            <button @click="close()" class="text-xl">✕</button>
        </div>
        {{-- SCROLL AREA --}}
        <div
            class="p-4 overflow-y-auto
                   max-h-[calc(90vh-64px)]
                   overscroll-contain">

            {{-- ITEMS GRID --}}
            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                <template x-for="item in items" :key="item.id">
                    <div @click="
            item.type === 'video'
                ? openVideo(item.videoUrl)
                : openImage(item.thumbnail)
        "
                        class="group relative rounded-lg overflow-hidden cursor-pointer">

                        <img :src="item.thumbnail"
                            class="w-full h-48 object-cover
                   group-hover:scale-110 transition">

                        {{-- Caption --}}
                        <div
                            class="absolute bottom-0 inset-x-0
                    bg-gradient-to-t from-black/70
                    p-3 text-white">
                            <p class="text-sm font-semibold" x-text="item.caption"></p>
                        </div>

                        {{-- Play Icon --}}
                        <template x-if="item.type === 'video'">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 rounded-full bg-kajang-orange
                           text-white flex items-center justify-center">
                                    ▶
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

<div x-show="videoOpen" x-transition.opacity class="fixed inset-0 z-[999] bg-black/80 backdrop-blur">

    <div class="relative max-w-4xl mx-auto mt-24
               aspect-video bg-black rounded-xl">

        <button @click="closeVideo()"
            class="absolute -top-4 -right-4
                   w-10 h-10 rounded-full bg-black/80
                   text-white hover:bg-kajang-orange">
            ✕
        </button>

        <iframe :src="videoEmbedUrl" class="w-full h-full rounded-xl" allow="autoplay; encrypted-media"
            allowfullscreen>
        </iframe>
    </div>
</div>

<div x-show="imageOpen" x-transition.opacity class="fixed inset-0 z-[998] bg-black/90 backdrop-blur">

    <div class="relative max-w-6xl mx-auto mt-16
               flex items-center justify-center">

        <button @click="closeImage()"
            class="absolute top-4 right-4
                   w-10 h-10 rounded-full bg-black/70
                   text-white text-xl hover:bg-kajang-orange">
            ✕
        </button>

        <img :src="imagePreview" class="max-h-[80vh] w-auto
                   rounded-lg shadow-2xl object-contain">
    </div>
</div>
