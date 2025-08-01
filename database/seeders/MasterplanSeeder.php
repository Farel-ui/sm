<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Masterplan;

class MasterplanSeeder extends Seeder
{
    public function run()
    {
        $masterplans = [
            // Buku Masterplan 2017–2021 (3 buku saja)
            [
                'title' => 'Buku 1. Analisis Strategis Smart City Kota Bogor',
                'period' => '2017–2021',
                'type' => 'buku',
                'file' => 'masterplans/buku-1.-analisis-strategis-smart-city-kota-bogor.pdf',
            ],
            [
                'title' => 'Buku 2. Masterplan Smart City Kota Bogor',
                'period' => '2017–2021',
                'type' => 'buku',
                'file' => 'masterplans/buku-2.-masterplan-smart-city-kota-bogor.pdf',
            ],
            [
                'title' => 'Buku 3. Executive Summary Smart City Kota Bogor',
                'period' => '2017–2021',
                'type' => 'buku',
                'file' => 'masterplans/newsletter-executive-summary-smart-city-kota-bogor.pdf',
            ],

            // Buku Masterplan 2023–2027 (4 buku)
            [
                'title' => 'Buku 1. Analisis Strategis Smart City Kota Bogor',
                'period' => '2023–2027',
                'type' => 'buku',
                'file' => 'masterplans/buku-3.smart-city-kota-bogor.pdf',
            ],
            [
                'title' => 'Buku 2. Masterplan Smart City Kota Bogor',
                'period' => '2023–2027',
                'type' => 'buku',
                'file' => 'masterplans/buku-4.smart-city-kota-bogor.pdf',
            ],
            [
                'title' => 'Buku 3. Quick Wins Smart City Kota Bogor',
                'period' => '2023–2027',
                'type' => 'buku',
                'file' => 'masterplans/buku-5.smart-city-kota-bogor.pdf',
            ],
            [
                'title' => 'Buku 4. Road Map Smart City Kota Bogor',
                'period' => '2023–2027',
                'type' => 'buku',
                'file' => 'masterplans/dokumenQuickwins.pdf',
            ],

            // 12 Paparan (berdasarkan tahun tanpa tanda hubung)
            [
                'title' => 'Capaian Program smart city kota Bogor V1 2018',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/Capaian_Program_Smart_City_Kota_Bogor-V1-2018.pdf',
            ],
            [
                'title' => 'Capaian Program smart city kota Bogor V2 2018',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/Capaian_Program_Smart_CityKota_Bogor-V2-2018.pdf',
            ],
            [
                'title' => 'Smartcity 2019 Tahap 2',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/Smartcity_2019_Tahap%202.pdf',
            ],
            [
                'title' => 'Expose Smart City 2020',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/Ekspose_Smart_City-2020.pdf',
            ],[
                'title' => 'Pointer Evaluasi & Gerakan 100 Smart City 2021',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/pointer.pdf',
            ],
            [
                'title' => 'SMART CITY Concept – Sharing From Finland',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/smartcity.pdf',
            ],
            [
                'title' => 'SMART CITY 2021',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'SMARTCITY-PPT.pdf',
            ],
            [
                'title' => 'Paparan Wali Kota Bogor PIKKC ITB',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'Paparan.pdf',
            ],
            [
                'title' => 'Arahan Sambutan Sekda Kickoff Smart City',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/sambutansekda.pdf',
            ],
            [
                'title' => 'Laporan Kickoff Smart City 2022',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/kickoff.pdf',
            ],
            [
                'title' => 'Paparan Wali Kota Bogor PIKKC ITB',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/PaparanWalikota.pdf',
            ],
            [
                'title' => 'Presentasi Narasumber ITE Hybrid 2021',
                'period' => 'paparan',
                'type' => 'paparan',
                'file' => 'masterplans/PresentasiNarsum.pdf',
            ],
        ];

        foreach ($masterplans as $item) {
            Masterplan::create($item);
        }
    }
}
