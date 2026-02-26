<?php

namespace Database\Seeders;

use App\Models\Histories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Histories::create([
            'type' => 'intro',
            'title' => 'Awal Mula Transformasi Digital',
            'content' => 'Unit Pelaksana Teknis Teknologi Informasi dan Komunikasi (UPT TIK) Universitas Bahaudin Mudhary Madura merupakan unit yang berperan vital dalam mendukung transformasi digital kampus. Perjalanan panjang UPT TIK dimulai dari kesadaran akan pentingnya teknologi informasi dalam meningkatkan kualitas layanan akademik dan administratif. Seiring dengan perkembangan zaman dan tuntutan modernisasi pendidikan tinggi, UPT TIK terus berkembang dan berinovasi untuk memberikan layanan terbaik bagi civitas akademika UNIBA Madura.',

            'is_active' => true,
        ]);

        // Timeline Items
        Histories::create([
            'type' => 'timeline',
            'title' => 'Era Awal Digitalisasi',
            'sub_title' => '2000-2005',
            'content' => 'Dimulainya penggunaan komputer untuk administrasi dan perkuliahan. Pembentukan tim IT pertama untuk mengelola infrastruktur dasar teknologi informasi di kampus.',
            'extras' => ['Komputer Lab pertama', 'Website pertama', 'Email kampus'],

            'is_active' => true,
        ]);

        Histories::create([
            'type' => 'timeline',
            'title' => 'Pembangunan Infrastruktur',
            'sub_title' => '2006-2010',
            'content' => 'Pengembangan jaringan internet kampus dan pembangunan server center. Implementasi sistem informasi akademik pertama untuk mendukung proses belajar mengajar.',
            'extras' => ['Server Center', 'Jaringan Fiber Optic', 'SIAKAD v1.0'],

            'is_active' => true,
        ]);

        Histories::create([
            'type' => 'timeline',
            'title' => 'Ekspansi Layanan Digital',
            'sub_title' => '2011-2015',
            'content' => 'Peluncuran e-learning platform dan digitalisasi perpustakaan. Peningkatan bandwidth internet dan implementasi sistem informasi manajemen terintegrasi.',
            'extras' => ['E-Learning Launch', 'Digital Library', 'Hotspot Area'],

            'is_active' => true,
        ]);

        Histories::create([
            'type' => 'timeline',
            'title' => 'Transformasi Digital',
            'sub_title' => '2016-2020',
            'content' => 'Pembentukan resmi UPT TIK sebagai unit mandiri. Implementasi cloud computing, mobile apps, dan integrasi sistem berbasis API untuk meningkatkan efisiensi operasional.',
            'extras' => ['UPT TIK Resmi', 'Cloud Infrastructure', 'Mobile Apps'],

            'is_active' => true,
        ]);

        Histories::create([
            'type' => 'timeline',
            'title' => 'Era Digital Modern',
            'sub_title' => '2021-Sekarang',
            'content' => 'Implementasi UNIBA Satu Data, Google Workspace for Education, dan sistem keamanan cyber. Pengembangan berkelanjutan menuju smart campus dengan teknologi AI dan IoT.',
            'extras' => ['UNIBA Satu Data', 'Google Workspace', 'Smart Campus'],

            'is_active' => true,
        ]);

        // Vision
        Histories::create([
            'type' => 'vision',
            'title' => 'Masa Depan UPT TIK',
            'content' => 'Melangkah menuju tahun 2030, UPT TIK berkomitmen untuk terus berinovasi dan mengembangkan infrastruktur teknologi informasi yang lebih canggih. Kami akan mengintegrasikan teknologi terkini seperti Artificial Intelligence, Internet of Things, dan Big Data Analytics untuk mewujudkan Smart Campus yang sesungguhnya.',
            'extras' => ['AI Integration', 'IoT Campus', 'Big Data Analytics', 'Cybersecurity', 'Green IT'],

            'is_active' => true,
        ]);
    }
}
