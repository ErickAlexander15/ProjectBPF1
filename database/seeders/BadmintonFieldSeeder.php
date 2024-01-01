<?php

namespace Database\Seeders;

use App\Models\BadmintonField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BadmintonFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('badminton_fields')->truncate();
        Schema::enableForeignKeyConstraints();
        BadmintonField::insert([
            'name' => 'Lapangan Karpet',
            'field_type_id' => 1,
            'price' => 100000,
            'img' => 'images/field/default.jpg'
        ]);
        BadmintonField::insert([
            'name' => 'Lapangan Karpet',
            'field_type_id' => 2, 
            'price' => 100000,
            'img' => 'images/field/default-2.jpg'
        ]);
        BadmintonField::insert([
            'name' => 'Lapangan Karpet',
            'field_type_id' => 2,
            'price' => 100000,
            'img' => 'images/field/default.jpg'
        ]);
    }
}
