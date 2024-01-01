<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('configurations')->truncate();
            Configuration::create([
                'name' => 'app.name',
                'content' => 'Angkasa Badminton Centre'
            ]);
            Configuration::create([
                'name' => 'app.description',
                'content' => 'Angkasa Badminton Centre adalah sarana olah raga Bulu Tangkis terbesar di Sumatera dengan kapasitas
                10 lapangan. Bertempat di Pekanbaru - Riau, ABC bertujuan untuk menyediakan sarana yang lengkap dan nyaman
                agar anda dapat berolahraga dan berprestasi di cabang olah raga Bulu Tangkis.'
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
