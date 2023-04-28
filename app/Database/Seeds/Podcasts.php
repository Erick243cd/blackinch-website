<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Podcasts extends Seeder
{
    public function run()
    {

        for ($i = 0; $i < 5; $i++) { //to add 5 causes
            $this->db->table('podcasts')->insert($this->generatePodcasts());
        }

    }

    private function generatePodcasts(): array
    {
        $faker = Factory::create();
        $tmpPath = FCPATH . '/assets/podcasts/tmp';
        $realPath = FCPATH . '/assets/podcasts';
        $faker->fileExtension('mp3');
        return [
            'title' => $faker->text(100),
            'slug' => $faker->slug(15),
            'audioFile' => $faker->file($tmpPath, $realPath, false),
            'created_at' => $faker->date('Y-m-d'),
            'updated_at' => $faker->date('Y-m-d'),
            'is_active' => $faker->boolean(),
            'is_featured' => $faker->boolean(),
            'is_deleted' => $faker->boolean(),
            'category_id' => $faker->numberBetween(1, 10)
        ];
    }
}
