<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeed extends Seeder
{
    public function run()
    {
        $this->call('RoleSeed');
        $this->call('UserSeed');
        $this->call('DusunSeed');
        $this->call('RwSeed');
        $this->call('RtSeed');
        $this->call('JabatanSeed');
        $this->call('KartuKeluargaSeed');
        $this->call('PendudukSeed');
        // $this->call('PengajuanSeed');
    }
}
