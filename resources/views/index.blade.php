<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="theme-color" content="#9A4F1E">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sinema Kajang Lako | Komunitas Film & Sinema Lokal Jambi</title>

    {{-- SEO Meta Tags --}}
    <meta name="description"
        content="Sinema Kajang Lako adalah komunitas film di Jambi yang bergerak di bidang produksi, edukasi, screening, dan apresiasi sinema lokal.">

    <meta name="keywords"
        content="Sinema Kajang Lako, komunitas film Jambi, film lokal Jambi, screening film, workshop film, sineas Jambi">

    <meta name="author" content="Sinema Kajang Lako">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Sinema Kajang Lako | Komunitas Film & Sinema Lokal Jambi">
    <meta property="og:description" content="Wadah kolaborasi, edukasi, dan apresiasi sinema lokal di Jambi.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Sinema Kajang Lako">
    <meta property="og:image" content="{{ asset('images/og-kajanglako.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sinema Kajang Lako | Komunitas Film Jambi">
    <meta name="twitter:description" content="Komunitas film lokal Jambi untuk produksi, edukasi, dan screening film.">
    <meta name="twitter:image" content="{{ asset('images/og-kajanglako.jpg') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        kajang: {
                            orange: '#ea580c', // orange-600
                            darkOrange: '#c2410c', // orange-700
                            brown: '#451a03', // amber-950
                            lightBrown: '#78350f', // amber-900
                            offWhite: '#fafaf9', // stone-50
                        }
                    }
                }
            },

        }
    </script>
    <style>
        /* LOCK BACKGROUND SCROLL (AMAN MOBILE) */
        html,
        body {
            overscroll-behavior: none;
        }

        /* MODAL SCROLL FIX */
        [x-show="openModal"]>div.relative {
            max-height: 90vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER TETAP */
        [x-show="openModal"]>div.relative>div:first-child {
            flex-shrink: 0;
        }

        /* ISI MODAL BISA SCROLL */
        [x-show="openModal"]>div.relative>div:last-child {
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #292524;
        }

        ::-webkit-scrollbar-thumb {
            background: #ea580c;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #c2410c;
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        (() => {
            const theme = localStorage.getItem('theme')
            if (theme === 'dark' ||
                (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            }
        })()
    </script>

</head>

<body class="bg-kajang-offWhite text-stone-900 dark:bg-stone-950 dark:text-stone-100 transition-colors duration-300"
    x-data="galleryModal()" x-init="init()">

    <x-nav :navItems="$navItems" />

    <x-slider :slides="$slides" />

    <x-about />

    <x-vision-mision />

    <x-events :events="$events" />

    {{-- <x-members :members="$members"/> --}}
    <x-member-swipe :members="$members" />

    <x-new-gallery :galleries="$galleries" />

    <x-footer />

    <!-- Back To Top Button -->
    <div x-data="{
        show: false,
        init() {
            window.addEventListener('scroll', () => {
                this.show = window.scrollY > 300
            })
        }
    }" x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75" class="fixed bottom-6 right-6 z-50">
        <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="w-12 h-12 flex items-center justify-center
               rounded-full shadow-lg
               bg-kajang-orange hover:bg-kajang-darkOrange
               text-white
               dark:bg-kajang-brown dark:hover:bg-kajang-darkBrown
               transition-all duration-300
               hover:-translate-y-1 hover:shadow-xl"
            aria-label="Back to top">
            <!-- Arrow Up Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>


    <script>
        AOS.init({
            once: true,
            offset: 80,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    </script>

    <script>
        new Swiper('.memberSwiper', {
            slidesPerView: 1.2,
            spaceBetween: 24,
            grabCursor: true,
            centeredSlides: false,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            breakpoints: {
                640: {
                    slidesPerView: 2.2,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
    </script>

    <script>
        function galleryModal() {
            return {
                openModal: false,

                videoOpen: false,
                videoEmbedUrl: null,

                imageOpen: false,
                imagePreview: null,

                gallery: {},
                items: [],

                async open(id) {
                    this.openModal = true;
                    document.body.classList.add('overflow-hidden');

                    const res = await fetch(`/gallery/${id}`);
                    const data = await res.json();

                    this.gallery = data.gallery;
                    this.items = data.items;
                },

                openVideo(url) {
                    const id = url.includes('watch?v=') ?
                        url.split('watch?v=')[1] :
                        url.split('/').pop();

                    this.videoEmbedUrl =
                        `https://www.youtube.com/embed/${id}?autoplay=1`;

                    this.videoOpen = true;
                },

                closeVideo() {
                    this.videoOpen = false;
                    this.videoEmbedUrl = null;
                },

                openImage(src) {
                    this.imagePreview = src;
                    this.imageOpen = true;
                },

                closeImage() {
                    this.imageOpen = false;
                    this.imagePreview = null;
                },

                close() {
                    this.openModal = false;
                    this.closeVideo();
                    this.closeImage();
                    this.gallery = {};
                    this.items = [];
                    document.body.classList.remove('overflow-hidden');
                }
            }
        }
    </script>

</body>

</html>
