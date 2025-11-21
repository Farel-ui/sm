<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penilaian;

class PenilaianSeeder extends Seeder
{
    public function run()
    {
        $penilaians = [
            [
                'score' => 2.44,
                'year' => 2019,
            ],
            [
                'score' => 3.33,
                'year' => 2021,
            ],
            [
                'score' => 3.46,
                'year' => 2022,
            ],
            [
                'score' => 3.35,
                'year' => 2023,
            ],
            [
                'score' => 3.57,
                'year' => 2024,
            ],
        ];

        foreach ($penilaians as $item) {
            Penilaian::create($item);
        }
    }
}
