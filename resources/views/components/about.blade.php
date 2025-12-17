<section id="about" class="py-24 bg-stone-100 dark:bg-stone-950 relative overflow-hidden">

    <div class="container mx-auto px-4">

        <!-- HEADER -->
        <div class="text-center max-w-4xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-kajang-orange font-bold uppercase tracking-wider text-sm">
                Tentang Kami
            </span>

            <h2 class="text-3xl md:text-5xl font-bold text-stone-900 dark:text-white mt-4 mb-6" data-aos="fade-up"
                data-aos-delay="150">
                {{ $profile->name }}
            </h2>
        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- TEXT -->
            <div data-aos="fade-right" data-aos-delay="100">

                <div class="prose prose-stone-400 leading-relaxed dark:prose-invert max-w-none text-justify">
                    {!! $profile->description !!}
                </div>
            </div>

            <!-- IMAGE -->
            <div class="relative" data-aos="fade-left" data-aos-delay="200">
                <div class="absolute -inset-4 bg-kajang-orange/20 rounded-3xl blur-2xl"></div>

                <img src="{{ asset('storage/' . $profile->cover_image) }}" alt="Tentang Sinema Kajang Lako"
                    class="relative rounded-3xl shadow-xl object-cover w-full h-[360px]" />
            </div>
        </div>
    </div>
</section>
