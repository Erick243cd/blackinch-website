<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Podcasts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'podcastId' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'audioFile' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'is_active' => [
                'type' => 'VARCHAR',
                'constraint' => '250'

            ],
            'is_deleted' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'is_featured' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);
        $this->forge->addKey('podcastId', true);
        $this->forge->addForeignKey('category_id', 'categories', 'categoryId');
        $this->forge->createTable('podcasts');
    }

    public function down()
    {
        //
    }
}
