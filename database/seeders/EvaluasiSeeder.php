<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
        use App\Models\Evaluasi;
class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
Evaluasi::insert([
    ['tahun' => 2021, 'baseline' => 3, 'output' => 2.5, 'outcome' => 3.5, 'impact' => 3, 'quick_wins' => 4],
    ['tahun' => 2022, 'baseline' => 4, 'output' => 3, 'outcome' => 3.5, 'impact' => 3, 'quick_wins' => 4],
    ['tahun' => 2023, 'baseline' => 3.7, 'output' => 3, 'outcome' => 3.2, 'impact' => 3.1, 'quick_wins' => 3.8],
    ['tahun' => 2024, 'baseline' => 3.9, 'output' => 3.5, 'outcome' => 3.6, 'impact' => 3.5, 'quick_wins' => 4],
]);

    }
}
