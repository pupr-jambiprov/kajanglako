<footer id="contact" class="bg-kajang-brown text-stone-300 py-20">

    <div class="container mx-auto px-4">

        {{-- TOP GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

            {{-- BRAND --}}
            <div data-aos="fade-right" data-aos-duration="900">

                <div class="flex items-center space-x-2 mb-6">
                    <div class="text-white">
                        <img src="{{ asset('/assets/logo/logo.png') }}" alt="Logo" class="w-8 h-8">
                    </div>
                    <span class="text-xl font-bold text-white">
                        {{ $profile->name }}
                    </span>
                </div>

                <p class="text-sm leading-relaxed mb-6">
                    {!! strip_tags($profile->description, '<br><strong><em><a>') !!}
                </p>

                {{-- SOCIAL --}}
                <div class="flex space-x-4">
                    <a href="{{ $profile->instagram }}" class="hover:text-kajang-orange transition-colors" target="_blank" rel="noopener noreferrer">
                        {{-- Instagram --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" />
                            <circle cx="12" cy="12" r="4" />
                            <circle cx="18" cy="6" r="1" />
                        </svg>
                    </a>
                    <a href="{{ $profile->youtube }}" class="hover:text-kajang-orange transition-colors" target="_blank" rel="noopener noreferrer">
                        {{-- Youtube --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="6" width="20" height="12" rx="2" />
                            <polygon points="10,9 16,12 10,15" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- QUICK LINKS --}}
            <div data-aos="fade-up" data-aos-delay="100">

                <h3 class="text-white font-bold text-lg mb-6">
                    Tautan Cepat
                </h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#home" class="hover:text-kajang-orange transition-colors">Beranda</a></li>
                    <li><a href="#about" class="hover:text-kajang-orange transition-colors">Tentang Kami</a></li>
                    <li><a href="#events" class="hover:text-kajang-orange transition-colors">Kegiatan</a></li>
                    <li><a href="#members" class="hover:text-kajang-orange transition-colors">Keanggotaan</a></li>
                    <li><a href="#gallery" class="hover:text-kajang-orange transition-colors">Galeri</a></li>
                </ul>
            </div>

            {{-- CONTACT --}}
            <div data-aos="fade-up" data-aos-delay="200">

                <h3 class="text-white font-bold text-lg mb-6">
                    Hubungi Kami
                </h3>

                <ul class="space-y-4 text-sm">
                    <li class="flex items-start">
                        <span class="text-kajang-orange mr-3">✉</span>
                        <span>
                            {{ $profile->phone }}
                        </span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-kajang-orange mr-3 font-bold">A</span>
                        <span>
                            {{$profile->address}}
                        </span>
                    </li>
                </ul>
            </div>

            {{-- NEWSLETTER --}}
            <div data-aos="fade-left" data-aos-delay="300">

                <h3 class="text-white font-bold text-lg mb-6">
                    Kabar Terbaru
                </h3>

                <p class="text-sm mb-4">
                    Dapatkan info workshop dan screening terbaru.
                </p>

                <form class="flex flex-col space-y-3">
                    <input type="email" placeholder="Email Anda"
                        class="px-4 py-2 bg-stone-800 border border-stone-700
                               rounded-lg focus:outline-none
                               focus:border-kajang-orange
                               text-white placeholder-stone-500" />

                    <button type="button"
                        class="px-4 py-2 bg-kajang-orange text-white
                               rounded-lg font-semibold
                               hover:bg-kajang-darkOrange transition-colors">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>

        {{-- COPYRIGHT --}}
        <div class="border-t border-stone-800 mt-16 pt-8
                   text-center text-sm text-stone-500"
            data-aos="fade-in" data-aos-delay="400">

            <p>
                &copy; {{ date('Y') }} {{ $profile->name }}. All rights reserved.
            </p>
        </div>

    </div>
</footer>
