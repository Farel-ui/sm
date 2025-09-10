<?php

namespace Database\Seeders;
use App\Models\Implementasi; 

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImplementasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Implementasi::create([
        'title' => 'Implementasi Smart City Kota Bogor',
        'file' => 'documents/implementasi.pdf', // simpan di public/documents/
             ]);
    }
}
