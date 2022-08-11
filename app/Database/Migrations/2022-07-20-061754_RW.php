<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RW extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
<<<<<<< HEAD
            'nama_rw' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_rw' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
=======
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'number' => [
                'type'       => 'INT'
            ],
            'created_at' => [
                'type'       => 'DATETIME'
            ],
            'updated_at' => [
                'type'       => 'DATETIME'
            ],
            'deleted_at' => [
                'type'       => 'DATETIME'
            ]
        ]);

>>>>>>> 098a84fdad075a2b21fe878093c2d766d5c8bd8a
        $this->forge->addKey('id', true);
        $this->forge->createTable('rw');
    }

    public function down()
    {
        $this->forge->dropTable('rw');
    }
}
