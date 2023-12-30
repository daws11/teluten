<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('tenant')->insert([
                'nama_restoran' => $faker->company,
                'nama_pemilik' => $faker->name,
                'nomor_telepon' => $faker->phoneNumber,
                'email' => $faker->email,
                'kota' => $faker->city,
                'alamat' => $faker->address,
            ]);
        }
    }
}
