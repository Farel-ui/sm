<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IgaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('igas')->insert([
             [
                'title' => 'DPMPTSP 2',
                'institution' => 'DPMPSTP',
                'image' => 'https://smartcity.kotabogor.go.id/assets/gambar/tengah/dpmptsp2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dishub',
                'institution' => 'DISHUB',
                'image' => 'https://smartcity.kotabogor.go.id/assets/gambar/tengah/dishub.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Basdinkes',
                'institution' => 'DINKES',
                'image' => 'https://smartcity.kotabogor.go.id/assets/gambar/tengah/basdinkes.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'CAPIL',
                'institution' => 'DISDUKCAPIL',
                'image' => 'https://smartcity.kotabogor.go.id/assets/gambar/tengah/CAPIL.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Biskita',
                'institution' => 'DISHUB',
                'image' => 'https://smartcity.kotabogor.go.id/assets/gambar/tengah/Biskita.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
