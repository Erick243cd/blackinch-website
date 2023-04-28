<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'categoryId' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'category_slug' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
        ]);
        $this->forge->addKey('categoryId', true);
        $this->forge->createTable('categories');
    }

    public function down()
    {
        //
    }
}
