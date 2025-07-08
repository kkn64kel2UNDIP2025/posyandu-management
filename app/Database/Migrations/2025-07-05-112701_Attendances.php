<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendances extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'          => 'INT',
                'constraint'    => 3,
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'measurement_date' => [
                'type'      => 'DATE'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('attendances');
    }

    public function down()
    {
        $this->forge->dropTable('attendances');
    }
}
