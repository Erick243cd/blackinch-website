<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'postId';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'title','slug','postImage','is_featured','is_most_format','created_at','updated_at','is_active',
        'is_deleted','description','category_id','view_number'
    ];

    
    // Validation
    protected $validationRules      = [
        'title' => [
            'label' => 'Post', 'rules' => 'required',
            'errors' => ['required' => 'Le titre est requis'],
        ],
        'category_id' => [
            'label' => 'Catégorie', 'rules' => 'required',
            'errors' => ['required' => 'La catégorie est requise'],
        ],
        'description' => [
            'label' => 'Description', 'rules' => 'required',
            'errors' => ['required' => 'La description est requise'],
        ],
        'picture' => [
            'label' => 'Picture',
            'rules' => 'uploaded[picture]|is_image[picture]|max_size[picture,5096]',
            'errors' => [
                'uploaded' => 'Ne doit pas être vide',
                'is_image' => 'Le format de cet image est inconnu',
                'max_size' => 'Ne doit pas dépasser 5 Mo de taille',
            ]
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
  
    public function getPost($id)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where(['postId' => $id])->first();
    }
}
