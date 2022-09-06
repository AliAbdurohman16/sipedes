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
            'file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'informasi' => [
                'type'       => 'TEXT',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Belum Dibuat', 'Sudah Dibuat'],
                'default'    => 'Belum Dibuat',
            ],
            'read_user' => [
                'type'       => 'ENUM',
                'constraint' => ['no', 'yes'],
                'default'    => 'no',
            ],
            'read_admin' => [
                'type'       => 'ENUM',
                'constraint' => ['no', 'yes'],
                'default'    => 'no',
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
