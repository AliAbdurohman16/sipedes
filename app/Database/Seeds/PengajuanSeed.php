<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PengajuanModel;

class PengajuanSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $pengajuanModel = new PengajuanModel;

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Nama',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Nama',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Domisli',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 10; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Domisli',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Belum Nikah',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 15; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Belum Nikah',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Lahir',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 20; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Lahir',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Penghasilan',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 18; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Penghasilan',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Pindah KK',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 22; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Pindah KK',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Rame-rame',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 12; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Rame-rame',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan SKU',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 7; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan SKU',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan SKTM',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 30; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan SKTM',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan SKCK',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 25; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan SKCK',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 5; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Kematian',
                'keterangan' => 'Cek',
                'status' => 'Belum Dibuat',
            ];

            $pengajuanModel->insert($data);
        }

        for($i = 1; $i < 35; $i++){
            $data = [
                'no_kk' => rand(16),
                'nik' => rand(16),
                'name' => $faker->name(),
                'telepon' => $faker->e164PhoneNumber ,
                'jenis' => 'Keterangan Kematian',
                'keterangan' => 'Cek',
                'status' => 'Sudah Dibuat',
            ];

            $pengajuanModel->insert($data);
        }
    }
}
