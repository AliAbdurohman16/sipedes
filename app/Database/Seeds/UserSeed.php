<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'          => 'Super User',
                'username'      => 'superuser',
                'password'      => password_hash("1234567890", PASSWORD_DEFAULT),
                'telephone'     => '1234567890',
                'id_role'       => '1',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name'          => 'Kasi Pelayanan',
                'username'      => 'kasipelayanan',
                'password'      => password_hash("1234567890", PASSWORD_DEFAULT),
                'telephone'     => '1234567890',
                'id_role'       => '3',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
