<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PostSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 5; $i++) { //to add 5 causes
            $this->db->table('posts')->insert($this->generatePost());
        }
    }
    private function generatePost(): array
    {
        $faker = Factory::create();
        $path = FCPATH.'/assets/img/posts';
        return [
            'title' => $faker->text(100),
            'slug' => $faker->slug(15),
            'description' => $faker->text(500),
            'postImage' => $faker->image($path, 750, 450, '',false),
            'created_at' => $faker->date('Y-m-d'),
            'updated_at' => $faker->date('Y-m-d'),
            'is_active' => $faker->boolean(),
            'is_featured' => $faker->boolean(),
            'is_deleted' => $faker->boolean(),
            'category_id' => $faker->numberBetween(1,10)
        ];
    }

}
