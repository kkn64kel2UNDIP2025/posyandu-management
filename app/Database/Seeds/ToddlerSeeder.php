<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ToddlerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i=0;$i<15;$i++) {
            $data = [
                'name'      => $faker->name(),
                'jenis_kelamin'    => $faker->randomElement(['L','P']),
                'still_toddler' => $faker->boolean(80),
                'status'  => $faker->randomElement(['normal', 'pendek', 'stunting']),
                'parent_name'   => $faker->name(),
                'no_telp'  => $faker->phoneNumber()
            ];

            $this->db->table('toddlers')->insert($data);
        }
    }
}
