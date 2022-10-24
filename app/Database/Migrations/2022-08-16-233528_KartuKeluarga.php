<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KartuKeluarga extends Migration
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
            'no_kk' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_kepala' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'rt_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'rw_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kelurahan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kabupaten' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'provinsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type'       => 'DATETIME'
            ],
            'updated_at' => [
                'type'       => 'DATETIME'
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('rt_id', 'rt', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('rw_id', 'rw', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kartu_keluarga');
    }

    public function down()
    {
        $this->forge->dropTable('kartu_keluarga');
    }
}
