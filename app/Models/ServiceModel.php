<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'services';
    protected $primaryKey = 'serviceId';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['serviceId', 'name', 'slug', 'description', 'created_at', 'updated_at', 'picture', 'is_deleted'];

    // Validation
    protected $validationRules      = [
        'name' => [
            'label' => 'Nom', 'rules' => 'required',
            'errors' => ['required' => 'Le titre est requis'],
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
        ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
  
    public function getService($id)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where(['serviceId' => $id])->first();
    }
}
