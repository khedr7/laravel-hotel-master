<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'hotel_name'      , 'value' => 'Laravel Hotel'],
            ['key' => 'hotel_phone'     , 'value' => '0123456789'],
            ['key' => 'hotel_address'   , 'value' => 'Damascus'],
            ['key' => 'hotel_email'     , 'value' => 'info@info.com'],
            ['key' => 'hotel_logo'      , 'value' => 'hotel.png'],
        ];

        DB::table('settings')->insert($data);
    }
}
