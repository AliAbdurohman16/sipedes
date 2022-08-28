<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengajuan extends Migration
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
                'type'           => 'VARCHAR',
                'constraint'     => 16,
            ],
            'nik' => [
                'type'           => 'VARCHAR',
                'constraint'     => 16,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'telepon' => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan' => [
                'type'       => 'TEXT',
            ],
            'informasi' => [
                'type'       => 'TEXT',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Belum Dibuat', 'Sudah Dibuat'],
                'default'    => 'Belum Dibuat',
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
        $this->forge->createTable('pengajuan');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan');
    }
}
