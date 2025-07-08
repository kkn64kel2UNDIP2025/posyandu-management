<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Toddlers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'          => 'INT',
                'constraint'    => 8,
                'unsigned'      => true,
                'auto_increment'=> true
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100'
            ],
            'gender' => [
                'type'  => 'BOOLEAN', // 0 perempuan 1 laki2
                'null'  => true
            ],
            'still_toddler'     => [
                'type'          => 'BOOLEAN',
                'default'       => true
            ],
            'status' => [
                'type'          => 'SMALLINT',
                'constraint'    => 1, // Normal 0, Pendek 1, Stunting 2
                'default'       => 0
            ],
            'parent_name' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100'
            ],
            'no_telp' => [
                'type'          => 'VARCHAR',
                'constraint'    => '11'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('toddlers');
    }

    public function down()
    {
        $this->forge->dropTable('toddlers');
    }
}
