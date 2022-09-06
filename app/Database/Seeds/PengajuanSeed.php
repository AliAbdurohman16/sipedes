<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PengajuanModel;
use CodeIgniter\I18n\Time;

class PengajuanSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $pengajuanModel = new PengajuanModel;

        for($i = 1; $i < 50; $i++){
            $data = [
                'no_kk' => rand(1000000000000000, 9999999999999999),
                'nik' => rand(1000000000000000, 9999999999999999),
                'nama' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => $faker->randomElement([
                    'Keterangan Nama', 
                    'Keterangan Domisli',
                    'Keterangan Belum Nikah',
                    'Keterangan Lahir',
                    'Keterangan Penghasilan',
                    'Keterangan Pindah KK',
                    'Keterangan Rame-rame',
                    'Keterangan SKU',
                    'Keterangan SKTM',
                    'Keterangan SKCK',
                    'Keterangan Kematian',
                ]),
                'keterangan' => 'Cek',
                'status' => $faker->randomElement(['Belum Dibuat', 'Sudah Dibuat']),
                'created_at' => Time::now('Asia/Jakarta', 'en_ID'),
            ];

            $pengajuanModel->insert($data);
        }
    }
}
