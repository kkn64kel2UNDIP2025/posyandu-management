<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Measurements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'          => 'INT',
                'constraint'    => 10,
                'unsigned'      => true,
                'auto_increment' => true
            ], 
            'toddler_id' => [
                'type'      => 'INT',
                'constraint'=> 8,
                'unsigned'  => true
            ],
            'age' => [
                'type'      => 'INT',
                'constraint'=> 3,
                'unsigned'  => true
            ],
            'height' => [
                'type'      => 'INT',
                'constraint'=> 3,
                'unsigned'  => true,
            ],
            'weight' => [
                'type'      => 'FLOAT',
                'constraint'=> 5,
                'unsigned'  => true,
            ],
            'attendance_at' => [
                'type'      => 'DATE'
            ],
            'added_by'      => [
                'type'       => 'UUID',
                'null'       => false,
                'comment'    => 'Foreign key to auth.users.id'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('toddler_id', 'toddlers', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('attendances');

        $this->db->query('ALTER TABLE attendances ADD CONSTRAINT fk_attendances_user 
                         FOREIGN KEY (added_by) REFERENCES auth.users(id) ON DELETE CASCADE');
                         
        $this->db->query('CREATE INDEX idx_attendances_user_id ON attendances(added_by)');
        
        // Aktifkan Row Level Security
        $this->db->query('ALTER TABLE attendances ENABLE ROW LEVEL SECURITY');
        
        // Buat RLS policy untuk SELECT
        $this->db->query("CREATE POLICY \"Attendances are viewable by everyone\" 
                         ON attendances FOR SELECT 
                         USING (true)");
    }
    
    public function down()
    {  
        $this->db->query("DROP POLICY IF EXISTS \"Profiles are viewable by everyone\" ON profiles");
        $this->forge->dropTable('attendances');
    }
}
