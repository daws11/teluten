<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('produk')->insert([
                'nama_produk' => $faker->word,
                'jenis_produk' => $faker->randomElement(['makanan', 'minuman']),
                'harga_produk' => $faker->numberBetween(10000, 50000),
                'jumlah_produk' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
