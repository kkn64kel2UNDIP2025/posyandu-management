<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $date = $faker->dateTimeBetween('-3 year', '-2 year');
        
        for ($i = 1; $i < 10; $i++) {
            $data = [
                'measurement_date' => $date->modify('+1 month')->format('Y-m-d'),
            ];

            $this->db->table('attendances')->insert($data);
        }
    }
}
