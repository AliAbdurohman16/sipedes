<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use App\Models\RwModel;

class RwSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $rwModel = new RwModel;

        for($i = 1; $i < 50; $i++){
            $data = [
                'name' => $faker->name(),
                'number' => $i
            ];

            $rwModel->insert($data);
        }
    }
}
