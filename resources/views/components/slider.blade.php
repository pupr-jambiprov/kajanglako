<section id="home" x-data="{
    currentSlide: 0,
    slidesCount: {{ count($slides) }},
    timer: null,
    start() {
        this.timer = setInterval(() => {
            this.next()
        }, 5000)
    },
    stop() {
        clearInterval(this.timer)
    },
    next() {
        this.currentSlide = (this.currentSlide + 1) % this.slidesCount
    },
    prev() {
        this.currentSlide =
            this.currentSlide === 0 ?
            this.slidesCount - 1 :
            this.currentSlide - 1
    }
}" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
    class="relative h-screen w-full overflow-hidden bg-stone-900">
    {{-- Slides --}}
    @foreach ($slides as $index => $slide)
        <div x-show="currentSlide === {{ $index }}" x-transition.opacity.duration.1000ms class="absolute inset-0">
            {{-- Image --}}
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[10000ms] ease-linear"
                :class="currentSlide === {{ $index }} ? 'scale-110' : 'scale-100'"
                style="background-image: url('{{ $slide['image'] }}')"></div>

            {{-- Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-kajang-brown/90 via-stone-900/50 to-transparent">
            </div>

            {{-- Content --}}
            <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                <div x-transition
                    :class="currentSlide === {{ $index }} ?
                        'translate-y-0 opacity-100' :
                        'translate-y-10 opacity-0'"
                    class="max-w-4xl transition-all duration-1000 transform">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 drop-shadow-lg">
                        {{ $slide['title'] }}
                    </h1>
                    <p class="text-lg md:text-2xl text-stone-200 mb-8 font-light max-w-2xl mx-auto drop-shadow-md">
                        {{ $slide['subtitle'] }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#events"
                            class="px-8 py-3 bg-kajang-orange text-white rounded-full font-semibold hover:bg-kajang-darkOrange transition-all shadow-lg hover:shadow-orange-500/30">
                            Lihat Kegiatan →
                        </a>
                        <a href="#about"
                            class="px-8 py-3 border-2 border-white/30 text-white rounded-full font-semibold hover:bg-white/10 transition-all backdrop-blur-sm">
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Navigation --}}
    <button @click="prev"
        class="hidden md:block absolute left-4 top-1/2 -translate-y-1/2 p-3 bg-black/20 hover:bg-black/50 text-white rounded-full backdrop-blur-sm transition"
        aria-label="Previous Slide">
        ‹
    </button>

    <button @click="next"
        class="hidden md:block absolute right-4 top-1/2 -translate-y-1/2 p-3 bg-black/20 hover:bg-black/50 text-white rounded-full backdrop-blur-sm transition"
        aria-label="Next Slide">
        ›
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3">
        @foreach ($slides as $index => $slide)
            <button @click="currentSlide = {{ $index }}"
                :class="currentSlide === {{ $index }} ?
                    'bg-kajang-orange w-8' :
                    'bg-white/50 hover:bg-white'"
                class="h-3 rounded-full transition-all duration-300" style="width: 12px"
                aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
</section>
