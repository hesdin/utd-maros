<?php

namespace Database\Seeders;

use App\Models\Pendonor;
use Illuminate\Database\Seeder;

class PendonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendonor::create([
            'no_hp'       => '123456',
            'user_id'     => 1,
            'golongan_id' => 1,
        ]);
    }
}
