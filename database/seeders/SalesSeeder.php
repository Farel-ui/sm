<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use Carbon\Carbon;

class SalesSeeder extends Seeder
{
    public function run()
    {
        $start = Carbon::now()->subYears(10)->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $current = $start->copy();
        while ($current->lte($end)) {
            $base = 1000 + ($current->diffInMonths($start) * 20);
            $noise = rand(-300, 600);

            Sale::create([
                'date' => $current->format('Y-m-d'),
                'amount' => max(0, $base + $noise),
            ]);

            $current->addMonth();
        }
    }
}
