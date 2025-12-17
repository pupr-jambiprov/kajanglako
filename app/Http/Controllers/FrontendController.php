<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $navItems = [
            ['label' => 'Beranda', 'href' => '#'],
            ['label' => 'Tentang', 'href' => '#about'],
            ['label' => 'Visi & Misi', 'href' => '#vision-mission'],
            ['label' => 'Kegiatan', 'href' => '#events'],
            ['label' => 'Anggota', 'href' => '#members'],
            ['label' => 'Galeri', 'href' => '#gallery'],
            ['label' => 'Kontak', 'href' => '#contact'],
        ];

        // $slides = [
        //     [
        //         'image' => 'http://kajanglako.test/assets/sliders/shoting1.jpg',
        //         'title' => 'Merayakan Sinema Lokal',
        //         'subtitle' => 'Wadah Apresiasi dan Kreasi Sineas Kajang Lako',
        //     ],
        //     [
        //         'image' => 'http://kajanglako.test/assets/sliders/hero-event.jpg',
        //         'title' => 'Eksplorasi Visual Tanpa Batas',
        //         'subtitle' => 'Workshop dan Kelas Film untuk Generasi Baru',
        //     ],
        //     [
        //         'image' => 'http://kajanglako.test/assets/sliders/hero-workshop.jpg',
        //         'title' => 'Komunitas Yang Menginspirasi',
        //         'subtitle' => 'Bergabunglah Bersama Ratusan Anggota Kreatif',
        //     ],
        // ];

        $slides = \App\Models\Slide::where('is_active', true)
            ->orderBy('created_at', 'asc')
            ->get();

        // $events = [
        //     [
        //         'id' => 1,
        //         'title' => "Screening Film: 'Jejak di Seberang'",
        //         'event_date' => '15 November 2023',
        //         'event_time' => '19:00 WIB',
        //         'location' => 'Teater Arena, Taman Budaya',
        //         'description' => 'Pemutaran perdana film dokumenter karya sineas muda Jambi yang mengangkat kisah penambang pasir tradisional.',
        //         'category.name' => 'Screening',
        //         'thumbnail' => 'https://picsum.photos/id/106/800/600',
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'Workshop: Dasar Sinematografi',
        //         'event_date' => '22 November 2023',
        //         'event_time' => '09:00 WIB',
        //         'location' => 'Studio Kajang Lako',
        //         'description' => 'Belajar komposisi, pencahayaan, dan pergerakan kamera dasar bersama mentor berpengalaman.',
        //         'category.name' => 'Workshop',
        //         'thumbnail' => 'https://picsum.photos/id/250/800/600',
        //     ],
        //     [
        //         'id' => 3,
        //         'title' => 'Temu Sineas Bulanan',
        //         'event_date' => '01 Desember 2023',
        //         'event_time' => '16:00 WIB',
        //         'location' => 'Coffee Shop Senja',
        //         'description' => 'Diskusi santai mengenai perkembangan industri film indie dan networking antar anggota komunitas.',
        //         'category.name' => 'Meetup',
        //         'thumbnail' => 'https://picsum.photos/id/447/800/600',
        //     ],
        // ];

        $events = \App\Models\Event::with('category')->where('is_published', true)
            ->orderBy('event_date', 'asc')
            ->get();
        // dd($events);

        // $members = [
        //     [
        //         'id' => 1,
        //         'name' => 'Anton Wijaya',
        //         'role' => 'Ketua Komunitas',
        //         'bio' => 'Sutradara film pendek dengan pengalaman 5 tahun.',
        //         'imageUrl' => 'http://kajanglako.test/assets/sliders/anton.png',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Siti Aminah',
        //         'role' => 'Koordinator Program',
        //         'bio' => 'Penulis naskah yang aktif mengajar kelas skenario.',
        //         'imageUrl' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Ahmad Roni',
        //         'role' => 'Kepala Produksi',
        //         'bio' => 'Sinematografer spesialis dokumenter budaya.',
        //         'imageUrl' => 'http://kajanglako.test/assets/sliders/roni.jpg',
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'Dewi Lestari',
        //         'role' => 'Hubungan Masyarakat',
        //         'bio' => 'Pegiat seni pertunjukan dan manajer event.',
        //         'imageUrl' => 'https://images.unsplash.com/photo-1574108233269-86d1199d28de?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        //     ],
        // ];

        $members = \App\Models\Member::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        // $galleryItems = [
        //     ['id' => 1, 'type' => 'video', 'title' => 'Recap Workshop 2023', 'thumbnailUrl' => 'http://kajanglako.test/assets/sliders/hero-cinema.jpg'],
        //     ['id' => 2, 'type' => 'photo', 'title' => 'BTS Shooting "Tanah Pilih"', 'thumbnailUrl' => 'http://kajanglako.test/assets/sliders/hero-event.jpg'],
        //     ['id' => 3, 'type' => 'photo', 'title' => 'Diskusi Film', 'thumbnailUrl' => 'http://kajanglako.test/assets/sliders/hero-workshop.jpg'],
        //     ['id' => 4, 'type' => 'photo', 'title' => 'Festival Film Jambi', 'thumbnailUrl' => 'http://kajanglako.test/assets/sliders/hero-workshop.jpg'],
        //     ['id' => 5, 'type' => 'video', 'title' => 'Teaser "Sungai Batanghari"', 'thumbnailUrl' => 'http://kajanglako.test/assets/sliders/hero-event.jpg'],
        //     ['id' => 6, 'type' => 'photo', 'title' => 'Screening Outdoor', 'thumbnailUrl' => 'http://kajanglako.test/assets/sliders/hero-cinema.jpg'],
        // ];

        // $galleryItems = Gallery::query()
        // ->with(['items' => function ($q) {
        //     $q->orderBy('created_at', 'desc');
        // }])
        // ->where('is_active', true)
        // ->get()
        // ->flatMap(fn ($gallery) =>
        //     $gallery->items->map(fn ($item) => [
        //         'id' => $item->id,
        //         'type' => $item->type === 'image' ? 'photo' : 'video',
        //         'title' => $item->caption ?? $gallery->title,
        //         'thumbnailUrl' => $item->image,
        //         'videoUrl' => $item->video_url,
        //         'gallery' => $gallery->title,
        //     ])
        // );

        $galleries = Gallery::query()
            ->where('is_active', true)
            ->withCount('items')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($gallery) => [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'cover' => asset('storage/' . $gallery->cover),
                'itemsCount' => $gallery->items_count,
            ]);

        // dd($galleryItems);


        return view('index', compact('navItems', 'slides', 'events', 'members', 'galleries'));
    }
}
