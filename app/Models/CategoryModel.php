<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'categoryId';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $allowedFields    = ['categoryId', 'name', 'category_slug', 'category_created_at'];

    // Dates
}
