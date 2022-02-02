<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('users')->insert([
                'nama'          => $faker->name(),
                'jk'            => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'foto'       => 'profile.png',
                'alamat'        => $faker->address(),
                'tgl_lahir'     => $faker->dateTimeThisMonth(),
                'email'         => $faker->email(),
                'password'      => bcrypt('123'),
            ]);
        }
    }
}
