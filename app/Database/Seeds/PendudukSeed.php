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

        for($i = 1; $i < 50; $i++){
            $data = [
                'nik' => rand(1000000000000000, 9999999999999999),
                'name' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tempat_lahir' => $faker->city(),
                'tgl_lahir' => $faker->date(),
                'rt_id' => $i,
                'rw_id' => $i,
                'dusun_id' => $i,
                'desa' => 'Cibinuang',
                'kecamatan' => 'Kuningan',
                'kabupaten' => 'Kuningan',
                'provinsi' => 'Jawa Barat',
                'alamat' => $faker->name(),
                'gol_darah' => $faker->randomElement(['A', 'AB', 'B', 'O']),
                'agama' => 'Islam',
                'status_kawin' => $faker->randomElement(['Belum', 'Sudah', 'Cerai Hidup', 'Cerai Mati']),
                'pendidikan_terakhir' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),
                'pekerjaan' => $faker->randomElement(['Petani', 'Nelayan', 'Guru', 'Pedagang', 'PNS']),
                'nama_ibu' => $faker->name('female'),
                'nama_ayah' => $faker->name('male'),
                'status' => 'ada',
            ];

            $pddkModel->insert($data);
        }
    }
}
