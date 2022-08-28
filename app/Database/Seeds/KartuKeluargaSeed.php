<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\KartuKeluargaModel;

class KartuKeluargaSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $kkModel = new KartuKeluargaModel;

        for($i = 1; $i < 50; $i++){
            $data = [
                'no_kk' => rand(1000000000000000, 9999999999999999),
                'name' => $faker->name(),
                'rt_id' => $i,
                'rw_id' => $i,
                'kelurahan' => 'Cibinuang',
                'kecamatan' => 'Kuningan',
                'kabupaten' => 'Kuningan',
                'provinsi' => 'Jawa Barat',
                'alamat' => $faker->address(),
            ];

            $kkModel->insert($data);
        }
    }
}
