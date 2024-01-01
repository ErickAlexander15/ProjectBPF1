<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('payment_types')->truncate();
        Schema::enableForeignKeyConstraints();

        PaymentType::insert([
            'bank_name' => 'BCA Bank Central Asia',
            'bank_code' => '002',
            'holder_name' => 'Erick Alexander',
            'bank_account' => '8230481432',
            'instruction' => '
            <b>Tata Cara Transfer Melalui BCA (BCA mobile)</b>
            <ul>
                <li>Buka aplikasi, kemudian pilih menu m-BCA.</li>
                <li>Untuk mengirim uang, tap menu Transfer.</li>
                <li>Untuk transfer ke sesama rekening BCA, tap menu Antar Rekening.</li>
                <li>Pilih rekening masukkan nomor rekening BCA yang dituju.</li>
                <li>Masukkan jumlah transfer yang akan dikirim.</li>
            </ul>
            '
        ]);
    }
}
