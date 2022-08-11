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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'number' => [
                'type'       => 'INT'
            ],
            'rw_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('rw_id', 'rw', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rt');
    }

    public function down()
    {
        $this->forge->dropTable('rt');
    }
}
