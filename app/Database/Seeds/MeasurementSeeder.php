<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MeasurementSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        
        for ($i = 1; $i < 7; $i++) {
            $data = [
                'toddler_id' => 2,
                'age'    => $i,
                'height' => $i + 70,
                'weight'  => 15 + $i*0.4,
                'attendance_id'   => $i,
                'added_by'  => 'f9966d01-1ec3-4d3d-8a66-53584b0bce6f'
            ];

            $this->db->table('measurements')->insert($data);
        }
    }
}
