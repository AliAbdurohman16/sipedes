<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use App\Models\DusunModel;

class DusunSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $dusunModel = new DusunModel;

        for($i = 1; $i < 50; $i++){
            $data = [
                'name' => $faker->word()
            ];

            $dusunModel->insert($data);
        }
    }
}
