<?php

namespace App\Models;

use CodeIgniter\Model;

class CoordonneeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'coordonnees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['id', 'name', 'address', 'phone','email'];

}
