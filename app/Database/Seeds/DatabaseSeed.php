<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeed extends Seeder
{
    public function run()
    {
        $this->call('RoleSeed');
        $this->call('UserSeed');
        $this->call('RwSeed');
        $this->call('RtSeed');
    }
}
