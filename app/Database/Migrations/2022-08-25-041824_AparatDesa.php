<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AparatDesa extends Migration
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
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'tempat_lahir' => [
                'type' => 'TEXT',
            ],
            'tgl_lahir' => [
                'type'       => 'DATE',
            ],
            'jabatan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'pendidikan_terakhir' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tgl_pengangkatan' => [
                'type'       => 'DATE',
            ],
            'no_sk' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
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
        $this->forge->addForeignKey('jabatan_id', 'jabatan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('aparat_desa');
    }

    public function down()
    {
        $this->forge->dropTable('aparat_desa');
    }
}
