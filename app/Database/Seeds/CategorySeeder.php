<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { //to add 5 causes
            $this->db->table('categories')->insert($this->generateCategories());
        }
    }

    private function generateCategories(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->text(20),
            'category_slug' => $faker->slug('2'),
            'category_created_at' => $faker->date('Y-m-d')
        ];
    }
}
