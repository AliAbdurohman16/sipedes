<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use App\Models\RtModel;

class RtSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $rtModel = new RtModel;

        for($i = 1; $i < 50; $i++){
            $data = [
                'name' => $faker->name(),
                'number' => $i,
                'rw_id' => $i
            ];

            $rtModel->insert($data);
        }
    }
}
