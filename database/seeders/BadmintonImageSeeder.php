<?php

namespace Database\Seeders;

use App\Models\BadmintonField;
use App\Models\BadmintonImage;
use Illuminate\Database\Seeder;

class BadmintonImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $fields = BadmintonField::get();
       foreach ($fields as $field) {
            BadmintonImage::create([
                'badminton_field_id' => $field->id,
                'img' => 'images/field/default.jpg'
            ]);
            
            BadmintonImage::create([
                'badminton_field_id' => $field->id,
                'img' => 'images/field/default-2.jpg'
            ]);

            BadmintonImage::create([
                'badminton_field_id' => $field->id,
                'img' => 'images/field/default.jpg'
            ]);
       }
    }
}
