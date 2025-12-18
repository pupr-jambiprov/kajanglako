<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'Sinema Kajang Lako',
            'description' => '<p>Sinema Kajang Lako adalah komunitas film yang berfokus pada pengembangan sinema lokal di Jambi. Kami berkomitmen untuk mendukung sineas lokal melalui berbagai kegiatan seperti workshop, pemutaran film, dan kolaborasi proyek kreatif.</p><p>Visi kami adalah menjadi wadah utama bagi para sineas lokal untuk berkarya, belajar, dan berjejaring, serta mempromosikan budaya lokal melalui medium film.</p>',
            'logo' => 'profiles/default-logo.png',
            'cover_image' => 'profiles/default-cover.jpg',
            'email' => 'info@sinemakajanglako.id',
            'phone' => '+62 813-1234-5678',
            'address' => 'Jl. Merdeka No.123, Jambi, Indonesia',
            'instagram' => 'sinemakajanglako',
            'youtube' => 'sinemakajanglako',
            'website' => 'sinemakajanglako',
        ]);
    }
}
