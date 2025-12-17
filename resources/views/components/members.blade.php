<section id="members" class="py-24 bg-white dark:bg-stone-900 border-y border-stone-100 dark:border-stone-800">

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

        {{-- MEMBERS GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach ($members as $index => $member)
                <div data-aos="zoom-in-up" data-aos-delay="{{ $index * 120 }}" data-aos-duration="900"
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
                            <img src="{{ $member['photo'] }}" alt="{{ $member['name'] }}"
                                class="w-full h-full object-cover
                                        grayscale group-hover:grayscale-0
                                        transition-all duration-500" />
                        </div>
                    </div>

                    {{-- NAME --}}
                    <h3
                        class="text-xl font-bold text-stone-900 dark:text-white
                               group-hover:text-kajang-orange transition-colors">
                        {{ $member['name'] }}
                    </h3>

                    {{-- ROLE --}}
                    <p class="text-kajang-orange font-medium text-sm mb-3">
                        {{ $member['role'] }}
                    </p>

                    {{-- BIO --}}
                    <p class="text-stone-500 dark:text-stone-400 text-sm px-4">
                        “{{ $member['bio'] }}”
                    </p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center" data-aos="fade-up" data-aos-duration="800">
        {{-- <h2 class="text-4xl md:text-3xl font-bold text-stone-900 dark:text-white mb-4">
            Ingin Bergabung dengan Kami?
        </h2>
        <p class="text-stone-600 dark:text-stone-300 max-w-xl mx-auto">
            Kami selalu membuka pintu untuk pecinta film dari berbagai latar belakang
        </p> --}}
        <div class="mt-16">
            <a href="#members"
                class="px-8 py-3 bg-kajang-orange text-white rounded-full font-semibold hover:bg-kajang-darkOrange transition-all shadow-lg hover:shadow-orange-500/30">
                Lihat semua anggota →
            </a>
        </div>
    </div>
</section>
