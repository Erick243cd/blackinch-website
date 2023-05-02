<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'posts';
    protected $primaryKey = 'postId';
    protected $allowedFields = ['title', 'slug', 'description', 'picture', 'is_deleted', 'created_at', 'updated_at'];


    public function getPost($id)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where(['postId' => $id])->first();
    }
}
