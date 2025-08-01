<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dimension;

class DimensionSeeder extends Seeder
{
    public function run()
    {
        $dimensions = [
            [
                'name' => 'Smart Governance',
                'description' => 'Layanan publik, ketertiban umum. <strong>E-menanduk, Mall Pelayanan Publik Grha Tiyasa</strong>',
                'image' => 'images/icongovernance.svg',
                'video' => 'video/SMART_GOVERNANCE.mp4',
            ],
            [
                'name' => 'Smart Living',
                'description' => 'Tersedia lingkungan tempat tinggal yang layak huni, nyaman, dan efisien. <strong>Simpus di 26 puskesmas, e-SIR</strong>',
                'image' => 'images/living.svg',
                'video' => 'video/SMART_LIVING.mp4',
            ],
            [
                'name' => 'Smart Economy',
                'description' => 'Peluang usaha, sumber daya, permodalan. Sistem layanan <strong>perizinan (SMART), inovasi daerah (IGIA).</strong>',
                'image' => 'images/economy.svg',
                'video' => 'video/SMART_ECONOMY.mp4',
            ],
            [
                'name' => 'Smart Branding',
                'description' => 'Penataan wajah kota dan pemasaran potensi daerah secara nasional. <strong>100% Bogor Pisan, Bogor Berlari</strong>',
                'image' => 'images/branding.svg',
                'video' => 'video/SMART_BRANDING.mp4',
            ],
            [
                'name' => 'Smart Society',
                'description' => 'Ekosistem sosio-teknologis masyarakat yang humanis, dinamis, dan interaktif. <strong>Inovasi keselamatan publik, SIBABRA</strong>',
                'image' => 'images/society.svg',
                'video' => 'video/SMART_SOCIETY.mp4',
            ],
            [
                'name' => 'Smart Environment',
                'description' => 'Pengendalian polusi, pengolahan limbah. <strong>Bogor Tanpa Plastik (BOTAK), Urban Agriculture</strong>',
                'image' => 'images/enviroment.svg',
                'video' => 'video/SMART_ENVIRONMENT.mp4',
            ],
        ];

        foreach ($dimensions as $data) {
            Dimension::create($data);
        }
    }
}