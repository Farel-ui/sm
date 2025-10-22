<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Agenda::insert([
        ['judul' => 'Evaluasi Tahap 2', 'tanggal' => '2025-10-25'],
        ['judul' => 'Upload Quick Win Baru', 'tanggal' => '2025-11-10'],
        ['judul' => 'Rapat Monitoring Tahunan', 'tanggal' => '2025-11-20'],
        ['judul' => 'Pelaporan Akhir Tahun', 'tanggal' => '2025-12-05'],
    ]);
}
}
