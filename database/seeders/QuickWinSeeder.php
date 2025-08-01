<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuickWin;

class QuickWinSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Bogor Berlari',
                'description' => 'Bogor Berlari (Smart Branding).',
                'image' => 'images/bogor_berlari.jpg'
            ],
            [
                'title' => 'Bogor Pisan',
                'description' => '100% Bogor Pisan (Smart Branding).',
                'image' => 'images/bogorpisan.jpg'
            ],
            [
                'title' => 'E-ABCD',
                'description' => 'E-ABCD Urban Agriculture (2018–sekarang) (Smart Branding).',
                'image' => 'images/eabcd.jpg'
            ],
            [
                'title' => 'SIM LLTT',
                'description' => 'Aplikasi e-SPMAMS untuk manajemen Standar Pelayanan Minimal PUPR di bidang Air Minum dan Air Limbah, hibah dari IUWASH ke Pemkot Bogor.',
                'image' => 'images/foto1.jpg'
            ],
            [
                'title' => 'ISABELA',
                'description' => 'Inovasi Keselamatan Publik (Smart Society).',
                'image' => 'images/isabela.jpg'
            ],
            [
                'title' => 'Mall Pelayanan Publik',
                'description' => 'Mall Pelayanan Publik Grha Tiyasa (2018–Sekarang), Lippo Plaza Kebun Raya (Smart Governance).',
                'image' => 'images/mall_pel.jpg'
            ],
            [
                'title' => 'SIM Puskesmas',
                'description' => 'SIMPUS di 26 Puskesmas (Smart Living).',
                'image' => 'images/simpus.jpg'
            ],
            [
                'title' => 'e-SIR',
                'description' => 'Digunakan oleh tenaga kesehatan dan rumah sakit di Kota Bogor (Smart Living).',
                'image' => 'images/esir.jpg'
            ],
            [
                'title' => 'SiBadra',
                'description' => 'Layanan SiBadra (2018–sekarang) (Smart Society), hotline melalui WhatsApp di 0811-9600-0060.',
                'image' => 'images/sibadra.jpg'
            ],
            [
                'title' => 'Revitalisasi Pedestrian',
                'description' => 'Jalur pedestrian heritage Kota Bogor, termasuk seputar Kebun Raya dan penambahan di tahun 2021.',
                'image' => 'images/PEDESTRIAN.jpg'
            ],
            [
                'title' => 'Alun-Alun Kota Bogor',
                'description' => 'Pembangunan alun-alun yang terintegrasi dengan TOD Stasiun Bogor dan Kawasan Heritage Istana–Balai Kota.',
                'image' => 'images/Alunalun.jpg'
            ],
            [
                'title' => 'Biskita Transpakuan',
                'description' => 'Konversi angkot ke bus mikro melalui program Buy The Service dari Kemenhub.',
                'image' => 'images/biskitatrans.jpg'
            ],
            [
                'title' => 'SIM LLTT (Limbah)',
                'description' => 'Layanan dasar air bersih, sanitasi dan air limbah: SIM LLTT (Limbah Terjadwal). Hibah dari IUWASH.',
                'image' => 'images/SIM_LLTT.jpg'
            ],
            [
                'title' => 'e-SP SiKancil',
                'description' => 'Transformasi layanan Dukcapil: SiKancil Berlari, layanan drive-thru, ramah keluarga.',
                'image' => 'images/sikancil.jpg'
            ],
            [
                'title' => 'BOTAK',
                'description' => 'Bogor Tanpa Plastik (BOTAK) (2018–sekarang) (Smart Environment).',
                'image' => 'images/botak.jpg'
            ],
        ];

        foreach ($data as $item) {
            QuickWin::create($item);
        }
    }
}
