<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PendudukModel;

class PendudukSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $pddkModel = new PendudukModel;

        for($i = 1; $i < 20; $i++){
            $data = [
                'nik' => rand(16),
                'name' => $faker->name(),
                'jenis_kelamin' => 'L',
                'tempat_lahir' => $faker->city(),
                'tgl_lahir' => $faker->date(),
                'rt_id' => $i,
                'rw_id' => $i,
                'kelurahan' => 'Cibinuang',
                'kecamatan' => 'Kuningan',
                'kabupaten' => 'Kuningan',
                'provinsi' => 'Jawa Barat',
                'alamat' => $faker->name(),
                'gol_darah' => 'O',
                'agama' => 'Islam',
                'status_kawin' => 'Belum',
                'pendidikan_terakhir' => 'SMA',
                'pekerjaan' => 'PNS',
                'nama_ibu' => $faker->name('female'),
                'nama_ayah' => $faker->name('male'),
                'status' => 'ada',
            ];

            $pddkModel->insert($data);
        }
    }
}
