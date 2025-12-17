<section id="members"
    class="py-24 bg-white dark:bg-stone-900 border-y border-stone-100 dark:border-stone-800">

    <div class="container mx-auto px-4">

        {{-- HEADER --}}
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl md:text-5xl font-bold text-stone-900 dark:text-white mb-4">
                Pengurus
                <span class="text-kajang-brown dark:text-kajang-orange">Inti</span>
            </h2>
            <p class="text-stone-600 dark:text-stone-300 max-w-xl mx-auto">
                Orang-orang di balik layar yang berdesikasi untuk memajukan komunitas Sinema Kajang Lako.
            </p>
        </div>

        {{-- SWIPER MEMBERS --}}
        <div class="swiper memberSwiper">
            <div class="swiper-wrapper">

                @foreach ($members as $index => $member)
                    <div class="swiper-slide">

                        <div data-aos="zoom-in-up"
                            data-aos-delay="{{ $index * 120 }}"
                            data-aos-duration="900"
                            class="text-center group">

                            {{-- AVATAR --}}
                            <div class="relative w-44 h-44 mx-auto mb-6">

                                {{-- ROTATING BORDER --}}
                                <div
                                    class="absolute inset-0 rounded-full border-2 border-dashed
                                           border-kajang-orange opacity-0
                                           group-hover:opacity-100
                                           animate-[spin_12s_linear_infinite] transition-opacity">
                                </div>

                                <div
                                    class="absolute inset-2 rounded-full overflow-hidden shadow-lg
                                           border-4 border-stone-100 dark:border-stone-800">
                                    <img src="{{ $member->photo }}"
                                        alt="{{ $member->name }}"
                                        class="w-full h-full object-cover
                                               grayscale group-hover:grayscale-0
                                               transition-all duration-500" />
                                </div>
                            </div>

                            {{-- NAME --}}
                            <h3
                                class="text-xl font-bold text-stone-900 dark:text-white
                                       group-hover:text-kajang-orange transition-colors">
                                {{ $member->name }}
                            </h3>

                            {{-- ROLE --}}
                            <p class="text-kajang-orange font-medium text-sm mb-3">
                                {{ $member->role }}
                            </p>

                            {{-- BIO --}}
                            <p class="text-stone-500 dark:text-stone-400 text-sm px-4">
                                “{{ $member->bio }}”
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="swiper-pagination mt-110"></div>
        </div>
    </div>
</section>
