<nav x-data="{
    isOpen: false,
    isScrolled: false,
    isDarkMode: document.documentElement.classList.contains('dark')
}" x-init="window.addEventListener('scroll', () => {
    isScrolled = window.scrollY > 10
})"
    :class="isScrolled
        ?
        'bg-white/90 dark:bg-kajang-brown/90 backdrop-blur-md shadow-lg py-2' :
        'bg-transparent py-4'"
    class="fixed w-full z-50 transition-all duration-300">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center">

            {{-- Logo --}}
            <a href="#" class="flex items-center space-x-2 group">
                <div
                    class="p-2 rounded-lg text-white group-hover:bg-kajang-darkOrange transition-colors">
                    <img src="{{ asset('/assets/logo/logo.png') }}" alt="Logo" class="w-8 h-8">
                </div>
                <span
                    :class="isScrolled
                        ?
                        'text-kajang-brown dark:text-white' :
                        'text-white'"
                    class="text-xl font-bold tracking-tight">
                    Sinema Kajang Lako
                </span>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center space-x-8">
                @foreach ($navItems as $item)
                    <a href="{{ $item['href'] }}"
                        :class="isScrolled
                            ?
                            'text-stone-700 dark:text-stone-200' :
                            'text-stone-100'"
                        class="text-sm font-medium transition-colors hover:text-kajang-orange">
                        {{ $item['label'] }}
                    </a>
                @endforeach

                {{-- Dark Mode Toggle --}}
                <button
                    @click="
                        isDarkMode = !isDarkMode;
                        document.documentElement.classList.toggle('dark')
                    "
                    :class="isScrolled
                        ?
                        'bg-stone-100 text-stone-800 dark:bg-stone-800 dark:text-yellow-400 hover:bg-stone-200 dark:hover:bg-stone-700' :
                        'bg-white/20 text-white hover:bg-white/30'"
                    class="p-2 rounded-full transition-colors" aria-label="Toggle Dark Mode">
                    <template x-if="isDarkMode">
                        {{-- Sun --}}
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke="currentColor" stroke-width="2" stroke-width="2">
                            <circle cx="12" cy="12" r="5"></circle>
                            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42
                                    M18.36 18.36l1.42 1.42
                                    M1 12h2M21 12h2
                                    M4.22 19.78l1.42-1.42
                                    M18.36 5.64l1.42-1.42" />
                        </svg>
                    </template>
                    <template x-if="!isDarkMode">
                        {{-- Moon --}}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                        </svg>
                    </template>
                </button>
            </div>

            {{-- Mobile Button --}}
            <div class="md:hidden flex items-center space-x-4">
                <button
                    @click="
                        isDarkMode = !isDarkMode;
                        document.documentElement.classList.toggle('dark')
                    "
                    :class="isScrolled
                        ?
                        'bg-stone-100 text-stone-800 dark:bg-stone-800 dark:text-yellow-400' :
                        'bg-white/20 text-white'"
                    class="p-2 rounded-full transition-colors">
                    <span x-text="isDarkMode ? '☀' : '🌙'"></span>
                </button>

                <button @click="isOpen = !isOpen"
                    :class="isScrolled
                        ?
                        'text-stone-800 dark:text-white' :
                        'text-white'"
                    class="p-2 rounded-md">
                    <span x-text="isOpen ? '✕' : '☰'"></span>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Dropdown --}}
    <div x-show="isOpen" x-transition
        class="md:hidden absolute top-full left-0 w-full bg-white dark:bg-kajang-brown border-t dark:border-stone-800 shadow-xl">
        <div class="flex flex-col py-4 px-4 space-y-4">
            @foreach ($navItems as $item)
                <a href="{{ $item['href'] }}" @click="isOpen = false"
                    class="font-medium text-stone-700 dark:text-stone-200 hover:text-kajang-orange">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
