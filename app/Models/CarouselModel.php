<?php

namespace App\Models;

use CodeIgniter\Model;

class CarouselModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'carousel';
    protected $primaryKey = 'car_id';
    protected $allowedFields = ['pictures', 'service_id', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getCarousel($id)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where(['car_id' => $id])->first();
    }

}
