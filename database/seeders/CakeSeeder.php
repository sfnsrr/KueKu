<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cake;
use Faker\Factory as Faker;

class CakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $jenis = ['Bolu', 'Kering', 'Basah', 'Lapis', 'Keju', 'Puff', 'Tart'];
        $bahan = ['Cokelat', 'Keju', 'Pandan', 'Vanila', 'Kacang', 'Strawberry', 'Kopi'];

        for ($i = 1; $i <= 20; $i++) {
            Cake::create([
                'nama' => 'Kue ' . ucfirst($faker->word),
                'jenis' => $faker->randomElement($jenis),
                'deskripsi' => $faker->sentence(10),
                'harga' => $faker->numberBetween(10000, 80000),
                'stok' => $faker->numberBetween(0, 30),
                'bahan_utama' => $faker->randomElement($bahan)
            ]);
        }
    }
}
