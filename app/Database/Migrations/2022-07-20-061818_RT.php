<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RT extends Migration
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
            'nama_rt' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_rt' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_rw' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
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
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id_rw', 'rw', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rt');
    }

    public function down()
    {
        $this->forge->dropTable('rt');
    }
}
