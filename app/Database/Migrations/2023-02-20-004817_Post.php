<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'postId' => [
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
            'postImage' => [
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
            'description' => [
                'type' => 'TEXT',
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'viewNumber' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'is_most_format' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);
        $this->forge->addKey('postId', true);
        $this->forge->addForeignKey('category_id', 'categories', 'categoryId');
        $this->forge->createTable('posts');

    }

    public function down()
    {
        //
    }
}
