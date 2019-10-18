<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create('id_ID'); // data indonesia mengunakan faker
		
		for ($i=0; $i <= 93; $i++) {
			$pegawai = Pegawai::create([
				'pegawai_nama' => $faker->name,
				'pegawai_alamat' => $faker->address
			]);
		}
    }
}
