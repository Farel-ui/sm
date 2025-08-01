<?php
// database/seeders/BookletSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booklet;

class BookletSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Booklet Smart City 2018',
                'image' => 'images/2018.jpg',
                'file'  => 'booklet/Booklet-Smart-City-Kota-Bogor-2018',
            ],
            [
                'title' => 'Booklet Smart City 2019',
                'image' => 'images/booklet/2019.jpg',
                'file'  => 'booklet/Booklet-Smart-City-Kota-Bogor-2019',
            ],
            [
                'title' => 'Booklet Smart City 2020',
                'image' => 'images/booklet/2020.jpg',
                'file'  => 'booklet/Booklet-Smart-City-Kota-Bogor-2020',
            ],
            [
                'title' => 'Booklet Smart City 2021',
                'image' => 'images/2021.jpg',
                'file'  => 'booklet/Booklet-Smart-City-Kota-Bogor-2021',
            ],
            [
                'title' => 'Booklet Smart City 2022',
                'image' => 'images/2023.jpg',
                'file'  => 'booklet/Booklet-Smart-City-Kota-Bogor-2022-V9.pdf',
            ],
            [
                'title' => 'Booklet Smart City 2023',
                'image' => 'images/2023.jpg',
                'file'  => 'booklet/Booklet-Smart-City-Kota-Bogor-2023',
            ],
            [
                'title' => 'Booklet Smart City 2024',
                'image' => 'images/2024.jpg',
                'file'  => 'booklet/public/storage/booklet/Booklet-Smart-City-2024.pdf',
            ],
        ];

        foreach ($data as $item) {
            Booklet::create($item);
        }
    }
}
