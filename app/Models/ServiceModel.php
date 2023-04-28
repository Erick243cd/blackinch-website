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

}
