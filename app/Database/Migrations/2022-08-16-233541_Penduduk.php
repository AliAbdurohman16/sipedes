<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penduduk extends Migration
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
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
            'gol_darah' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'agama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_kawin' => [
                'type'       => 'ENUM',
                'constraint' => ['Belum', 'Sudah'],
            ],
            'pendidikan_terakhir' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addForeignKey('rw_id', 'rw', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('rt_id', 'rt', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }
}
