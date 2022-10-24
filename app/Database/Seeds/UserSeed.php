<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

use App\Models\UserModel;

class UserSeed extends Seeder
{
    public function run()
    {
        $userModel = new UserModel;
        
        $users = [
            [
                'image'         => 'Avatar.png',
                'name'          => 'Super User',
                'username'      => 'superuser',
                'password'      => password_hash("1234567890", PASSWORD_DEFAULT),
                'telephone'     => '1234567890',
                'role_id'       => '1',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'image'         => 'Avatar.png',
                'name'          => 'Kasi Pelayanan',
                'username'      => 'kasipelayanan',
                'password'      => password_hash("1234567890", PASSWORD_DEFAULT),
                'telephone'     => '1234567890',
                'role_id'       => '3',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
            [
                'image'         => 'Avatar.png',
                'name'          => 'RW 01',
                'username'      => 'rw01',
                'password'      => password_hash("1234567890", PASSWORD_DEFAULT),
                'telephone'     => '1234567890',
                'role_id'       => '3',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'en_ID'),
            ],
        ];

        $userModel->insertBatch($users);
    }
}
