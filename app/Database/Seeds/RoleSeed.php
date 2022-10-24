<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

use App\Models\RoleModel;

class RoleSeed extends Seeder
{
    public function run()
    {
        $roleModel = new RoleModel;

        $roles = [
            [
                'name' => 'SUPERUSER',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'USER',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'KASI PELAYANAN',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'name' => 'RW',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
        ];

        $roleModel->insertBatch($roles);
    }
}
