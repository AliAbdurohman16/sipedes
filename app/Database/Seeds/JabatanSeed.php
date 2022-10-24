<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class JabatanSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Kepala Desa',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'name' => 'Sekretaris Desa',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'name' => 'Bendahara Desa',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('jabatan')->insertBatch($data);
    }
}
