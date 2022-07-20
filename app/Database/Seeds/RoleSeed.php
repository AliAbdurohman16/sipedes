<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RoleSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Super User',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'User',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'Kasi Pelayanan',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'RW',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'RT',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
        ];

        // Using Query Builder
        $this->db->table('role')->insertBatch($data);
    }
}
