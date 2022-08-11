<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDusunIdToRwTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('rw', [
            'dusun_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
                'after'          => 'number'
            ],
            'CONSTRAINT rw_ibfk_1 FOREIGN KEY(`dusun_id`) REFERENCES `dusun`(`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
    }

    public function down()
    {
        $forge->dropForeignKey('rw', 'rw_ibfk_1');
        $this->forge->dropColumn('rw', 'dusun_id');
    }
}
