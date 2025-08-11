<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['year' => '2020', 'score' => 3.12, 'color' => '#d90404'],
            ['year' => '2021', 'score' => 3.33, 'color' => '#f97316'],
            ['year' => '2022', 'score' => 3.46, 'color' => '#facc15'],
            ['year' => '2023', 'score' => 3.35, 'color' => '#0e7490'],
            ['year' => '2024', 'score' => 3.57, 'color' => '#22d3ee'],
        ];

        foreach ($data as $item) {
            Assessment::updateOrCreate(
                ['year' => $item['year']],
                ['score' => $item['score'], 'color' => $item['color']]
            );
        }
        Assessment::create([
    'year' => '2020',
    'score' => 3.45,
    'color' => '#4CAF50',
    'award_title' => 'Smart City Award 2020',
    'award_image' => 'award2020.png',
]);

Assessment::create([
    'year' => '2021',
    'score' => 3.75,
    'color' => '#2196F3',
    'award_title' => null,
    'award_image' => null,
]);
    }
}
